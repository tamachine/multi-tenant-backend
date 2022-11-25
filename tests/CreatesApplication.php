<?php

namespace Tests;

use App\Models\Car;
use App\Models\CarenLocation;
use App\Models\CarenVendor;
use App\Models\Extra;
use App\Models\FreeDay;
use App\Models\Location;
use App\Models\Season;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Create a car
     *
     * @param      array   $attributes
     *
     * @return     object  \App\Models\Car
     */
    protected function createCar($attributes = [])
    {
        return Car::factory($attributes)->create();
    }

    /**
     * Create a Caren location
     *
     * @param      array   $attributes
     *
     * @return     object  \App\Models\CarenLocation
     */
    protected function createCarenLocation($attributes = [])
    {
        return CarenLocation::factory($attributes)->create();
    }

    /**
     * Create a Caren vendor
     *
     * @param      array   $attributes
     *
     * @return     object  \App\Models\CarenVendor
     */
    protected function createCarenVendor($attributes = [])
    {
        return CarenVendor::factory($attributes)->create();
    }

    /**
     * Create an extra
     *
     * @param      array   $attributes
     *
     * @return     object  \App\Models\Extra
     */
    protected function createExtra($attributes = [])
    {
        return Extra::factory($attributes)->create();
    }

    /**
     * Create a free day
     *
     * @param      array   $attributes
     *
     * @return     object  \App\Models\FreeDay
     */
    protected function createFreeDay($attributes = [])
    {
        return FreeDay::factory($attributes)->create();
    }

    /**
     * Create a location
     *
     * @param      array   $attributes
     *
     * @return     object  \App\Models\Location
     */
    protected function createLocation($attributes = [])
    {
        return Location::factory($attributes)->create();
    }

     /**
     * Create a season
     *
     * @param      array   $attributes
     *
     * @return     object  \App\Models\Season
     */
    protected function createSeason($attributes = [])
    {
        return Season::factory($attributes)->create();
    }

    /**
     * Create a user
     *
     * @param      array   $attributes
     *
     * @return     object  \App\Models\User
     */
    protected function createUser($attributes = [])
    {
        return User::factory($attributes)->create();
    }

    /**
     * Create a vendor
     *
     * @param      array   $attributes
     *
     * @return     object  \App\Models\Vendor
     */
    protected function createVendor($attributes = [])
    {
        return Vendor::factory($attributes)->create();
    }
}
