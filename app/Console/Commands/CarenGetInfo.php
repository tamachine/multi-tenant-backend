<?php

namespace App\Console\Commands;

use App\Apis\Caren\Api;
use App\Models\CarenCar;
use App\Models\CarenExtra;
use App\Models\CarenLocation;
use App\Models\CarenVendor;
use App\Models\Extra;
use App\Models\Vendor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\SlackAlerts\Facades\SlackAlert;

/**
 * Daily command to get new information from Caren
 */
class CarenGetInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'caren:get-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily command to get new information from Caren';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Api $api)
    {
        Log::info("CarenGetInfo -  START");

        // 1. Vendors
        $this->vendors($api);

        // 2. Locations
        $this->locations($api);

        // 3. Cars/Vehicles
        $this->cars($api);

        // 4. Extras
        $this->extras($api, 'extra');

        // 5. Insurances
        $this->extras($api, 'insurance');

        Log::info("CarenGetInfo -  END");
    }

    /**
     * Get the list of vendors
     *
     * @param   App\Apis\Caren\Api  $api
     *
     * @return void
     */
    private function vendors(Api $api)
    {
        $vendors = $api->vendorList();
        $carenVendors = [];

        foreach ($vendors['Rentals'] as $vendor) {
            $existingVendor = CarenVendor::where('caren_rental_id', $vendor['Id'])->first();

            if ($existingVendor) {
                // Check if the name has changed
                if ($existingVendor->name != $vendor["Name"]) {
                    $log = "The vendor with id " . $vendor["Id"] . " has changed its name from '" . $existingVendor->name . "' to '" . $vendor["Name"] . "'";
                    Log::info($log);
                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }
                }
            } else {
                // Create Caren vendor
                $log = "New vendor: '" . $vendor["Name"] . "'";
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
                $log = "The vendor '" . $missingVendor->name . "' (Caren Id " . $missingVendor->caren_rental_id . ") is no longer in Caren";
                Log::info($log);

                if (config('settings.slack.enabled')) {
                    SlackAlert::message($log);
                }
            }
        }
    }

    /**
     * Get the list of locations
     *
     * @param   App\Apis\Caren\Api  $api
     *
     * @return void
     */
    private function locations(Api $api)
    {
        $carenPickupLocations = [];
        $carenDropoffLocations = [];

        foreach (Vendor::whereNotNull('caren_settings')->get() as $vendor) {
            $carenRentalId = $vendor->caren_settings["rental_id"];

            // 1. Pickup locations
            $pickupLocations = $api->pickupLocations(["RentalId" => $carenRentalId]);

            foreach ($pickupLocations['Locations'] as $pickupLocation) {
                $existingLocation = CarenLocation::where('caren_pickup_location_id', $pickupLocation['Id'])
                    ->orWhere('name', $pickupLocation['Name'])->first();

                if ($existingLocation) {
                    // Check if the name has changed
                    if ($existingLocation->name != $pickupLocation["Name"]) {
                        $log = "The location with pickup id " . $pickupLocation["Id"] . " has changed its name from '" .
                            $existingLocation->name . "' to '" . $pickupLocation["Name"] . "'";
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }
                    }

                    // Check if the pickup id has changed
                    if ($existingLocation->caren_pickup_location_id && $existingLocation->caren_pickup_location_id != $pickupLocation["Id"]) {
                        $log = "The location '" . $pickupLocation["Name"] . "' has changed its pickup id from " . $existingLocation->caren_pickup_location_id .
                            " to " . $pickupLocation["Id"];
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }

                        $existingLocation->update([
                            'caren_pickup_location_id' => $pickupLocation["Id"],
                        ]);
                    }
                } else {
                    $log = "New location: '" . $pickupLocation["Name"] . "'";
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }

                    CarenLocation::create([
                        'name'                      => $pickupLocation["Name"],
                        'caren_pickup_location_id'  => $pickupLocation["Id"],
                    ]);
                }

                $carenPickupLocations[] = $pickupLocation["Id"];
            }

            // 2. Dropoff locations
            $dropoffLocations = $api->dropoffLocations(["RentalId" => $carenRentalId]);

            foreach ($dropoffLocations['Locations'] as $dropoffLocation) {
                $existingLocation = CarenLocation::where('caren_dropoff_location_id', $dropoffLocation['Id'])
                    ->orWhere('name', $dropoffLocation['Name'])->first();

                if ($existingLocation) {
                    // Check if the name has changed
                    if ($existingLocation->name != $dropoffLocation["Name"]) {
                        $log = "The location with dropoff id " . $dropoffLocation["Id"] . " has changed its name from '" .
                            $existingLocation->name . "' to '" . $dropoffLocation["Name"] . "'";
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }
                    }

                    // Check if the dropoff id has changed
                    if ($existingLocation->caren_dropoff_location_id && $existingLocation->caren_dropoff_location_id != $dropoffLocation["Id"]) {
                        $log = "The location '" . $dropoffLocation["Name"] . "' has changed its dropoff id from " . $existingLocation->caren_dropoff_location_id .
                            " to " . $dropoffLocation["Id"];
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }
                    }

                    $existingLocation->update([
                        'caren_dropoff_location_id' => $dropoffLocation["Id"],
                    ]);
                } else {
                    $log = "New location: '" . $dropoffLocation["Name"] . "'";
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message();
                    }

                    CarenLocation::create([
                        'name'                      => $dropoffLocation["Name"],
                        'caren_dropoff_location_id' => $dropoffLocation["Id"],
                    ]);
                }

                $carenDropoffLocations[] = $dropoffLocation["Id"];
            }
        }

        // Check that all the Caren pickup locations in our database are still in Caren
        $missingLocations = CarenLocation::whereNotIn('caren_pickup_location_id', $carenPickupLocations)->get();

        if ($missingLocations->count()) {
            foreach ($missingLocations as $missingLocation) {
                $log = "The location '" . $missingLocation->name . "' (Caren pickup Id " . $missingLocation->caren_pickup_location_id .
                    ") is no longer in Caren";
                Log::info($log);

                if (config('settings.slack.enabled')) {
                    SlackAlert::message($log);
                }
            }
        }

        // Check that all the Caren dropoff locations in our database are still in Caren
        $missingLocations = CarenLocation::whereNotIn('caren_dropoff_location_id', $carenDropoffLocations)->get();

        if ($missingLocations->count()) {
            foreach ($missingLocations as $missingLocation) {
                $log = "The location '" . $missingLocation->name . "' (Caren dropoff Id " . $missingLocation->caren_dropoff_location_id .
                    ") is no longer in Caren";
                Log::info($log);

                if (config('settings.slack.enabled')) {
                    SlackAlert::message($log);
                }
            }
        }
    }

    /**
     * Get the list of cars
     *
     * @param   App\Apis\Caren\Api  $api
     *
     * @return void
     */
    private function cars(Api $api)
    {
        foreach (Vendor::whereNotNull('caren_settings')->get() as $vendor) {
            $carenRentalId = $vendor->caren_settings["rental_id"];
            $cars = $api->fullCarList(["RentalId" => $carenRentalId]);
            $carenCars = [];

            foreach ($cars['Classes'] as $car) {
                $existingCar = CarenCar::where('caren_id', $car['Id'])->first();

                if ($existingCar) {
                    // Check if the name has changed
                    if ($existingCar->name != $car["Name"]) {
                        $log = "The car with id " . $car["Id"] . " has changed its name from '" . $existingCar->name . "' to '" . $car["Name"] . "'";
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }
                    }
                } else {
                    $log = "New car: " . $car["Name"];
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }

                    unset($car['Currencies']);

                    CarenCar::create([
                        'name'          => $car["Name"],
                        'caren_id'      => $car["Id"],
                        'vendor_id'     => $vendor->id,
                        'caren_data'    => $car
                    ]);
                }

                $carenCars[] = $car['Id'];
            }

            // Check that all the Caren cars in our database are still in Caren
            $missingCars = CarenCar::where('vendor_id', $vendor->id)->whereNotIn('caren_id', $carenCars)->get();

            if ($missingCars->count()) {
                foreach ($missingCars as $missingCar) {
                    $log = "The car '" . $missingCar->name . "' (Caren Id " . $missingCar->caren_id . ") is no longer in Caren";
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }
                }
            }
        }
    }

    /**
     * Get the list of extras
     *
     * @param   App\Apis\Caren\Api  $api
     * @param   string              $type (extra or insurance)
     *
     * @return void
     */
    private function extras(Api $api, $type)
    {
        $key = $type == "extra" ? "Extras" : "Insurances";
        $category = $type == "extra" ? "standard" : "insurance";

        foreach (Vendor::whereNotNull('caren_settings')->get() as $vendor) {
            $carenRentalId = $vendor->caren_settings["rental_id"];
            $extras = $api->extraList($type, ["RentalId" => $carenRentalId]);
            $carenExtras = [];

            foreach ($extras[$key] as $extra) {
                $existingExtra = CarenExtra::where('category', $category)->where('caren_id', $extra['Id'])->first();

                if ($existingExtra) {
                    // Check if the name has changed
                    if ($existingExtra->name != $extra["Name"]) {
                        $log = "The $type with id " . $extra['Id'] . " has changed its name from '$existingExtra->name' to '" . $extra['Name'] . "'";
                        Log::info($log);

                        if (config('settings.slack.enabled')) {
                            SlackAlert::message($log);
                        }
                    }
                } else {
                    $log = "New $type: " . $extra["Name"];
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }

                    unset($extra['Currencies']);

                    $carenExtra = CarenExtra::create([
                        'name'          => $extra["Name"],
                        'category'      => $category,
                        'caren_id'      => $extra["Id"],
                        'vendor_id'     => $vendor->id,
                        'caren_data'    => $extra
                    ]);

                    $this->linkWithCarenCars($carenExtra);
                    //$this->linkWithOwnExtra($carenExtra, $type, $vendor->id);
                }

                $carenExtras[] = $extra['Id'];
            }

            // Check that all the Caren extras in our database are still in Caren
            $missingExtras = CarenExtra::where('category', $category)->where('vendor_id', $vendor->id)->whereNotIn('caren_id', $carenExtras)->get();

            if ($missingExtras->count()) {
                foreach ($missingExtras as $missingExtra) {
                    $log = "The $type '$missingExtra->name' (Caren Id $missingExtra->caren_id) is no longer in Caren";
                    Log::info($log);

                    if (config('settings.slack.enabled')) {
                        SlackAlert::message($log);
                    }
                }
            }
        }
    }

    /**
     * Link a Caren Extra to the cars contained in "ClassIDs"
     *
     * @param   CarenExtra  $carenExtra
     *
     * @return  void
     */
    private function linkWithCarenCars($carenExtra)
    {
        $carenCarIds = $carenExtra->caren_data["ClassIds"];

        // If "ClassIds" is an empty array, that means the extra must be linked to
        //  all Caren Cars
        if (count($carenCarIds) == 0) {
            $carenCarIds = CarenCar::all()->pluck('caren_id');
        }

        foreach ($carenCarIds as $carenCarId) {
            $carenCar = CarenCar::where('caren_id', $carenCarId)->first();
            if ($carenCar) {
                $carenExtra->carenCars()->attach($carenCar->id);
            }
        }
    }

    /**
     * Create an "Extra" when a "Caren Extra" is created
     *
     * @param   CarenExtra  $carenExtra
     * @param   string      $type (extra or insurance)
     * @param   int         $vendorId
     *
     * @return void
     */
    private function linkWithOwnExtra($carenExtra, $type, $vendorId)
    {
        $data = [
            'name'      => $carenExtra->name,
            'vendor_id' => $vendorId,
            'category'  => $type == 'insurance' ? 'insurance' : 'standard',
            'caren_id'  => $carenExtra->caren_data["Id"]
        ];

        if (isset($carenExtra->caren_data["MaximumQuantity"])) {
            $data["max_units"] = $carenExtra->caren_data["MaximumQuantity"];
        }

        if (isset($carenExtra->caren_data["PricePerDay"])) {
            $data["price_mode"] = $carenExtra->caren_data["PricePerDay"] ? 'per_day' : 'per_rental';
        }

        if (isset($carenExtra->caren_data["Included"])) {
            $data["included"] = $carenExtra->caren_data["Included"];
        }

        $extra = Extra::create($data);
        $carenExtra->update([
            'extra_id' => $extra->id
        ]);
    }
}
