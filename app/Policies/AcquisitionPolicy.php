<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcquisitionPolicy extends BasePolicy
{
    use HandlesAuthorization;
}
