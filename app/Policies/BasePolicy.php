<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

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

    /**
     * Determine whether the user can create resource.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->is_admin === true) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the resource.
     *
     * @param  \App\User  $user
     * @param  \App\Model  $resource
     * @return mixed
     */
    public function update(User $user, $resource)
    {
        if ($user->is_admin === true) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the resource.
     *
     * @param  \App\User  $user
     * @param  \App\Model  $resource
     * @return mixed
     */
    public function delete(User $user, $resource)
    {
        if ($user->is_admin === true) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the resource.
     *
     * @param  \App\User  $user
     * @param  \App\Model  $resource
     * @return mixed
     */
    public function restore(User $user, $resource)
    {
        if ($user->is_admin === true) {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the resource.
     *
     * @param  \App\User  $user
     * @param  \App\Model  $resource
     * @return mixed
     */
    public function forceDelete(User $user, $resource)
    {
        if ($user->is_admin === true) {
            return true;
        }
    }
}
