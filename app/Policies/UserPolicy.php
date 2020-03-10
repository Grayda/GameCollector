<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends BasePolicy
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
     * Determine whether the user can view any resource.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->is_admin === true) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the resource.
     *
     * @param  \App\User  $user
     * @param  \App\Model  $resource
     * @return mixed
     */
    public function view(User $user, $resource)
    {
        if ($user->is_admin === true) {
            return true;
        }
    }
}
