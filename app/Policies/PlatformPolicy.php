<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlatformPolicy extends BasePolicy
{
    use HandlesAuthorization;
}
