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
            ['email' => 'carlospcarmona@gmail.com', 'name' => 'Carlos Carmona', 'role' => 'developer'],
            ['email' => 'fran@scandinavianehf.com', 'name' => 'Fran Sierra', 'role' => 'developer'],
            ['email' => 'pablo.santamaria@scandinavianehf.com', 'name' => 'Pablo Santamaría', 'role' => 'developer'],
            ['email' => 'tamara.rios@scandinavianehf.com', 'name' => 'Tamara Ríos', 'role' => 'developer'],
            ['email' => 'marketing@scandinavianehf.com', 'name' => 'Alberto PC', 'role' => 'superAdmin'],
            ['email' => 'sales@scandinavianehf.com', 'name' => 'Miguel', 'role' => 'superAdmin'],
            ['email' => 'ester.molina@scandinavianehf.com', 'name' => 'Ester Molina', 'role' => 'superAdmin'],
            ['email' => 'jesus@scandinavianehf.com', 'name' => 'Jesús Prieto', 'role' => 'admin'],
            ['email' => 'claudia@scandinavianehf.com', 'name' => 'Claudia Valdés', 'role' => 'booking'],
            ['email' => 'marcos@scandinavianehf.com', 'name' => 'Marcos Álvarez', 'role' => 'content'],
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
