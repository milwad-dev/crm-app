<?php

namespace Modules\User\Repositories;

use Modules\Share\Contracts\RepositoriesQueryInterface;
use Modules\User\Models\User;

class UserRepo implements RepositoriesQueryInterface
{
//    INMPORT * User_id For This Part Is Not Work Becaurs Just Admin See This Part

    public function index($user_id)
    {
        return $this->query()->latest()->where('id', '!=', $user_id);
    }

    public function findById($user_id = null, $id)
    {
        return $this->query()->whereId($id)->first();
    }

    public function findByEmail($email)
    {
        return $this->query()->whereEmail($email)->first();
    }

    public function delete($user_id = null, $id)
    {
        return $this->query()->whereId($id)->delete();
    }

//    public function changeStatusEmailVerified($id)
//    {
//        $user = $this->findById($id);
//        if (is_null($user->email_verified_at)) return $this->query()->whereId($id)->update(['email_verified_at' => now()]);
//
//        return $this->query()->whereId($id)->update(['email_verified_at' => null]);
//    }

    private function query()
    {
        return User::query();
    }
}
