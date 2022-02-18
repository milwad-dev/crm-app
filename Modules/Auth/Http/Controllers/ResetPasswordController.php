<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Modules\Auth\Http\Requests\ChangePasswordRequest;
use Modules\User\Services\UserService;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm()
    {
        return view('Auth::passwords.reset');
    }

    public function reset(ChangePasswordRequest $request)
    {
        UserService::changePassword(auth()->user(), $request->password);
        return redirect()->route('landing.index')->with('success', 'You Change Password Successfully');
    }
}
