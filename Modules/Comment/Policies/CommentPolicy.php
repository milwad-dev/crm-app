<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\User;

class CommentPolicy
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
