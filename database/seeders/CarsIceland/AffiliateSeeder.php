<?php

namespace Database\Seeders\CarsIceland;

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
        // I AM REYKJAVIK
        $userData = ['username' => 'reykjavik', 'name' => 'I AM REYKJAVIK', 'email' => 'noemail+aff1@scandinavianehf.com', 'role' => 'affiliate'];
        $user = $this->createUser($userData, bcrypt('reykjavik'));
        Affiliate::create([
            'name'                  => 'I AM REYKJAVIK',
            'commission_percentage' => 17,
            'user_id'               => $user->id,
        ]);

        // ISLANDIA24
        $userData = ['username' => 'islandia24', 'name' => 'ISLANDIA24', 'email' => 'noemail+aff2@scandinavianehf.com', 'role' => 'affiliate'];
        $user = $this->createUser($userData, bcrypt('islandia24'));
        Affiliate::create([
            'name'                  => 'ISLANDIA24',
            'commission_percentage' => 17,
            'user_id'               => $user->id,
        ]);

        // ISLANDE24
        $userData = ['username' => 'islande24', 'name' => 'ISLANDE24', 'email' => 'noemail+aff3@scandinavianehf.com', 'role' => 'affiliate'];
        $user = $this->createUser($userData, bcrypt('islande24'));
        Affiliate::create([
            'name'                  => 'ISLANDE24',
            'commission_percentage' => 17,
            'user_id'               => $user->id,
        ]);

        // ICELAND24
        $userData = ['username' => 'iceland24', 'name' => 'ICELAND24', 'email' => 'noemail+aff4@scandinavianehf.com', 'role' => 'affiliate'];
        $user = $this->createUser($userData, bcrypt('iceland24'));
        Affiliate::create([
            'name'                  => 'ICELAND24',
            'commission_percentage' => 17,
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
