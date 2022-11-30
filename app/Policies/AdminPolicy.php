<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
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
     * Authorization check for admin
     *
     * @param  \App\Models\User     $user
     * @return bool
     */
    public function admin(User $user)
    {
        return $user->adminOrHigher();
    }
}
