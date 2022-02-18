<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Services\AuthService;

class RegisterController extends Controller
{
    public function view()
    {
        return view('Auth::register');
    }

    public function register(RegisterRequest $request, AuthService $registerService)
    {
        $user = $registerService->store($request);
        auth()->login($user);
        return redirect()->route('landing.index');
    }
}
