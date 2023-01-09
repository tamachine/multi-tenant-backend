<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Str;
use App\Models\User;

class WebToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'web:create-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create a token from an api user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiUserData = [                
                'email' => 'api@scandinavianehf.com', 
                'name' => 'api', 
                'role' => 'api',
                'password' => bcrypt(env('SEEDING_PASSWORD', Str::random(20))),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        ];

        $apiUser = User::firstOrCreate(
            [
                'username' => 'api', 
            ],
            $apiUserData);

        $token = $apiUser->createToken(env('APP_NAME'));

        $this->line("This is the new token to use in ". env('APP_NAME'). ", copy and save it now because it won't be accessible henceforth: ");
        $this->info($token->plainTextToken);                
    }
}
