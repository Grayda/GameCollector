<?php

namespace App\Policies;

use App\Collection;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CollectionPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
      if ($user->is_admin === true) {
          return true;
      }
    }

    /**
     * Determine whether the user can view any collections.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
      // Only allow viewing if the user has verified their email
      return $user->subscribed() || $user->is_admin;
    }

    /**
     * Determine whether the user can view the collection.
     *
     * @param  \App\User  $user
     * @param  \App\Collection  $collection
     * @return mixed
     */
    public function view(User $user, Collection $collection)
    {
        if($collection->public == true) {
          return true;
        }

        return $collection->created_by === $user->id;
    }

    /**
     * Determine whether the user can create collections.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->subscribed() && !$user->user_plan['over_collection_limit'];
    }

    /**
     * Determine whether the user can update the collection.
     *
     * @param  \App\User  $user
     * @param  \App\Collection  $collection
     * @return mixed
     */
    public function update(User $user, Collection $collection)
    {
        return $user->id === $collection->created_by;
    }

    /**
     * Determine whether the user can delete the collection.
     *
     * @param  \App\User  $user
     * @param  \App\Collection  $collection
     * @return mixed
     */
    public function delete(User $user, Collection $collection)
    {
        return $user->id === $collection->created_by;
    }

    /**
     * Determine whether the user can restore the collection.
     *
     * @param  \App\User  $user
     * @param  \App\Collection  $collection
     * @return mixed
     */
    public function restore(User $user, Collection $collection)
    {
        return $user->id === $collection->created_by;
    }

    /**
     * Determine whether the user can permanently delete the collection.
     *
     * @param  \App\User  $user
     * @param  \App\Collection  $collection
     * @return mixed
     */
    public function forceDelete(User $user, Collection $collection)
    {
        return $user->is_admin;
    }
}
