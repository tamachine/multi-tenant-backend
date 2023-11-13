<?php

namespace Database\Seeders\MotorhomeIceland;

use App\Models\CarenExtra;
use App\Models\Extra;
use DB;
use Illuminate\Database\Seeder;

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

        // 1. Unlimited Kilometers
        $extraData = $defaultExtra;
        $extraData['name'] = 'Unlimited Kilometers';
        $extraData['description'] = 'If you are looking to drive a long distance we let you be flexible with unlimited miles/ kilometer.';
        $extraData['included'] = 1;
        $extraData['order_appearance'] = 7;
        $extra = Extra::create($extraData);

        // 2. CDW Insurance
        $extraData = $defaultExtra;
        $extraData['name'] = 'Silver';
        $extraData['description'] = 'INCLUDED. The maximum self risk amount is ISK 350.000 for all cars.';
        $extraData['category'] = 'insurance';
        $extraData['included'] = 1;
        $extraData['order_appearance'] = 1;
        $extraData['caren_id'] = 59;       
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 59)->update(['extra_id' => $extra->id]);

        // 3. SCDW Insurance
        /*
        $extraData = $defaultExtra;
        $extraData['name'] = 'SCDW Insurance';
        $extraData['description'] = 'Super Collision damage waiver (SCDW) is INCLUDED. The maximum self risk amount is ISK 90.000 for all 2wd cars and ISK 120.000 for all 4wd';
        $extraData['category'] = 'insurance';
        $extraData['included'] = 1;
        $extraData['order_appearance'] = 2;
        $extraData['caren_id'] = 58;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 58)->update(['extra_id' => $extra->id]);
        */
        // 4. GP Insurance
        $extraData = $defaultExtra;
        $extraData['name'] = 'Gold';
        $extraData['description'] = 'INCLUDED. This protection includes damage to windscreen and headlights of the car when gravel or rocks get thrown on the vehicle by another car. Self risk amount for broken windscreen is ISK 20.000.';
        $extraData['category'] = 'insurance';
        $extraData['included'] = 1;
        $extraData['order_appearance'] = 3;
        $extraData['caren_id'] = 57;
        $extraData['price_from'] = 2762;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 57)->update(['extra_id' => $extra->id]);

        // 5. TP Insurance
        $extraData = $defaultExtra;
        $extraData['name'] = 'Platinum';
        $extraData['description'] = 'TP covers theft damages of rental vehicle. INCLUDED';
        $extraData['category'] = 'insurance';
        $extraData['included'] = 1;
        $extraData['order_appearance'] = 4;
        $extraData['caren_id'] = 56;
        $extraData['price_from'] = 4472;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 56)->update(['extra_id' => $extra->id]);

        // 6. SAAP Insurance
        /*
        $extraData = $defaultExtra;
        $extraData['name'] = 'SAAP Insurance';
        $extraData['description'] = 'By purchasing SAAP the self risk in case of damage from sand and ash is lowered to ISK 90.000. We offer the SAAP for 1.650 ISK per day.';
        $extraData['category'] = 'insurance';
        $extraData['price'] = 1650;
        $extraData['order_appearance'] = 5;
        $extraData['caren_id'] = 60;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 60)->update(['extra_id' => $extra->id]);
        */
        // 7. Extra driver
        $extraData = $defaultExtra;
        $extraData['name'] = 'Extra driver';
        $extraData['description'] = 'Having an additional driver rent a car will make the trip much more enjoyable and safe for you. Price per day is 800 ISK';
        $extraData['max_units'] = 4;
        $extraData['price'] = 800;
        $extraData['order_appearance'] = 10;
        $extraData['caren_id'] = 90;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 90)->update(['extra_id' => $extra->id]);

        // 8. GPS Garmin
        $extraData = $defaultExtra;
        $extraData['name'] = 'GPS Garmin';
        $extraData['description'] = 'For your adventure in Iceland you\'ll never get lost if you select a GPS as an extra when booking your rental car online. Price per day is 1450 ISK';
        $extraData['price'] = 1450;
        $extraData['order_appearance'] = 9;
        $extraData['caren_id'] = 92;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 92)->update(['extra_id' => $extra->id]);

        // 9. 4G WiFi (free)
        $extraData = $defaultExtra;
        $extraData['name'] = '4G WiFi (free)';
        $extraData['description'] = 'Want to share your experience, update your status on Facebook, post a picture on Instagram or simply browse for restaurants on the road? Having a 4G WiFi router can be incredibly convenient. The modem searches for the best possible connection wherever you are.';
        $extraData['order_appearance'] = 10;
        $extraData['included'] = 1;
        $extraData['caren_id'] = 431;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 431)->update(['extra_id' => $extra->id]);

        // 10. Roof Box
        $extraData = $defaultExtra;
        $extraData['name'] = 'Roof Box';
        $extraData['description'] = 'If you need that extra bit of space for your camping gear and luggage it\'s ideal to rent a roof box. Available only for certain models. Price per day 3.500 ISK';
        $extraData['price'] = 3500;
        $extraData['order_appearance'] = 11;
        $extraData['caren_id'] = 94;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 94)->update(['extra_id' => $extra->id]);

        // 11. Baby Seat
        $extraData = $defaultExtra;
        $extraData['name'] = 'Baby Seat';
        $extraData['description'] = 'We offer certified and safety approved baby seats. 0-13kg, 9-18kg or 15-36kg. Price PER RENTAL is 4000 ISK';
        $extraData['price_mode'] = 'per_rental';
        $extraData['max_units'] = 5;
        $extraData['price'] = 4000;
        $extraData['order_appearance'] = 12;
        $extraData['caren_id'] = 88;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 88)->update(['extra_id' => $extra->id]);

        // 12. Taxes
        $extraData = $defaultExtra;
        $extraData['name'] = 'Taxes';
        $extraData['description'] = 'TAXES included in our price.';
        $extraData['included'] = 1;
        $extraData['order_appearance'] = 15;
        $extra = Extra::create($extraData);

        // 13. Road Fee
        $extraData = $defaultExtra;
        $extraData['name'] = 'Road Fee';
        $extraData['description'] = 'Road Fee included in our prices.';
        $extraData['included'] = 1;
        $extraData['order_appearance'] = 16;
        $extra = Extra::create($extraData);

        // 14. GPS
        $extraData = $defaultExtra;
        $extraData['name'] = 'GPS';
        $extraData['description'] = 'INCLUDED. For your adventure in Iceland you will never get lost.';
        $extraData['order_appearance'] = 9;
        $extraData['caren_id'] = 98;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 98)->update(['extra_id' => $extra->id]);

        // 15. Free Cancellation
        $extraData = $defaultExtra;
        $extraData['name'] = 'Free Cancellation';
        $extraData['description'] = 'FREE cancellation up to 24 hours before your pick up.';
        $extraData['included'] = 1;
        $extraData['order_appearance'] = 17;
        $extra = Extra::create($extraData);

        // 16. WiFi 4G
        $extraData = $defaultExtra;
        $extraData['name'] = 'WiFi 4G';
        $extraData['description'] = 'Want to share your experience, update your status on Facebook, post a picture on Instagram or simply browse for restaurants on the road? Having a 4G WiFi router can be incredibly convenient.';
        $extraData['order_appearance'] = 10;
        $extraData['included'] = 1;
        $extraData['caren_id'] = 297;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 297)->update(['extra_id' => $extra->id]);

        // 17. Liability Waiver (small)
        $extraData = $defaultExtra;
        $extraData['name'] = 'Liability Waiver';
        $extraData['description'] = 'Have total peace of mind with Cars Iceland by choosing Liability Waiver. This reduces your deductible to ZERO.';
        $extraData['price'] = 3890;
        $extraData['order_appearance'] = 6;
        $extraData['caren_id'] = 436;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 436)->update(['extra_id' => $extra->id]);

        // 18. Liability Waiver (medium/large)
        $extraData = $defaultExtra;
        $extraData['name'] = 'Liability Waiver';
        $extraData['description'] = 'Have total peace of mind with Cars Iceland by choosing Liability Waiver. This reduces your deductible to ZERO.';
        $extraData['price'] = 3290;
        $extraData['order_appearance'] = 6;
        $extraData['caren_id'] = 437;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 437)->update(['extra_id' => $extra->id]);

        // 19. Babyseat 9-18 kg
        $extraData = $defaultExtra;
        $extraData['name'] = 'Babyseat 9-18 kg';
        $extraData['description'] = 'We offer certified and safety approved baby seats. This baby seat is suitable for babies 9 - 18 kilograms (1 - 3 years old)';
        $extraData['price_mode'] = 'per_rental';
        $extraData['price'] = 4000;
        $extraData['order_appearance'] = 13;
        $extraData['caren_id'] = 96;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 96)->update(['extra_id' => $extra->id]);

        // 20. Childseat 15-36 kg
        $extraData = $defaultExtra;
        $extraData['name'] = 'Childseat 15-36 kg';
        $extraData['description'] = 'We offer certified and safety approved child seats. This baby seat is suitable for babies 15 - 36 kilograms (4 - 8 years old)';
        $extraData['price_mode'] = 'per_rental';
        $extraData['price'] = 4000;
        $extraData['order_appearance'] = 14;
        $extraData['caren_id'] = 97;
        $extra = Extra::create($extraData);
        CarenExtra::where('caren_id', 97)->update(['extra_id' => $extra->id]);

        // Link cars to extras (car_extra table)
        DB::unprepared(file_get_contents(__DIR__ . '/car_extra.sql'));
    }
}
