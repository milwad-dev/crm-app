<?php

namespace Modules\Auth\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\User\Models\User;

class AuthRepo
{
//    public function findById($id)
//    {
//        return $this->query()->whereId($id)->first();
//    }
//
    public function findByEmail($email)
    {
        return $this->query()->whereEmail($email)->first();
    }

    public function getTokenData($request)
    {
        return DB::table('password_resets')->whereEmail($request->email)->first();
    }

    public function getToken($token)
    {
        return DB::table('password_resets')->whereToken($token)->first();
    }

    private function query()
    {
        return User::query();
    }
}
