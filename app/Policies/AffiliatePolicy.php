<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AffiliatePolicy
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
     * Authorization check for affiliate
     *
     * @param  \App\Models\User     $user
     * @return bool
     */
    public function affiliate(User $user)
    {
        return $user->role == 'affiliate';
    }
}
