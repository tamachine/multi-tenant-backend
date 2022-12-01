<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * @param  object $user \Illuminate\Database\Eloquent\Model
     *
     * @return void
     */
    public function deleting(User $user)
    {
        // As we use soft deletes, the user record still exists in the database
        // This causes an issue because the email column is unique
        // so when the user is deleted we prepend a unique key
        // to their original email address to avoid conflicts
        $prefix = 'DELETED-' . now()->timestamp;
        $user->email = $prefix . '+' . $user->email;
        $user->save();
    }
}
