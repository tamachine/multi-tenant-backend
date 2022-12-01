<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuperAdminPolicy
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
     * Authorization check for superAdmin
     *
     * @param  \App\Models\User     $user
     * @return bool
     */
    public function superAdmin(User $user)
    {
        return $user->superAdminOrHigher();
    }
}
