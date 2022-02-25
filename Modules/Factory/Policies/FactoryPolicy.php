<?php

namespace Modules\Factory\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\User;

class FactoryPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }
}
