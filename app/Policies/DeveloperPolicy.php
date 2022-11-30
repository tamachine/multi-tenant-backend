<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeveloperPolicy
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
     * Authorization check for developer
     *
     * @param  \App\Models\User     $user
     * @return bool
     */
    public function developer(User $user)
    {
        return $user->isDeveloper();
    }
}
