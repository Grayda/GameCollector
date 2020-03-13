<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConditionPolicy extends BasePolicy
{
    use HandlesAuthorization;
}
