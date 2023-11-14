<?php

namespace Database\Seeders\MotorhomeIceland;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

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
            ['username' => 'carlospcarmona@gmail.com', 'email' => 'carlospcarmona@gmail.com', 'name' => 'Carlos', 'role' => 'developer', 'blogger' => 1],
            ['username' => 'fran@scandinavianehf.com', 'email' => 'fran@scandinavianehf.com', 'name' => 'Fran', 'role' => 'developer', 'blogger' => 1],
            ['username' => 'tamara.rios@scandinavianehf.com', 'email' => 'tamara.rios@scandinavianehf.com', 'name' => 'Tamara', 'role' => 'developer', 'blogger' => 1],
            ['username' => 'Alberto', 'email' => 'marketing@scandinavianehf.com', 'name' => 'Alberto', 'role' => 'superAdmin', 'blogger' => 1],
            ['username' => 'Scandinavian', 'email' => 'sales@scandinavianehf.com', 'name' => 'Miguel', 'role' => 'superAdmin', 'blogger' => 1],
            ['username' => 'mafalda@scandinavianehf.com', 'email' => 'mafalda@scandinavianehf.com', 'name' => 'Mafalda', 'role' => 'booking'],
            ['username' => 'nicolas@scandinavianehf.com', 'email' => 'nicolas@scandinavianehf.com', 'name' => 'Nico', 'role' => 'content', 'blogger' => 1],
            ['username' => 'marta@scandinavianehf.com', 'email' => 'marta@scandinavianehf.com', 'name' => 'Marta', 'role' => 'admin', 'blogger' => 1],
            ['username' => 'amparo@scandinavianehf.com', 'email' => 'amparo@scandinavianehf.com', 'name' => 'Amparo', 'role' => 'admin'],
            ['username' => 'johanna@scandinavianehf.com', 'email' => 'johanna@scandinavianehf.com', 'name' => 'Johanna', 'role' => 'admin'],
            ['username' => 'jesus@scandinavianehf.com', 'email' => 'jesus@scandinavianehf.com', 'name' => 'Jesús', 'role' => 'booking'],
            ['username' => 'eva.basulto@scandinavianehf.com', 'email' => 'eva.basulto@scandinavianehf.com', 'name' => 'Eva Basulto', 'role' => 'booking'],
            ['username' => 'maria.cano@scandinavianehf.com', 'email' => 'maria.cano@scandinavianehf.com', 'name' => 'María Cano', 'role' => 'admin'],
            ['username' => 'fernanda@scandinavianehf.com', 'email' => 'fernanda@scandinavianehf.com', 'name' => 'Fernanda', 'role' => 'booking'],
            ['username' => 'claudia@scandinavianehf.com', 'email' => 'claudia@scandinavianehf.com', 'name' => 'Claudia', 'role' => 'booking'],
            ['username' => 'angel@scandinavianehf.com', 'email' => 'angel@scandinavianehf.com', 'name' => 'Ángel', 'role' => 'content', 'blogger' => 1],
            ['username' => 'rasheed@scandinavianehf.com', 'email' => 'rasheed@scandinavianehf.com', 'name' => 'Rasheed', 'role' => 'content', 'blogger' => 1],
            ['username' => 'api', 'email' => 'api@scandinavianehf.com', 'name' => 'api', 'role' => 'api'],
            ['username' => 'josevi@scandinavianehf.com', 'email' => 'josevi@scandinavianehf.com', 'name' => 'Josevi', 'role' => 'content', 'blogger' => 1],
            ['username' => 'maria@scandinavianehf.com', 'email' => 'maria@scandinavianehf.com', 'name' => 'Maria', 'role' => 'developer', 'blogger' => 1],
            ['username' => 'antonio@scandinavianehf.com', 'email' => 'antonio@scandinavianehf.com', 'name' => 'Antonio Jenaro', 'role' => 'developer', 'blogger' => 1],
            ['username' => 'laraliroliero@gmail.com', 'email' => 'laraliroliero@gmail.com', 'name' => 'Tam', 'role' => 'developer', 'blogger' => 1],
        ];

        foreach ($users as $user) {
            $user['password'] = env('SEEDING_PASSWORD');

            User::firstOrCreate(['email' => $user['email']], $user);
        }
    }    
}

