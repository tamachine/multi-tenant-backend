<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authorization check for booking
     *
     * @param  \App\Models\User     $user
     * @return bool
     */
    public function booking(User $user)
    {
        return $user->bookingOrHigher();
    }
}
