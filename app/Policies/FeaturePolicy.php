<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeaturePolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any collections.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
      return $user->is_admin;
    }
}
