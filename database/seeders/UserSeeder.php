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
            ['username' => 'carlospcarmona@gmail.com', 'email' => 'carlospcarmona@gmail.com', 'name' => 'Carlos Carmona', 'role' => 'developer'],
            ['username' => 'fran@scandinavianehf.com', 'email' => 'fran@scandinavianehf.com', 'name' => 'Fran Sierra', 'role' => 'developer'],
            ['username' => 'pablo.santamaria@scandinavianehf.com', 'email' => 'pablo.santamaria@scandinavianehf.com', 'name' => 'Pablo Santamaría', 'role' => 'developer'],
            ['username' => 'tamara.rios@scandinavianehf.com', 'email' => 'tamara.rios@scandinavianehf.com', 'name' => 'Tamara Ríos', 'role' => 'developer'],
            ['username' => 'marketing@scandinavianehf.com', 'email' => 'marketing@scandinavianehf.com', 'name' => 'Alberto PC', 'role' => 'superAdmin'],
            ['username' => 'sales@scandinavianehf.com', 'email' => 'sales@scandinavianehf.com', 'name' => 'Miguel', 'role' => 'superAdmin'],
            ['username' => 'ester.molina@scandinavianehf.com', 'email' => 'ester.molina@scandinavianehf.com', 'name' => 'Ester Molina', 'role' => 'superAdmin'],
            ['username' => 'jesus@scandinavianehf.com', 'email' => 'jesus@scandinavianehf.com', 'name' => 'Jesús Prieto', 'role' => 'admin'],
            ['username' => 'claudia@scandinavianehf.com', 'email' => 'claudia@scandinavianehf.com', 'name' => 'Claudia Valdés', 'role' => 'booking'],
            ['username' => 'marcos@scandinavianehf.com', 'email' => 'marcos@scandinavianehf.com', 'name' => 'Marcos Álvarez', 'role' => 'content'],
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
