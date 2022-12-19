<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScandinavianPolicy
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
     * Authorization check for Scandinavian
     *
     * @param  \App\Models\User     $user
     * @return bool
     */
    public function scandinavian(User $user)
    {
        return in_array ($user->role, ['developer', 'superAdmin', 'admin', 'booking', 'content']);
    }
}
