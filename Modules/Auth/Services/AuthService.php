<?php

namespace Modules\Auth\Services;

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
            'password' => bcrypt($request->password),
        ]);
    }
}
