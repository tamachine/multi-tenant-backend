<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
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
     * Authorization check for blog
     *
     * @param  \App\Models\User     $user
     * @return bool
     */
    public function blog(User $user)
    {
        return $user->blogger;
    }
}
