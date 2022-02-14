<?php

namespace Modules\Auth\Services;

use Modules\Auth\Contracts\RegisterInterface;
use Modules\User\Models\User;

class RegisterService implements RegisterInterface
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
