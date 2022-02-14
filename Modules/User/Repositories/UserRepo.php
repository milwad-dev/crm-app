<?php

namespace Modules\User\Repositories;

use Modules\User\Models\User;

class UserRepo
{
    public function findByEmail($email)
    {
        return $this->query()->whereEmail($email)->first();
    }

    private function query()
    {
        return User::query();
    }
}
