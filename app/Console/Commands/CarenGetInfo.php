<?php

namespace App\Console\Commands;

use App\Apis\Caren\Api;
use App\Models\CarenCar;
use App\Models\CarenLocation;
use App\Models\CarenVendor;
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
        //$this->vendors($api);

        // 2. Locations
        //$this->locations($api);

        // 3. Cars/Vehicles
        $this->cars($api);

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
                SlackAlert::message("New Caren vendor: ". $vendor["Name"]);

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
        foreach (CarenVendor::all() as $carenVendor) {
            // 1. Pickup locations
            $pickupLocations = $api->pickupLocations(["RentalId" => $carenVendor->caren_rental_id]);

            foreach($pickupLocations['Locations'] as $pickupLocation) {
                $existingLocation = CarenLocation::where('name', $pickupLocation['Name'])->first();

                if (!$existingLocation) {
                    SlackAlert::message("New Caren location: ". $pickupLocation["Name"]);

                    CarenLocation::create([
                        'name'                      => $pickupLocation["Name"],
                        'caren_pickup_location_id'  => $pickupLocation["Id"],
                    ]);
                }
            }

            // 2. Dropoff locations
            $dropoffLocations = $api->dropoffLocations(["RentalId" => $carenVendor->caren_rental_id]);

            foreach($dropoffLocations['Locations'] as $dropoffLocation) {
                $existingLocation = CarenLocation::where('name', $dropoffLocation['Name'])->first();

                if ($existingLocation) {
                    $existingLocation->update([
                        'caren_dropoff_location_id' => $dropoffLocation["Id"],
                    ]);
                } else {
                    SlackAlert::message("New Caren location: ". $dropoffLocation["Name"]);

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
        foreach (CarenVendor::all() as $carenVendor) {
            $cars = $api->fullCarList(["RentalId" => $carenVendor->caren_rental_id]);

            foreach($cars['Classes'] as $car) {
                $existingCar = CarenCar::where('caren_id', $car['Id'])->first();

                if (!$existingCar) {
                    //SlackAlert::message("New Caren car: ". $car["Name"]);

                    unset($car['Currencies']);

                    CarenCar::create([
                        'name'          => $car["Name"],
                        'caren_id'      => $car["Id"],
                        'vendor_id'     => $carenVendor->vendor_id,
                        'caren_data'    => $car
                    ]);
                }
            }
        }
    }
}
