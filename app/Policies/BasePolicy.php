<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any resources.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // Only allow viewing if the user has verified their email
        return $user->subscribed() || $user->is_admin === true;
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
        return $user->subscribed() || $user->is_admin === true;
    }

    /**
     * Determine whether the user can create resource.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_admin === true;
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
        return $user->is_admin === true;
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
        return $user->is_admin === true;
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
        return $user->is_admin === true;
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
        return $user->is_admin === true;
    }
}
