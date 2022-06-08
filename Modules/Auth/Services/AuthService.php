<?php

namespace Modules\Auth\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Auth\Contracts\AuthInterface;
use Modules\User\Models\User;

class AuthService implements AuthInterface
{
    public function store($request)
    {
        return User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'passwords' => bcrypt($request->password),
        ]);
    }

    public function createToken($request)
    {
        return DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => str_random(60),
            'created_at' => Carbon::now()
        ]);
    }

    public function deleteToken($email)
    {
        return DB::table('password_resets')->whereEmail($email)->delete();
    }
}
