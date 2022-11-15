<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed these users in all environments
        $users = [
            ['email' => 'carlospcarmona@gmail.com', 'name' => 'Carlos Carmona'],
            ['email' => 'fran@scandinavianehf.com', 'name' => 'Fran Sierra'],
            ['email' => 'pablo.santamaria@scandinavianehf.com', 'name' => 'Pablo Santamaría'],
            ['email' => 'tamara.rios@scandinavianehf.com', 'name' => 'Tamara Ríos'],
            ['email' => 'victor.planchuelo@scandinavianehf.com', 'name' => 'Víctor Planchuelo'],
            ['email' => 'ester.molina@scandinavianehf.com', 'name' => 'Ester Molina'],
        ];

        foreach ($users as $user) {
            $this->create($user, Hash::make(env('SEEDING_PASSWORD', Str::random(20))));
        }
    }

    private function create($user, $password)
    {
        $user = array_merge($user, [
            'password' => $password,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        User::create($user);
    }
}
