<?php

namespace Database\Seeders\CarsIceland;

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
            ['username' => 'pablo.santamaria@scandinavianehf.com', 'email' => 'pablo.santamaria@scandinavianehf.com', 'name' => 'Pablo', 'role' => 'developer', 'blogger' => 1],
            ['username' => 'tamara.rios@scandinavianehf.com', 'email' => 'tamara.rios@scandinavianehf.com', 'name' => 'Tamara', 'role' => 'developer', 'blogger' => 1],
            ['username' => 'Alberto', 'email' => 'marketing@scandinavianehf.com', 'name' => 'Alberto', 'role' => 'superAdmin', 'blogger' => 1],
            ['username' => 'Scandinavian', 'email' => 'sales@scandinavianehf.com', 'name' => 'Miguel', 'role' => 'superAdmin', 'blogger' => 1],
            ['username' => 'ester.molina@scandinavianehf.com', 'email' => 'ester.molina@scandinavianehf.com', 'name' => 'Ester', 'role' => 'superAdmin', 'blogger' => 1],
            ['username' => 'mafalda@scandinavianehf.com', 'email' => 'mafalda@scandinavianehf.com', 'name' => 'Mafalda', 'role' => 'booking'],
            ['username' => 'julien@scandinavianehf.com', 'email' => 'julien@scandinavianehf.com', 'name' => 'Julien', 'role' => 'content', 'blogger' => 1],
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
            ['username' => 'marcos@scandinavianehf.com', 'email' => 'marcos@scandinavianehf.com', 'name' => 'Marcos', 'role' => 'content', 'blogger' => 1],
            ['username' => 'rasheed@scandinavianehf.com', 'email' => 'rasheed@scandinavianehf.com', 'name' => 'Rasheed', 'role' => 'content', 'blogger' => 1],
            ['username' => 'api', 'email' => 'api@scandinavianehf.com', 'name' => 'api', 'role' => 'api'],
            ['username' => 'ester@scandinavianehf.com', 'email' => 'ester@scandinavianehf.com', 'name' => 'Ester', 'role' => 'developer', 'blogger' => 1],
        ];

        foreach ($users as $user) {
            $this->create($user, bcrypt(env('SEEDING_PASSWORD', Str::random(20))));
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
