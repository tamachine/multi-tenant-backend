<?php

namespace Database\Seeders;

use App\Models\ContactUserDetailsType;
use Illuminate\Database\Seeder;

class ContactUserDetailsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [  "amendments on my booking",
                    "booking cancellation",
                    "make a new booking / Get a quote",
                    "road assistance and travel support",
                    "insurance information",
                    "pick up or drop off information",
                    "other"
                ];

        foreach ($types as $type) { 
            ContactUserDetailsType::create([
                'type'=> $type,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }

}

