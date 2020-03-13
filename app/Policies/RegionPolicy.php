<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegionPolicy extends BasePolicy
{
    use HandlesAuthorization;
}
