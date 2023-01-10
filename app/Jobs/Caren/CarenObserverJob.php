<?php

namespace App\Jobs\Caren;

use App\Apis\Caren\Api;
use App\Models\CarenObserver\CarenCar;
use App\Models\CarenObserver\CarenExtra;
use App\Models\CarenObserver\CarenLocation;
use App\Models\CarenObserver\CarenVendor;
use Config;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\SlackAlerts\Facades\SlackAlert;

/**
 * Queued job to review Caren changes
 */
class CarenObserverJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $code;
    protected $name;
    protected $api;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($code, $name)
    {
        $this->code = $code;
        $this->name = $name;

        $this->api = new Api(
            env($this->code . '_CAREN_APIKEY'),
            env($this->code . '_CAREN_USERNAME'),
            env($this->code . '_CAREN_PASSWORD')
        );
    }

    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info("CarenObserver - $this->name - START");

        Config::set('database.connections.mysql.database', env($this->code . '_DB_DATABASE'));
        Config::set('database.connections.mysql.username', env($this->code . '_DB_USERNAME'));
        Config::set('database.connections.mysql.password', env($this->code . '_DB_PASSWORD'));
        DB::purge('mysql');
        DB::reconnect('mysql');

        // 1. Vendors
        $this->vendors();

        // 2. Locations
        $this->locations();

        // 3. Cars (Vehicles)
        $this->cars();

        // 4. Extras
        $this->extras('extra');

        // 5. Insurances
        $this->extras('insurance');

        // 6. Link cars with extras
        $this->linkCarsAndExtras('extra');

        // 7. Link cars with insurances
        $this->linkCarsAndExtras('insurance');

        Log::info("CarenObserver - $this->name - END");
    }

    /**
     * Get the list of vendors
     *
     * @return void
     */
    private function vendors()
    {
        $vendors = $this->api->vendorList();
        $carenVendors = [];

        foreach ($vendors['Rentals'] as $vendor) {
            $existingVendor = CarenVendor::where('caren_rental_id', $vendor['Id'])->first();

            if ($existingVendor) {
                // Check if the name has changed
                if ($existingVendor->name != $vendor["Name"]) {
                    $log = "[$this->name] The vendor with id " . $vendor["Id"] . " has changed its name from '$existingVendor->name' to '" . $vendor["Name"] . "'";
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }

                    $existingVendor->update([
                        'name' => $vendor["Name"],
                    ]);
                }
            } else {
                // Create Caren vendor
                $log = "[$this->name] New vendor: '" . $vendor["Name"] . "'";
                Log::info($log);

                if (config('settings.slack.enabled')) {
                    SlackAlert::message($log);
                }

                CarenVendor::create([
                    'name'              => $vendor["Name"],
                    'caren_rental_id'   => $vendor["Id"],
                ]);
            }

            $carenVendors[] = $vendor['Id'];
        }

        // Check that all the Caren vendors in our database are still in Caren
        $missingVendors = CarenVendor::whereNotIn('caren_rental_id', $carenVendors)->get();

        if ($missingVendors->count()) {
            foreach ($missingVendors as $missingVendor) {
                $log = "[$this->name] The vendor '$missingVendor->name' (Caren Id " . $missingVendor->caren_rental_id . ") is no longer in Caren";
                Log::info($log);

                if (config('settings.slack.enabled')) {
                    SlackAlert::message($log);
                }

                $missingVendor->delete();
            }
        }
    }

    /**
     * Get the list of locations
     *
     * @return void
     */
    private function locations()
    {
        $carenPickupLocations = [];
        $carenDropoffLocations = [];

        foreach (CarenVendor::all() as $vendor) {
            // 1. Pickup locations
            $pickupLocations = $this->api->pickupLocations(["RentalId" => $vendor->caren_rental_id]);

            foreach ($pickupLocations['Locations'] as $pickupLocation) {
                // Get the opening times
                $openFrom = $openTo = null;

                if (count($pickupLocation['Times'])) {
                    $times = $pickupLocation['Times'][0];
                    $openFrom = $times["From"];
                    $openTo = $times["To"];
                }

                $existingLocation = CarenLocation::where('caren_pickup_location_id', $pickupLocation['Id'])
                    ->orWhere('name', $pickupLocation['Name'])->first();

                if ($existingLocation) {
                    // Check if the name has changed
                    if ($existingLocation->name != $pickupLocation["Name"]) {
                        $log = "[$this->name] The location with pickup id " . $pickupLocation["Id"] . " has changed its name from '$existingLocation->name'
                            to '" . $pickupLocation["Name"] . "'";
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }

                        $existingLocation->update([
                            'name' => $pickupLocation["Name"],
                        ]);
                    }

                    // Check if the pickup id has changed
                    if ($existingLocation->caren_pickup_location_id && $existingLocation->caren_pickup_location_id != $pickupLocation["Id"]) {
                        $log = "[$this->name] The location '" . $pickupLocation["Name"] . "' has changed its pickup id from '$existingLocation->caren_pickup_location_id'
                             to " . $pickupLocation["Id"];
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }

                        $existingLocation->update([
                            'caren_pickup_location_id' => $pickupLocation["Id"],
                        ]);
                    }

                    // Check if the opening times have changed
                    if ($existingLocation->open_from != $openFrom || $existingLocation->open_to != $openTo) {
                        if ($openFrom && $openTo) {
                            $change = "$openFrom to $openTo";
                        } else {
                            $change = "Open 24 hours";
                        }

                        $log = "[$this->name] The opening times for the location '$existingLocation->name' have changed: $change";
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }

                        $existingLocation->update([
                            'open_from' => $openFrom,
                            'open_to'   => $openTo
                        ]);
                    }
                } else {
                    $log = "[$this->name] New location: '" . $pickupLocation["Name"] . "'";
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }

                    CarenLocation::create([
                        'name'                      => $pickupLocation["Name"],
                        'caren_pickup_location_id'  => $pickupLocation["Id"],
                        'open_from'                 => $openFrom,
                        'open_to'                   => $openTo
                    ]);
                }

                $carenPickupLocations[] = $pickupLocation["Id"];
            }

            // 2. Dropoff locations
            $dropoffLocations = $this->api->dropoffLocations(["RentalId" => $vendor->caren_rental_id]);

            foreach ($dropoffLocations['Locations'] as $dropoffLocation) {
                // Get the opening times
                $openFrom = $openTo = null;

                if (count($dropoffLocation['Times'])) {
                    $times = $dropoffLocation['Times'][0];
                    $openFrom = $times["From"];
                    $openTo = $times["To"];
                }

                $existingLocation = CarenLocation::where('caren_dropoff_location_id', $dropoffLocation['Id'])
                    ->orWhere('name', $dropoffLocation['Name'])->first();

                if ($existingLocation) {
                    // Check if the name has changed
                    if ($existingLocation->name != $dropoffLocation["Name"]) {
                        $log = "[$this->name] The location with dropoff id " . $dropoffLocation["Id"] . " has changed its name from '" .
                            $existingLocation->name . "' to '" . $dropoffLocation["Name"] . "'";
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }

                        $existingLocation->update([
                            'name' => $dropoffLocation["Name"],
                        ]);
                    }

                    // Check if the dropoff id has changed
                    if ($existingLocation->caren_dropoff_location_id && $existingLocation->caren_dropoff_location_id != $dropoffLocation["Id"]) {
                        $log = "[$this->name] The location '" . $dropoffLocation["Name"] . "' has changed its dropoff id from " . $existingLocation->caren_dropoff_location_id .
                            " to " . $dropoffLocation["Id"];
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }
                    }

                    // Check if the opening times have changed
                    if ($existingLocation->open_from != $openFrom || $existingLocation->open_to != $openTo) {
                        if ($openFrom && $openTo) {
                            $change = "$openFrom to $openTo";
                        } else {
                            $change = "Open 24 hours";
                        }

                        $log = "[$this->name] The opening times for the location '$existingLocation->name' have changed: $change";
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }

                        $existingLocation->update([
                            'open_from' => $openFrom,
                            'open_to'   => $openTo
                        ]);
                    }

                    $existingLocation->update([
                        'caren_dropoff_location_id' => $dropoffLocation["Id"],
                    ]);
                } else {
                    $log = "[$this->name] New location: '" . $dropoffLocation["Name"] . "'";
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message();
                    }

                    CarenLocation::create([
                        'name'                      => $dropoffLocation["Name"],
                        'caren_dropoff_location_id' => $dropoffLocation["Id"],
                        'open_from'                 => $openFrom,
                        'open_to'                   => $openTo
                    ]);
                }

                $carenDropoffLocations[] = $dropoffLocation["Id"];
            }
        }

        // Check that all the Caren pickup locations in our database are still in Caren
        $missingLocations = CarenLocation::whereNotIn('caren_pickup_location_id', $carenPickupLocations)->get();

        if ($missingLocations->count()) {
            foreach ($missingLocations as $missingLocation) {
                $log = "[$this->name] The location '$missingLocation->name' (Caren pickup Id $missingLocation->caren_pickup_location_id)
                     is no longer in Caren";
                Log::info($log);

                if (config('settings.slack.enabled')) {
                    SlackAlert::message($log);
                }

                $missingLocation->delete();
            }
        }

        // Check that all the Caren dropoff locations in our database are still in Caren
        $missingLocations = CarenLocation::whereNotIn('caren_dropoff_location_id', $carenDropoffLocations)->get();

        if ($missingLocations->count()) {
            foreach ($missingLocations as $missingLocation) {
                $log = "[$this->name] The location '$missingLocation->name' (Caren dropoff Id $missingLocation->caren_dropoff_location_id)
                    is no longer in Caren";
                Log::info($log);

                if (config('settings.slack.enabled')) {
                    SlackAlert::message($log);
                }

                $missingLocation->delete();
            }
        }
    }

    /**
     * Get the list of cars
     *
     * @return void
     */
    private function cars()
    {
        foreach (CarenVendor::all() as $vendor) {
            $cars = $this->api->fullCarList(["RentalId" => $vendor->caren_rental_id]);
            $carenCars = [];

            foreach ($cars['Classes'] as $car) {
                $existingCar = CarenCar::where('caren_id', $car['Id'])->first();

                if ($existingCar) {
                    // Check if the name has changed
                    if ($existingCar->name != $car["Name"]) {
                        $log = "[$this->name] The vehicle with id " . $car["Id"] . " has changed its name from '$existingCar->name' to '" . $car["Name"] . "'";
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }

                        unset($car['Currencies']);

                        $existingCar->update([
                            'name' => $car["Name"],
                            'caren_data'        => $car
                        ]);
                    }
                } else {
                    $log = "[$this->name] New vehicle: " . $car["Name"];
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }

                    unset($car['Currencies']);

                    CarenCar::create([
                        'name'              => $car["Name"],
                        'caren_id'          => $car["Id"],
                        'caren_rental_id'   => $vendor->caren_rental_id,
                        'caren_data'        => $car
                    ]);
                }

                $carenCars[] = $car['Id'];
            }

            // Check that all the Caren cars in our database are still in Caren
            $missingCars = CarenCar::where('caren_rental_id', $vendor->caren_rental_id)->whereNotIn('caren_id', $carenCars)->get();

            if ($missingCars->count()) {
                foreach ($missingCars as $missingCar) {
                    $log = "[$this->name] The vehicle '" . $missingCar->name . "' (Caren Id " . $missingCar->caren_id . ") is no longer in Caren";
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }

                    $missingCar->delete();
                }
            }
        }
    }

    /**
     * Get the list of extras
     *
     * @param   string              $type (extra or insurance)
     *
     * @return void
     */
    private function extras($type)
    {
        $key = $type == "extra" ? "Extras" : "Insurances";
        $category = $type == "extra" ? "standard" : "insurance";

        foreach (CarenVendor::all() as $vendor) {
            $extras = $this->api->extraList($type, ["RentalId" => $vendor->caren_rental_id]);
            $carenExtras = [];

            foreach ($extras[$key] as $extra) {
                $existingExtra = CarenExtra::where('category', $category)->where('caren_id', $extra['Id'])->first();

                if ($existingExtra) {
                    // Check if the name has changed
                    if ($existingExtra->name != $extra["Name"]) {
                        $log = "[$this->name] The $category con id " . $extra['Id'] . " has changed its name from '$existingExtra->name' to '" . $extra['Name'] . "'";
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }

                        unset($extra['Currencies']);

                        $existingExtra->update([
                            'name'          => $extra["Name"],
                            'caren_data'    => $extra
                        ]);
                    }
                } else {
                    $log = "[$this->name] New $category: " . $extra["Name"];
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }

                    unset($extra['Currencies']);

                    $carenExtra = CarenExtra::create([
                        'name'              => $extra["Name"],
                        'category'          => $category,
                        'caren_id'          => $extra["Id"],
                        'caren_rental_id'   => $vendor->caren_rental_id,
                        'caren_data'        => $extra
                    ]);
                }

                $carenExtras[] = $extra['Id'];
            }

            // Check that all the Caren extras in our database are still in Caren
            $missingExtras = CarenExtra::where('category', $category)->where('caren_rental_id', $vendor->caren_rental_id)->whereNotIn('caren_id', $carenExtras)->get();

            if ($missingExtras->count()) {
                foreach ($missingExtras as $missingExtra) {
                    $log = "[$this->name] The $category '$missingExtra->name' (Caren Id $missingExtra->caren_id) is no longer in Caren";
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }

                    $missingExtra->delete();
                }
            }
        }
    }

    /**
     * Link Caren cars to their available extras and insurances
     *
     * @param   string              $type (extra or insurance)
     *
     * @return  void
     */
    private function linkCarsAndExtras($type)
    {
        $key = $type == "extra" ? "Extras" : "Insurances";
        $category = $type == "extra" ? "standard" : "insurance";

        foreach (CarenCar::all() as $carenCar) {
            // Get the existing extras
            $currentExtras = $carenCar->carenExtras()->where('category', $category)->get();
            $newExtras = [];

            // Get the extras for that car
            $extras = $this->api->extraList($type, ["RentalId" => $carenCar->caren_rental_id, "ClassId" => $carenCar->caren_id]);

            foreach ($extras[$key] as $extra) {
                $carenExtra = CarenExtra::where('category', $category)->where('caren_id', $extra['Id'])->first();

                // If the extra is not linked to the car, add it and create a log
                if (!($carenCar->carenExtras->contains($carenExtra))) {
                    $log = "[$this->name] New $type for the vehicle '$carenCar->name' (Caren Id $carenCar->caren_id): $carenExtra->name";
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }

                    $carenCar->carenExtras()->attach($carenExtra->id);
                }

                $newExtras[] = $carenExtra->id;
            }

            // Check that all the extras linked to the car are still in the database. If not, remove them and create a log
            foreach ($currentExtras as $currentExtra) {
                if (!in_array($currentExtra->id, $newExtras)) {
                    $carenExtra = CarenExtra::find($currentExtra->id);
                    $log = "[$this->name] The car '$carenCar->name' (Caren Id $carenCar->caren_id) does not have this $type anymore: $carenExtra->name";
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }

                    $carenCar->carenExtras()->detach($currentExtra->id);
                }
            }
        }
    }
}
