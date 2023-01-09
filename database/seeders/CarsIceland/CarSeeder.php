<?php

namespace Database\Seeders\CarsIceland;

use App\Models\Car;
use App\Models\CarenCar;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the default car data
        $defaultCar = [
            'vendor_id' => 1,               // no change
            'active' => 1,
            'online_percentage' => 17,      // no change
            'year' => 2010,
            'ranking' => 8,
            'users_number_votes' => 100,    // no change
            'min_days_booking' => 2,        // no change
            'min_preparation_time' => 1000, // no change
            'adult_passengers' => 4,
            'doors' => 4,                   // no change
            'luggage' => 3,                 // no change
            'units' => 1000,                // no change
            'engine' => 'diesel',
            'transmission' => 'manual',
            'vehicle_type' => 'medium',     // no change
            'f_roads_name' => 'fwd',
            'vehicle_class' => 'car',       // no change
        ];

        // 1. Dacia Duster 4x4 (manual) Free GPS! Model 2019-2020
        $carData = $defaultCar;
        $carData['year'] = 2018;
        $carData['ranking'] = 10;
        $carData['name'] = 'Dacia Duster 4x4 (manual) Free GPS! Model 2019-2020';
        $carData['vehicle_brand'] = 'dacia';
        $carData['car_code'] = 'UDUS';
        $carData['caren_id'] = 173;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 173)->update(['car_id' => $car->id]);

        // 2. Nissan Qashqai 4x4 (manual) Free GPS! Special offer!
        $carData = $defaultCar;
        $carData['ranking'] = 10;
        $carData['name'] = 'Nissan Qashqai 4x4 (manual) Free GPS! Special offer!';
        $carData['vehicle_brand'] = 'nissan';
        $carData['car_code'] = 'UNQA';
        $carData['units'] = 100;
        $carData['fleet_position'] = 12;
        $carData['caren_id'] = 1462;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1462)->update(['car_id' => $car->id]);

        // 3. Kia Sportage 4x4 (automatic) Free GPS! Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Kia Sportage 4x4 (automatic) Free GPS! Special offer!';
        $carData['vehicle_brand'] = 'kia';
        $carData['car_code'] = 'UCRV';
        $carData['transmission'] = 'automatic';
        $carData['fleet_position'] = 13;
        $carData['caren_id'] = 157;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 157)->update(['car_id' => $car->id]);

        // 4. Kia Picanto / Toyota Aygo (manual) Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Kia Picanto / Toyota Aygo (manual) Special offer!';
        $carData['vehicle_brand'] = 'toyota';
        $carData['car_code'] = 'UPIC';
        $carData['engine'] = 'gas';
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 4;
        $carData['caren_id'] = 488;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 488)->update(['car_id' => $car->id]);

        // 5. Kia Rio (manual) Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Kia Rio (manual) Special offer!';
        $carData['vehicle_brand'] = 'kia';
        $carData['car_code'] = 'URIO';
        $carData['fleet_position'] = 5;
        $carData['caren_id'] = 168;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 168)->update(['car_id' => $car->id]);

        // 6. Toyota Yaris (automatic) Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Toyota Yaris (automatic) Special offer!';
        $carData['vehicle_brand'] = 'toyota';
        $carData['car_code'] = 'USYA';
        $carData['transmission'] = 'automatic';
        $carData['fleet_position'] = 6;
        $carData['caren_id'] = 166;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 166)->update(['car_id' => $car->id]);

        // 7. Kia Ceed / Toyota Auris (manual) Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Kia Ceed / Toyota Auris (manual) Special offer!';
        $carData['vehicle_brand'] = 'toyota';
        $carData['car_code'] = 'UCED';
        $carData['fleet_position'] = 7;
        $carData['caren_id'] = 167;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 167)->update(['car_id' => $car->id]);

        // 8. Toyota Corolla (manual) Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Toyota Corolla (manual) Special offer!';
        $carData['vehicle_brand'] = 'toyota';
        $carData['car_code'] = 'UCOR';
        $carData['fleet_position'] = 8;
        $carData['active'] = 0;
        $car = Car::create($carData);

        // 9. Kia Ceed / Toyota Auris (automatic) Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Kia Ceed / Toyota Auris (automatic) Special offer!';
        $carData['vehicle_brand'] = 'kia';
        $carData['car_code'] = 'UAUR';
        $carData['transmission'] = 'automatic';
        $carData['engine'] = 'gas';
        $carData['fleet_position'] = 9;
        $carData['caren_id'] = 198;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 198)->update(['car_id' => $car->id]);

        // 10. Kia Ceed Sportswagon (automatic) Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Kia Ceed Sportswagon (automatic) Special offer!';
        $carData['vehicle_brand'] = 'kia';
        $carData['car_code'] = 'USPW';
        $carData['transmission'] = 'automatic';
        $carData['fleet_position'] = 10;
        $carData['caren_id'] = 489;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 489)->update(['car_id' => $car->id]);

        // 11. Suzuki Jimmy 4x4 (manual) Special offer! Model 2019-2020
        $carData = $defaultCar;
        $carData['name'] = 'Suzuki Jimmy 4x4 (manual) Special offer! Model 2019-2020';
        $carData['vehicle_brand'] = 'suzuki';
        $carData['car_code'] = 'UJIM';
        $carData['adult_passengers'] = 2;
        $carData['engine'] = 'gas';
        $carData['fleet_position'] = 2;
        $carData['caren_id'] = 1408;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1408)->update(['car_id' => $car->id]);

        // 12. Suzuki Vitara 4x4 (manual) Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Suzuki Vitara 4x4 (manual) Special offer!';
        $carData['vehicle_brand'] = 'suzuki';
        $carData['car_code'] = 'UVIM';
        $carData['engine'] = 'gas';
        $carData['fleet_position'] = 2;
        $carData['active'] = 0;
        $car = Car::create($carData);

        // 13. Suzuki Vitara 4x4 (automatic) Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Suzuki Vitara 4x4 (automatic) Special offer!';
        $carData['vehicle_brand'] = 'suzuki';
        $carData['car_code'] = 'UVIM';
        $carData['transmission'] = 'automatic';
        $carData['engine'] = 'gas';
        $carData['fleet_position'] = 12;
        $carData['caren_id'] = 176;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 176)->update(['car_id' => $car->id]);

        // 14. Toyota RAV4 4x4 (manual) Free GPS!
        $carData = $defaultCar;
        $carData['name'] = 'Toyota RAV4 4x4 (manual) Free GPS!';
        $carData['vehicle_brand'] = 'suzuki';
        $carData['car_code'] = 'URVM';
        $carData['fleet_position'] = 14;
        $carData['active'] = 0;
        $car = Car::create($carData);

        // 15. Toyota RAV4 4x4 (automatic) Free GPS!
        $carData = $defaultCar;
        $carData['name'] = 'Toyota RAV4 4x4 (automatic) Free GPS!';
        $carData['vehicle_brand'] = 'suzuki';
        $carData['car_code'] = 'URVA';
        $carData['transmission'] = 'automatic';
        $carData['fleet_position'] = 15;
        $carData['caren_id'] = 175;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 175)->update(['car_id' => $car->id]);

        // 16. Nissan X-Trail / Mitsubishi Outlander 4x4 7 seats (automatic) Free GPS!
        $carData = $defaultCar;
        $carData['name'] = 'Nissan X-Trail / Mitsubishi Outlander 4x4 7 seats (automatic) Free GPS!';
        $carData['vehicle_brand'] = 'nissan';
        $carData['car_code'] = 'UXTR';
        $carData['transmission'] = 'automatic';
        $carData['fleet_position'] = 16;
        $carData['caren_id'] = 673;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 673)->update(['car_id' => $car->id]);

        // 17. Mitsubishi Outlander 4x4 7 seats (automatic) Free GPS!
        $carData = $defaultCar;
        $carData['name'] = 'Mitsubishi Outlander 4x4 7 seats (automatic) Free GPS!';
        $carData['vehicle_brand'] = 'mitsubishi';
        $carData['car_code'] = 'UOUT';
        $carData['fleet_position'] = 17;
        $carData['active'] = 0;
        $car = Car::create($carData);

        // 18. Kia Sorento 4x4 5 seats (automatic) Free GPS!
        $carData = $defaultCar;
        $carData['name'] = 'Kia Sorento 4x4 5 seats (automatic) Free GPS!';
        $carData['vehicle_brand'] = 'kia';
        $carData['car_code'] = 'U5SO';
        $carData['fleet_position'] = 18;
        $carData['active'] = 0;
        $car = Car::create($carData);

        // 19. Kia Sorento 4x4 7 seats (automatic) Free GPS!
        $carData = $defaultCar;
        $carData['name'] = 'Kia Sorento 4x4 7 seats (automatic) Free GPS!';
        $carData['vehicle_brand'] = 'kia';
        $carData['car_code'] = 'U7SO';
        $carData['transmission'] = 'automatic';
        $carData['fleet_position'] = 19;
        $carData['caren_id'] = 178;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 178)->update(['car_id' => $car->id]);

        // 20. Nissan Qashqai 2WD (automatic) Free GPS! Special offer! New model 2019!
        $carData = $defaultCar;
        $carData['name'] = 'Nissan Qashqai 2WD (automatic) Free GPS! Special offer! New model 2019!';
        $carData['vehicle_brand'] = 'nissan';
        $carData['car_code'] = 'UQAU';
        $carData['transmission'] = 'automatic';
        $carData['fleet_position'] = 2;
        $carData['caren_id'] = 1462;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1462)->update(['car_id' => $car->id]);

        // 21. Renault Trafic 9 seats (manual)
        $carData = $defaultCar;
        $carData['name'] = 'Renault Trafic 9 seats (manual)';
        $carData['vehicle_brand'] = 'renault';
        $carData['car_code'] = 'UTRF';
        $carData['fleet_position'] = 21;
        $carData['caren_id'] = 179;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 179)->update(['car_id' => $car->id]);

        // 22. Mercedes Benz GLC CDI 4x4 DIESEL (Automatic) Luxury
        $carData = $defaultCar;
        $carData['name'] = 'Mercedes Benz GLC CDI 4x4 DIESEL (Automatic) Luxury';
        $carData['vehicle_brand'] = 'mercedes';
        $carData['car_code'] = 'ULEX';
        $carData['engine'] = 'gas';
        $carData['fleet_position'] = 22;
        $carData['active'] = 0;
        $car = Car::create($carData);

        // 23. Toyota Land Cruiser 150 4x4 5 seats (automatic) Free GPS! Special Offer!
        $carData = $defaultCar;
        $carData['name'] = 'Toyota Land Cruiser 150 4x4 5 seats (automatic) Free GPS! Special Offer!';
        $carData['vehicle_brand'] = 'toyota';
        $carData['car_code'] = 'U5LA';
        $carData['fleet_position'] = 23;
        $carData['caren_id'] = 154;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 154)->update(['car_id' => $car->id]);

        // 24. Toyota Land Cruiser 150 4x4 7 seats (automatic) Free GPS!
        $carData = $defaultCar;
        $carData['name'] = 'Toyota Land Cruiser 150 4x4 7 seats (automatic) Free GPS!';
        $carData['vehicle_brand'] = 'toyota';
        $carData['car_code'] = 'U7LA';
        $carData['fleet_position'] = 24;
        $carData['caren_id'] = 193;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 193)->update(['car_id' => $car->id]);

        // 25. Land Rover Defender 110 DIESEL 7 seats (manual)
        $carData = $defaultCar;
        $carData['name'] = 'Land Rover Defender 110 DIESEL 7 seats (manual)';
        $carData['vehicle_brand'] = 'land rover';
        $carData['car_code'] = 'U7DE';
        $carData['fleet_position'] = 25;
        $carData['active'] = 0;
        $car = Car::create($carData);

        // 26. Toyota Yaris  (manual) Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Toyota Yaris  (manual) Special offer!';
        $carData['vehicle_brand'] = 'toyota';
        $carData['car_code'] = 'UCYm';
        $carData['fleet_position'] = 5;
        $carData['caren_id'] = 166;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 166)->update(['car_id' => $car->id]);

        // 27. Kia Picanto / Toyota Aygo (automatic) Special offer!
        $carData = $defaultCar;
        $carData['name'] = 'Kia Picanto / Toyota Aygo (automatic) Special offer!';
        $carData['vehicle_brand'] = 'toyota';
        $carData['car_code'] = 'UPIA';
        $carData['transmission'] = 'automatic';
        $carData['engine'] = 'gas';
        $carData['fleet_position'] = 4;
        $carData['caren_id'] = 1283;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1283)->update(['car_id' => $car->id]);

        // 28. BMW X1 4x4 (automatic) LUXURY - Special Offer!
        $carData = $defaultCar;
        $carData['name'] = 'BMW X1 4x4 (automatic) LUXURY - Special Offer!';
        $carData['vehicle_brand'] = 'bmw';
        $carData['car_code'] = 'UBMW';
        $carData['transmission'] = 'automatic';
        $carData['fleet_position'] = 21;
        $carData['caren_id'] = 1348;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1348)->update(['car_id' => $car->id]);
    }
}
