<?php

namespace Database\Seeders\IcelandCars\production;

use App\Models\Affiliate;
use App\Models\User;
use Illuminate\Database\Seeder;

class AffiliateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // I am Affiliate X
        $userData = ['username' => 'james_doe', 'name' => 'Affiliate X', 'email' => 'sdf@asd.c', 'role' => 'affiliate'];
        $user = $this->createUser($userData, bcrypt('ahsuiu23sdfsdf'));
        Affiliate::create([
            'name'                  => 'Affiliate X',
            'commission_percentage' => 1,
            'user_id'               => $user->id,
        ]);
    }

    private function createUser($user, $password)
    {
        $user = array_merge($user, [
            'password' => $password,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return User::create($user);
    }
}
