<?php

namespace Database\Seeders\IcelandCars\local;

use App\Models\CarenLocation;
use App\Models\CarenVendor;
use App\Models\Location;
use App\Models\Vendor;
use App\Models\VendorLocation;
use App\Models\VendorLocationFee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class VendorLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Vendor: Create Blue Car Rental
        $vendor = Vendor::create([
            'name' => 'Blue Car Rental',
            'vendor_code' => 'BLUE CAR RE',
            'service_fee' => 2000,
            'status' => 'active',
            'brand_color' => '#14c2fc',
            'caren_settings' => [
                'online_percentage' => 15,
                'caren_payment_option_id' => 598,
                'link_cms_caren' => false,
                'rental_id' => 11
            ]
        ]);

        CarenVendor::create([
            'name'              => 'Blue Car Rental',
            'caren_rental_id'   => 11,
            'vendor_id'         => $vendor->id,
        ]);

        // 2. Location: Create 3 locations
        $location1 = Location::create([
            'name' => 'Keflavik Airport',
            'caren_settings' => [
                'caren_pickup_location_id' => 44,
                'caren_dropoff_location_id' => 418,
            ]
        ]);

        CarenLocation::create([
            'name'                      => 'Keflavik International Airport',
            'caren_pickup_location_id'  => 44,
            'caren_dropoff_location_id' => 418,
            'location_id'               => $location1->id
        ]);

        // Link the vendor to the location
        VendorLocation::create([
            'vendor_id' => $vendor->id,
            'location_id' => $location1->id,
        ]);

        $location2 = Location::create([
            'name' => 'Reykjavik City Office',
            'caren_settings' => [
                'caren_pickup_location_id' => 51,
                'caren_dropoff_location_id' => 419,
            ]
        ]);

        CarenLocation::create([
            'name'                      => 'Reykjavik City Office',
            'caren_pickup_location_id'  => 44,
            'caren_dropoff_location_id' => 418,
            'location_id'               => $location2->id
        ]);

        // Link the vendor to the location
        VendorLocation::create([
            'vendor_id' => $vendor->id,
            'location_id' => $location2->id,
        ]);

        $location3 = Location::create([
            'name' => 'Address in Keflavik',
            'caren_settings' => [
                'caren_pickup_location_id' => 45,
                'caren_dropoff_location_id' => 420,
            ]
        ]);

        CarenLocation::create([
            'name'                      => 'Keflavik City',
            'caren_pickup_location_id'  => 45,
            'caren_dropoff_location_id' => 420,
            'location_id'               => $location3->id
        ]);

        // Link the vendor to the location
        VendorLocation::create([
            'vendor_id' => $vendor->id,
            'location_id' => $location3->id,
        ]);

        // Initialise "vendor_location_fees" table
        VendorLocationFee::updateOrCreate(
            [
                'vendor_id' => $vendor->id,
                'location_pickup' => $location1->id,
                'location_dropoff' => $location1->id,
                'fee' => 0
            ]
        );

        VendorLocationFee::updateOrCreate(
            [
                'vendor_id' => $vendor->id,
                'location_pickup' => $location1->id,
                'location_dropoff' => $location2->id,
                'fee' => 0
            ]
        );

        VendorLocationFee::updateOrCreate(
            [
                'vendor_id' => $vendor->id,
                'location_pickup' => $location1->id,
                'location_dropoff' => $location3->id,
                'fee' => 0
            ]
        );

        VendorLocationFee::updateOrCreate(
            [
                'vendor_id' => $vendor->id,
                'location_pickup' => $location2->id,
                'location_dropoff' => $location1->id,
                'fee' => 0
            ]
        );

        VendorLocationFee::updateOrCreate(
            [
                'vendor_id' => $vendor->id,
                'location_pickup' => $location2->id,
                'location_dropoff' => $location2->id,
                'fee' => 0
            ]
        );

        VendorLocationFee::updateOrCreate(
            [
                'vendor_id' => $vendor->id,
                'location_pickup' => $location2->id,
                'location_dropoff' => $location3->id,
                'fee' => 0
            ]
        );

        VendorLocationFee::updateOrCreate(
            [
                'vendor_id' => $vendor->id,
                'location_pickup' => $location3->id,
                'location_dropoff' => $location3->id,
                'fee' => 0
            ]
        );

        // Get the cars & extras from the Artisan Command
        Artisan::call('caren:get-info');
    }
}