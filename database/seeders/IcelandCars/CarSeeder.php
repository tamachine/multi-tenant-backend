<?php

namespace Database\Seeders\IcelandCars;

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
            'units' => 0,                // no change
            'engine' => 'diesel',
            'transmission' => 'manual',
            'vehicle_type' => 'medium',     // no change
            'f_roads_name' => 'fwd',
            'vehicle_class' => 'car',       // no change
        ];

        // 1. Dacia Duster 4x4 (manual)
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 9.5;
        $carData['name'] = 'Dacia Duster 4x4 (manual)';
        $carData['vehicle_brand'] = 'dacia'; 
        $carData['engine'] = 'gas';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 187;
        $carData['luggage'] = 3;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 50;
        $carData['caren_id'] = 921;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 921)->update(['car_id' => $car->id]);

        // 2. Dacia Duster 4x4 + Roof Top Tent
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 9.2;
        $carData['name'] = 'Dacia Duster 4x4 + Roof Top Tent';
        $carData['vehicle_brand'] = 'dacia'; 
        $carData['engine'] = 'gas';
        $carData['vehicle_type'] = 'Campers';  //??? en RA medium en api campers
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 98;
        $carData['luggage'] = 3;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 110;
        $carData['caren_id'] = 1250;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1250)->update(['car_id' => $car->id]);

        // 3. Jeep Compass 4x4 (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 8.3;
        $carData['name'] = 'Jeep Compass 4x4 (automatic)';
        $carData['vehicle_brand'] = 'jeep'; 
        $carData['engine'] = 'gas';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 83;
        $carData['luggage'] = 4;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 70;
        $carData['caren_id'] = 1928;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1928)->update(['car_id' => $car->id]);

        // 4. Jeep Renegade 4x4 (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 9.5;
        $carData['name'] = 'Jeep Renegade 4x4 (automatic)';
        $carData['vehicle_brand'] = 'jeep'; 
        $carData['engine'] = 'gas';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 103;
        $carData['luggage'] = 3;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 75;
        $carData['caren_id'] = 1879;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1879)->update(['car_id' => $car->id]);

        // 5. Kia Ceed (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2021;
        $carData['ranking'] = 8.9;
        $carData['name'] = 'Kia Ceed (automatic)';
        $carData['vehicle_brand'] = 'Kia'; 
        $carData['engine'] = 'gas';
        $carData['vehicle_type'] = 'small';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 95;
        $carData['luggage'] = 3;
        $carData['fleet_position'] = 30;
        $carData['caren_id'] = 888;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 888)->update(['car_id' => $car->id]);

        // 6. Kia Ceed Wagon (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 8.7;
        $carData['name'] = 'Kia Ceed Wagon (automatic)';
        $carData['vehicle_brand'] = 'Kia'; 
        $carData['engine'] = 'gas';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 70;
        $carData['luggage'] = 5;
        $carData['fleet_position'] = 35;
        $carData['caren_id'] = 891;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 891)->update(['car_id' => $car->id]);

        // 7. Kia Sorento 4x4 - 7 seats (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2023;
        $carData['ranking'] = 9.1;
        $carData['name'] = 'Kia Sorento 4x4 - 7 seats (automatic)';
        $carData['vehicle_brand'] = 'Kia'; 
        $carData['engine'] = 'gas';
        $carData['vehicle_type'] = 'large';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 7;
        $carData['users_number_votes'] = 97;
        $carData['luggage'] = 5;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 80;
        $carData['caren_id'] = 1267;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1267)->update(['car_id' => $car->id]);

        // 8. Kia Sportage 4x4 (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 9.0;
        $carData['name'] = 'Kia Sportage 4x4 (automatic)';
        $carData['vehicle_brand'] = 'Kia'; 
        $carData['engine'] = 'gas';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 125;
        $carData['luggage'] = 4;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 111;
        $carData['caren_id'] = 901;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 901)->update(['car_id' => $car->id]);

        // 9. Kia X-Ceed (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2021;
        $carData['ranking'] = 9.7;
        $carData['name'] = 'Kia X-Ceed (automatic)';
        $carData['vehicle_brand'] = 'Kia'; 
        $carData['engine'] = 'gas';
        $carData['vehicle_type'] = 'small';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 90;
        $carData['luggage'] = 3;
        $carData['f_roads_name'] = 'wfd';
        $carData['fleet_position'] = 40;
        $carData['caren_id'] = 1749;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1749)->update(['car_id' => $car->id]);

         // 10. Land Rover Defender 4x4
         $carData = $defaultCar;
         $carData['year'] = 2022;
         $carData['ranking'] = 9.0;
         $carData['name'] = 'Land Rover Defender 4x4';
         $carData['vehicle_brand'] = 'land rover';
         $carData['vehicle_type'] = 'luxury';
         $carData['transmission'] = 'automatic';
         $carData['doors'] = 5;
         $carData['adult_passengers'] = 5;
         $carData['users_number_votes'] = 78;
         $carData['luggage'] = 5;
         $carData['f_roads_name'] = '4wd';
         $carData['fleet_position'] = 90;
         $carData['caren_id'] = 1627;
         $car = Car::create($carData);
         CarenCar::where('caren_id', 1627)->update(['car_id' => $car->id]);

         // 11. Land Rover Discovery Luxury 4x4 - 7 seats
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 9.6;
        $carData['name'] = 'Land Rover Discovery Luxury 4x4 - 7 seats';
        $carData['vehicle_brand'] = 'land rover'; 
        $carData['vehicle_type'] = 'luxury';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 7;
        $carData['users_number_votes'] = 59;
        $carData['luggage'] = 5;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 97;
        $carData['caren_id'] = 1109;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1109)->update(['car_id' => $car->id]);

        // 12. Lexus UX250H 4x4 (automatic)
        // $carData = $defaultCar;
        // $carData['year'] = 2023;
        // $carData['ranking'] = 9.5;
        // $carData['name'] = 'Lexus UX250H 4x4 (automatic)';
        // $carData['vehicle_brand'] = 'lexus'; 
        // $carData['engine'] = 'gas';
        // $carData['transmission'] = 'automatic';
        // $carData['doors'] = 5;
        // $carData['adult_passengers'] = 5;
        // $carData['users_number_votes'] = 187;
        // $carData['luggage'] = 2;
        // $carData['f_roads_name'] = '4wd'; 
        // // ? $carData['fleet_position'] = ;
        // $carData['caren_id'] = 2035;
        // $car = Car::create($carData);
        // CarenCar::where('caren_id', 2035)->update(['car_id' => $car->id]);

        // 13. Mercedes Benz Vito Tourer 4x4 - 9 seater (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 10;
        $carData['name'] = 'Mercedes Benz Vito Tourer 4x4 - 9 seater (automatic)';
        $carData['vehicle_brand'] = 'mercedes'; 
        $carData['vehicle_type'] = 'passengers';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 9;
        $carData['users_number_votes'] = 61;
        $carData['luggage'] = 9;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 120;
        $carData['caren_id'] = 1106;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1106)->update(['car_id' => $car->id]);

        // 14. Subaru Forester 4x4 (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2019;
        $carData['ranking'] = 8.9;
        $carData['name'] = 'Subaru Forester 4x4 (automatic)';
        $carData['vehicle_brand'] = 'subaru'; 
        $carData['engine'] = 'gas';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 107;
        $carData['luggage'] = 5;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 80;
        $carData['caren_id'] = 903;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 903)->update(['car_id' => $car->id]);

        // 15. Suzuki Jimny 4x4 (manual) - 2 seats only
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 9.8;
        $carData['name'] = 'Suzuki Jimny 4x4 (manual) - 2 seats only';
        $carData['vehicle_brand'] = 'suzuki'; 
        $carData['engine'] = 'gas';
        $carData['vehicle_type'] = 'small';
        $carData['doors'] = 3;
        $carData['adult_passengers'] = 2;
        $carData['users_number_votes'] = 154;
        $carData['luggage'] = 4;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 58;
        $carData['caren_id'] = 1595;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1595)->update(['car_id' => $car->id]);

        // 16. Suzuki Vitara 4x4 (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2021;
        $carData['ranking'] = 9.5;
        $carData['name'] = 'Suzuki Vitara 4x4 (automatic)';
        $carData['vehicle_brand'] = 'dacia'; 
        $carData['engine'] = 'gas';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 187;
        $carData['luggage'] = 3;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 64;
        $carData['caren_id'] = 1745;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1745)->update(['car_id' => $car->id]);

        // 17. Tesla Model 3 - Long Range 4x4
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 9.3;
        $carData['name'] = 'Tesla Model 3 - Long Range 4x4';
        $carData['vehicle_brand'] = 'tesla'; 
        $carData['engine'] = 'electric';
        $carData['vehicle_type'] = 'small';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 61;
        $carData['luggage'] = 3;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 35;
        $carData['caren_id'] = 1992;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1992)->update(['car_id' => $car->id]);

        // 18. Tesla Model Y - Long Range 4x4
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 9.6;
        $carData['name'] = 'Tesla Model Y - Long Range 4x4';
        $carData['vehicle_brand'] = 'tesla'; 
        $carData['engine'] = 'electric';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 48;
        $carData['luggage'] = 3;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 38;
        $carData['caren_id'] = 1868;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1868)->update(['car_id' => $car->id]);


        // 19. Toyota Aygo (manual)
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 8.7;
        $carData['name'] = 'Toyota Aygo (manual)';
        $carData['vehicle_brand'] = 'toyota'; 
        $carData['engine'] = 'gas';
        $carData['vehicle_type'] = 'small';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 4;
        $carData['users_number_votes'] = 117;
        $carData['luggage'] = 1;
        $carData['fleet_position'] = 5;
        $carData['caren_id'] = 894;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 894)->update(['car_id' => $car->id]);

        // 20. Toyota Highlander GX 4x4 - 7 seats (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 9.1;
        $carData['name'] = 'Toyota Highlander GX 4x4 - 7 seats (automatic)';
        $carData['vehicle_brand'] = 'toyota'; 
        $carData['engine'] = 'gas';
        $carData['vehicle_type'] = 'large';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 7;
        $carData['users_number_votes'] = 83;
        $carData['luggage'] = 5;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 85;
        $carData['caren_id'] = 1772;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1772)->update(['car_id' => $car->id]);

        // 21. Toyota Hilux 4x4 Camper
        // $carData = $defaultCar;
        // $carData['year'] = 2024;
        // $carData['ranking'] = 9.5;
        // $carData['name'] = 'Toyota Hilux 4x4 Camper';
        // $carData['vehicle_brand'] = 'toyota'; 
        // $carData['vehicle_type'] = 'campers';
        // $carData['transmission'] = 'automatic';
        // $carData['doors'] = 4;
        // $carData['adult_passengers'] = 4;
        // $carData['users_number_votes'] = 187;
        // $carData['luggage'] = 2;
        // $carData['f_roads_name'] = '4wd';
        // // ? $carData['fleet_position'] = ;
        // $carData['caren_id'] = 2121;
        // $car = Car::create($carData);
        // CarenCar::where('caren_id', 2121)->update(['car_id' => $car->id]);

        // 22. Toyota Hilux 4x4 Double Cap w/Hardtop - (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 9.4;
        $carData['name'] = 'Toyota Hilux 4x4 Double Cap w/Hardtop - (automatic)';
        $carData['vehicle_brand'] = 'toyota'; 
        $carData['vehicle_type'] = 'large';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 4;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 45;
        $carData['luggage'] = 8;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 111;
        $carData['caren_id'] = 1771;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1771)->update(['car_id' => $car->id]);

        // 23. Toyota Land Cruiser 4x4 35” Modified Super Jeep
        // $carData = $defaultCar;
        // $carData['year'] = 2022;
        // $carData['ranking'] = 9.5;
        // $carData['name'] = 'Toyota Land Cruiser 4x4 35” Modified Super Jeep';
        // $carData['vehicle_brand'] = 'toyota'; 
        // $carData['vehicle_type'] = 'large';
        // $carData['transmission'] = 'automatic';
        // $carData['doors'] = 5;
        // $carData['adult_passengers'] = 5;
        // $carData['users_number_votes'] = 187;
        // $carData['luggage'] = 5;
        // $carData['f_roads_name'] = '4wd';
        
        
        // // ? $carData['fleet_position'] = ;
        // $carData['caren_id'] = 2088;
        // $car = Car::create($carData);
        // CarenCar::where('caren_id', 2088)->update(['car_id' => $car->id]);

        // 24. Toyota Land Cruiser GX 4x4 - 7 seats (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2021;
        $carData['ranking'] = 9.8;
        $carData['name'] = 'Toyota Land Cruiser GX 4x4 - 7 seats (automatic)';
        $carData['vehicle_brand'] = 'toyota'; 
        $carData['vehicle_type'] = 'large';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 7;
        $carData['users_number_votes'] = 78;
        $carData['luggage'] = 5;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 90;
        $carData['caren_id'] = 896;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 896)->update(['car_id' => $car->id]);

        // 25. Toyota Rav4 - 4x4 (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2021;
        $carData['ranking'] = 9.7;
        $carData['name'] = 'Toyota Rav4 - 4x4 (automatic)';
        $carData['vehicle_brand'] = 'toyota'; 
        $carData['engine'] = 'gas';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 147;
        $carData['luggage'] = 4;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 64;
        $carData['caren_id'] = 1593;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 1593)->update(['car_id' => $car->id]);

        // 26. Toyota Yaris (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2021;
        $carData['ranking'] = 8.7;
        $carData['name'] = 'Toyota Yaris (automatic)';
        $carData['vehicle_brand'] = 'toyota'; 
        $carData['engine'] = 'gas';
        $carData['vehicle_type'] = 'small';
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 5;
        $carData['users_number_votes'] = 113;
        $carData['luggage'] = 1;
        $carData['fleet_position'] = 14;
        $carData['caren_id'] = 887;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 887)->update(['car_id' => $car->id]);

        // 27. Volkswagen Caravelle 4x4 - 9 seater (automatic)
        $carData = $defaultCar;
        $carData['year'] = 2022;
        $carData['ranking'] = 9.8;
        $carData['name'] = 'Volkswagen Caravelle 4x4 - 9 seater (automatic)';
        $carData['vehicle_brand'] = 'volkswagen'; 
        $carData['vehicle_type'] = 'passengers'; 
        $carData['transmission'] = 'automatic';
        $carData['doors'] = 5;
        $carData['adult_passengers'] = 9;
        $carData['users_number_votes'] = 34;
        $carData['luggage'] = 9;
        $carData['f_roads_name'] = '4wd';
        $carData['fleet_position'] = 111;
        $carData['caren_id'] = 899;
        $car = Car::create($carData);
        CarenCar::where('caren_id', 899)->update(['car_id' => $car->id]);


    }
}
