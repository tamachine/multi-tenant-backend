<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentPolicy
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
     * Authorization check for content
     *
     * @param  \App\Models\User     $user
     * @return bool
     */
    public function content(User $user)
    {
        return $user->contentOrHigher();
    }
}
