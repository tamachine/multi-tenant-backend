<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Database\Seeders\Landlord\TenantSeeder;

class CreateLandlordTenantsTable extends Migration
{
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();            
            $table->string('name')->unique();
            $table->string('long_name');
            $table->string('domain')->unique();
            $table->string('database')->unique();
            $table->timestamps();
        });

       
        Artisan::call('db:seed', [
            '--class' => TenantSeeder::class
        ]);
    }
}
