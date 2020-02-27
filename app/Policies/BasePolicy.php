<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
     public function viewAny(User $user)
     {
         return true;
     }

     public function view(User $user, $resource)
     {
         return !is_null($user->email_verified_at);
     }

}
