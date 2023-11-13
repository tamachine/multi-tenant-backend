<?php

namespace Database\Seeders\IcelandCars;

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
        // 1. Vendor: Create Lotus
        $vendor = Vendor::create([
            'name' => 'LOTUS',
            'vendor_code' => 'LOTUS',
            'service_fee' => 0,
            'status' => 'active',
            'brand_color' => '#9e233f',
            'caren_settings' => [
                'online_percentage' => 15,
                'caren_payment_option_id' => 598,
                'link_cms_caren' => false,
                'rental_id' => 6
            ]
        ]);

        CarenVendor::create([
            'name'              => 'Lotus',
            'caren_rental_id'   => 6,
            'vendor_id'         => $vendor->id,
        ]);

        // 2. Location: Create 3 locations
        $location1 = Location::create([
            'name' => 'Keflavik International Airport',
            'caren_settings' => [
                'caren_pickup_location_id' => 486,
                'caren_dropoff_location_id' => 487,
            ],
            'order_appearance' => 1
        ]);

        CarenLocation::create([
            'name'                      => 'Keflavik International Airport',
            'caren_pickup_location_id'  => 486,
            'caren_dropoff_location_id' => 487,
            'location_id'               => $location1->id
        ]);

        // Link the vendor to the location
        VendorLocation::create([
            'vendor_id' => $vendor->id,
            'location_id' => $location1->id,
        ]);

        $location2 = Location::create([
            'name' => 'Address in Keflavik',
            'caren_settings' => [
                'caren_pickup_location_id' => 9,
                'caren_dropoff_location_id' => 9,
            ],
            'order_appearance' => 2
        ]);

        CarenLocation::create([
            'name'                      => 'Address in Keflavik',
            'caren_pickup_location_id'  => 9,
            'caren_dropoff_location_id' => 9,
            'location_id'               => $location2->id
        ]);

        // Link the vendor to the location
        VendorLocation::create([
            'vendor_id' => $vendor->id,
            'location_id' => $location2->id,
        ]);

        $location3 = Location::create([
            'name' => 'Address in Reykjavik',
            'caren_settings' => [
                'caren_pickup_location_id' => 8,
                'caren_dropoff_location_id' => 8,
            ],
            'order_appearance' => 3
        ]);

        CarenLocation::create([
            'name'                      => 'Address in Reykjavik',
            'caren_pickup_location_id'  => 8,
            'caren_dropoff_location_id' => 8,
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
                'location_dropoff' => $location1->id,
                'fee' => 0
            ]
        );

        VendorLocationFee::updateOrCreate(
            [
                'vendor_id' => $vendor->id,
                'location_pickup' => $location3->id,
                'location_dropoff' => $location2->id,
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
