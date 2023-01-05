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

        foreach($vendors['Rentals'] as $vendor) {
            $existingVendor = CarenVendor::where('caren_rental_id', $vendor['Id'])->first();

            if (!$existingVendor) {
                if (config('settings.slack.enabled')) {
                    SlackAlert::message("New Caren vendor: ". $vendor["Name"]);
                }

                CarenVendor::create([
                    'name'              => $vendor["Name"],
                    'caren_rental_id'   => $vendor["Id"],
                ]);
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
        foreach (Vendor::whereNotNull('caren_settings')->get() as $vendor) {
            $carenRentalId = $vendor->caren_settings["rental_id"];

            // 1. Pickup locations
            $pickupLocations = $api->pickupLocations(["RentalId" => $carenRentalId]);

            foreach($pickupLocations['Locations'] as $pickupLocation) {
                $existingLocation = CarenLocation::where('name', $pickupLocation['Name'])->first();      

                if ($existingLocation) {
                    $existingLocation->update([
                        'caren_pickup_location_id' => $pickupLocation["Id"],
                    ]);
                } else {
                    if (config('settings.slack.enabled')) {
                        SlackAlert::message("New Caren location: ". $pickupLocation["Name"]);
                    }

                    CarenLocation::create([
                        'name'                      => $pickupLocation["Name"],
                        'caren_pickup_location_id'  => $pickupLocation["Id"],
                    ]);
                }
            }

            // 2. Dropoff locations
            $dropoffLocations = $api->dropoffLocations(["RentalId" => $carenRentalId]);

            foreach($dropoffLocations['Locations'] as $dropoffLocation) {
                $existingLocation = CarenLocation::where('name', $dropoffLocation['Name'])->first();

                if ($existingLocation) {
                    $existingLocation->update([
                        'caren_dropoff_location_id' => $dropoffLocation["Id"],
                    ]);
                } else {
                    if (config('settings.slack.enabled')) {
                        SlackAlert::message("New Caren location: ". $dropoffLocation["Name"]);
                    }

                    CarenLocation::create([
                        'name'                      => $dropoffLocation["Name"],
                        'caren_dropoff_location_id' => $dropoffLocation["Id"],
                    ]);
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

            foreach($cars['Classes'] as $car) {
                $existingCar = CarenCar::where('caren_id', $car['Id'])->first();

                if (!$existingCar) {
                    if (config('settings.slack.enabled')) {
                        SlackAlert::message("New Caren car: ". $car["Name"]);
                    }

                    unset($car['Currencies']);

                    CarenCar::create([
                        'name'          => $car["Name"],
                        'caren_id'      => $car["Id"],
                        'vendor_id'     => $vendor->id,
                        'caren_data'    => $car
                    ]);
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

        foreach (Vendor::whereNotNull('caren_settings')->get() as $vendor) {
            $carenRentalId = $vendor->caren_settings["rental_id"];
            $extras = $api->extraList($type, ["RentalId" => $carenRentalId]);

            foreach($extras[$key] as $extra) {
                $existingExtra = CarenExtra::where('caren_id', $extra['Id'])->first();

                if (!$existingExtra) {
                    if (config('settings.slack.enabled')) {
                        SlackAlert::message("New Caren extra: ". $extra["Name"]);
                    }

                    unset($extra['Currencies']);

                    $carenExtra = CarenExtra::create([
                        'name'          => $extra["Name"],
                        'caren_id'      => $extra["Id"],
                        'vendor_id'     => $vendor->id,
                        'caren_data'    => $extra
                    ]);

                    $this->linkWithCarenCars($carenExtra);
                    $this->linkWithOwnExtra($carenExtra, $type, $vendor->id);
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

        foreach($carenCarIds as $carenCarId) {
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
