<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Extra;
use App\Models\Location;
use App\Models\User;
use App\Models\Vendor;
use App\Observers\BookingObserver;
use App\Observers\CarObserver;
use App\Observers\ExtraObserver;
use App\Observers\LocationObserver;
use App\Observers\UserObserver;
use App\Observers\VendorObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Booking::observe(BookingObserver::class);
        Car::observe(CarObserver::class);
        Extra::observe(ExtraObserver::class);
        Location::observe(LocationObserver::class);
        User::observe(UserObserver::class);
        Vendor::observe(VendorObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
