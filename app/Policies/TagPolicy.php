<?php

namespace App\Policies;

use App\User;
use Spatie\Tags\Tag as Tag;

use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy extends BasePolicy
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
}
