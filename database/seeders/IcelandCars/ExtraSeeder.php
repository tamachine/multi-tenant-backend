<?php

namespace Database\Seeders\IcelandCars;

use App\Models\CarenExtra;
use App\Models\Extra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the default car data
        $defaultExtra = [
            'vendor_id' => 1,               // no change
            'active' => 1,                  // no change
            'price' => 0,
            'maximum_fee' => 800000,        // no change
            'max_units' => 1,
            'price_mode' => 'per_day',
            'category' => 'standard',
            'included' => 0,
            'insurance_premium' => 0,
        ];

        // 1. FREE Cancelation
        $extraData = $defaultExtra;
        $extraData['name'] = 'FREE Cancelation';
        $extraData['description'] = "Not sure you can make it? Cancel over 48 hours before your rental starts and get a full refund! *No refund available for early returns.";
        $extraData['order_appearance'] = 18;
        $extraData['included'] = 1;
        $extraData['caren_id'] = 624;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 624)->update(['extra_id' => $extra->id]);

        // 2. Tesla Charging Package
        $extraData = $defaultExtra;
        $extraData['name'] = 'Tesla Charging Package';
        $extraData['description'] = "Make sure you can charge your Tesla no matter where you are! Grants access to all Superchargers and every ON and Isorka charging station in Iceland for a fixed daily price.";
        $extraData['order_appearance'] = 19;
        $extraData['caren_id'] = 1405;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 1405)->update(['extra_id' => $extra->id]);

        // 3. Extra Driver
        $extraData = $defaultExtra;
        $extraData['name'] = 'Extra Driver';
        $extraData['description'] = "What beats driving an amazing car around the Land of Fire and Ice? Sharing it with the people you care about! Add an additional driver to your rental and take turns behind the wheel!";
        $extraData['order_appearance'] = 20;
        $extraData['caren_id'] = 8;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 8)->update(['extra_id' => $extra->id]);

        // 4. Unlimited Mileage
        $extraData = $defaultExtra;
        $extraData['name'] = 'Unlimited Mileage';
        $extraData['description'] = "Every one of our rentals includes unlimited mileage, so as long as you have enough fuel, the sky is the limit!";
        $extraData['order_appearance'] = 20;
        $extraData['included'] = 1;
        $extraData['caren_id'] = 167;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 167)->update(['extra_id' => $extra->id]);

       // 5. 4G WiFi
       $extraData = $defaultExtra;
       $extraData['name'] = '4G WiFi';
       $extraData['description'] = 'Lose yourself in the music and the moment, but dont lose your way! Connect to Icelands 4G network no matter where you are for your own peace of mind.';
       $extraData['order_appearance'] = 21;
       $extraData['caren_id'] = 14;
       $extra = Extra::create($extraData);
       CarenExtra::where('caren_id', 14)->update(['extra_id' => $extra->id]);

        // 6. GPS
        $extraData = $defaultExtra;
        $extraData['name'] = 'GPS';
        $extraData['description'] = "Last-generation GPS that will make sure you don't get lost on the way to your destination.";
        $extraData['order_appearance'] = 22;
        $extraData['caren_id'] = 13;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 13)->update(['extra_id' => $extra->id]);

        // 7. GPS (i)
        $extraData = $defaultExtra;
        $extraData['name'] = 'GPS (i)';
        $extraData['description'] = "Last-generation GPS that will make sure you don't get lost on the way to your destination.";
        $extraData['order_appearance'] = 21;
        $extraData['included'] = 1;
        $extraData['caren_id'] = 620;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 620)->update(['extra_id' => $extra->id]);

        // 8. GPS + Extra Driver - Special Offer
        $extraData = $defaultExtra;
        $extraData['name'] = 'GPS + Extra Driver - Special Offer';
        $extraData['description'] = "For limited time only! Add an additional driver to your rental insurance AND don't get lost thanks to a state-of-the-art GPS.";
        $extraData['order_appearance'] = 23;
        $extraData['caren_id'] = 1037;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 1037)->update(['extra_id' => $extra->id]);

        // 9. Child Seat 9-18 kg
        $extraData = $defaultExtra;
        $extraData['name'] = 'Child Seat 9-18 kg';
        $extraData['description'] = "Traveling with children doesn't have to be scary! Make sure they ride safely and comfortably in our child seats and may a dirty diaper be your only concern!";
        $extraData['order_appearance'] = 28;
        $extraData['caren_id'] = 11;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 11)->update(['extra_id' => $extra->id]);

        // 10. Child Seat 15-36 kg
        $extraData = $defaultExtra;
        $extraData['name'] = 'Child Seat 15-36 kg';
        $extraData['description'] = "Traveling with children doesn't have to be scary! Make sure they ride safely and comfortably in our child seats and focus on what really matters: keeping them entertained!";
        $extraData['order_appearance'] = 29;
        $extraData['caren_id'] = 10;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 10)->update(['extra_id' => $extra->id]);

        // 11. Booster Seat
        $extraData = $defaultExtra;
        $extraData['name'] = 'Booster Seat';
        $extraData['description'] = "Is your child too tall for a child seat but not tall enough for the seat belt? Get a booster seat to ensure your child's safety at all times!";
        $extraData['order_appearance'] = 30;
        $extraData['caren_id'] = 12;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 12)->update(['extra_id' => $extra->id]);

        // 12. Camping chair
        $extraData = $defaultExtra;
        $extraData['name'] = 'Camping Chair';
        $extraData['description'] = 'What beats stopping your car above an immense waterfall or overlooking an active volcano? Sitting down in a comfortable camping chair and taking in the view while youre at it!';
        $extraData['order_appearance'] = 35;
        $extraData['caren_id'] = 100;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 100)->update(['extra_id' => $extra->id]);

        // 13. Kitchen Box
        $extraData = $defaultExtra;
        $extraData['name'] = 'Kitchen Box';
        $extraData['description'] = "Want to spend as much time as possible on the road and less time eating inside a restaurant? Effortlessly prepare your food on the go with this handy kitchen box!";
        $extraData['order_appearance'] = 36;
        $extraData['caren_id'] = 99;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 99)->update(['extra_id' => $extra->id]);

        // 14. Sleeping Bag
        $extraData = $defaultExtra;
        $extraData['name'] = 'Sleeping Bag';
        $extraData['description'] = "Sleep comfortably and keep warm wherever you decide to lie down. Inside your rental vehicle or under the stars, the choice is yours! *-10º C sleeping bag.";
        $extraData['order_appearance'] = 38;
        $extraData['caren_id'] = 16;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 16)->update(['extra_id' => $extra->id]);

        // 15. Camping Card
        $extraData = $defaultExtra;
        $extraData['name'] = 'Camping Card';
        $extraData['description'] = 'Get access to a wide range of campsites all over Iceland for a maximum of 28 nights for one family (2 adults and 4 children under 16 years old). *Only available from 15 May to 1 September).';
        $extraData['order_appearance'] = 40;
        $extraData['caren_id'] = 830;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 830)->update(['extra_id' => $extra->id]);  

        // 16. Fuel Discount Card
        $extraData = $defaultExtra;
        $extraData['name'] = 'Fuel Discount Card';
        $extraData['description'] = "Pay -3 ISK per liter at every N1 gas station in Iceland and get 50% off your coffee if you decide to get a late breakfast while you're at it!";
        $extraData['order_appearance'] = 19;
        $extraData['included'] = 1;
        $extraData['caren_id'] = 9;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 9)->update(['extra_id' => $extra->id]);

        // 17. Roof Box
        $extraData = $defaultExtra;
        $extraData['name'] = 'Roof Box';
        $extraData['description'] = "Need extra room for your bowling ball and your electric guitar? Add a roof box to your rental car and take as many things as you want on your Iceland adventure!";
        $extraData['order_appearance'] = 49;
        $extraData['caren_id'] = 18;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 18)->update(['extra_id' => $extra->id]);

        // 18. Vaðlaheiðagöng Tunnel Fee
        $extraData = $defaultExtra;
        $extraData['name'] = 'Vaðlaheiðagöng Tunnel Fee';
        $extraData['description'] = "Want to cut the length of the Ring Road by 10 miles? Don't overthink it and go through Vaðlaheiðagöng Tunnel! 2,500 ISK per passing. +4,500 ISK if not paid in time.";
        $extraData['order_appearance'] = 14;
        $extraData['active'] = 0;
        $extraData['price_mode'] = 'per_rental';
        $extraData['caren_id'] = 915;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 915)->update(['extra_id' => $extra->id]);

        // Insurances:
        // 19. Silver Insurance Plan
        $extraData = $defaultExtra;
        $extraData['name'] = 'Silver Insurance Plan';
        $extraData['description'] = 'The Silver Insurance Plan includes CDW, SCDW & TP coverage. Total deductible (self-risk) of 150,000 ISK.';
        $extraData['category'] = 'insurance';
        $extraData['included'] = 1;
        $extraData['order_appearance'] = 3;
        $extraData['caren_id'] = 366;       
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 366)->update(['extra_id' => $extra->id]);

        // 20. Gold Insurance Plan
        $extraData = $defaultExtra;
        $extraData['name'] = 'Gold Insurance Plan';
        $extraData['description'] = 'Superior coverage thanks to the addition of Gravel Protection and Sand & Ash Protection. Ideal for driving around Iceland (except F-roads) in any vehicle. Total deductible (self-risk) of 65,000 ISK.';
        $extraData['category'] = 'insurance';
        $extraData['order_appearance'] = 5;
        $extraData['caren_id'] = 414;       
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 414)->update(['extra_id' => $extra->id]);

        // 21. Gold Insurance Plan
        $extraData = $defaultExtra;
        $extraData['name'] = 'Gold Insurance Plan';
        $extraData['description'] = 'Superior coverage thanks to the addition of Gravel Protection and Sand & Ash Protection. Ideal for driving around Iceland (except F-roads) in any vehicle. Total deductible (self-risk) of 65,000 ISK.';
        $extraData['category'] = 'insurance';
        $extraData['order_appearance'] = 7;
        $extraData['caren_id'] = 367;       
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 367)->update(['extra_id' => $extra->id]);

        // 22. Platinum Insurance Plan
        $extraData = $defaultExtra;
        $extraData['name'] = 'Platinum Insurance Plan';
        $extraData['description'] = "Go where you please with our TOP coverage and get FREE Wi-Fi while you're at it! Includes all of the above, plus tire & F-road insurance, river crossing protection, damage by animals and towing costs. Total deductible (self-risk) of 0 ISK.";
        $extraData['category'] = 'insurance';
        $extraData['order_appearance'] = 9;
        $extraData['caren_id'] = 413;       
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 413)->update(['extra_id' => $extra->id]);

        // 23. Platinum Insurance Plan
        $extraData = $defaultExtra;
        $extraData['name'] = 'Platinum Insurance Plan';
        $extraData['description'] = "Go where you please with our TOP coverage and get FREE Wi-Fi while you're at it! Includes all of the above, plus tire & F-road insurance, river crossing protection, damage by animals and towing costs. Total deductible (self-risk) of 0 ISK.";
        $extraData['category'] = 'insurance';
        $extraData['order_appearance'] = 11;
        $extraData['caren_id'] = 369;       
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 369)->update(['extra_id' => $extra->id]);

        // 24. Platinum Insurance Plan
        $extraData = $defaultExtra;
        $extraData['name'] = 'Platinum Insurance Plan';
        $extraData['description'] = "Go where you please with our TOP coverage and get FREE Wi-Fi while you're at it! Includes all of the above, plus tire & F-road insurance, river crossing protection, damage by animals and towing costs. Total deductible (self-risk) of 0 ISK.";
        $extraData['category'] = 'insurance';
        $extraData['order_appearance'] = 13;
        $extraData['caren_id'] = 368;       
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 368)->update(['extra_id' => $extra->id]);

        // Link cars to extras (car_extra table)
        DB::unprepared(file_get_contents(__DIR__ . '/car_extra.sql'));
    }
}
