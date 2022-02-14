<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Modules\Auth\Http\Requests\SendResetPasswordVerifyCodeRequest;
use Modules\Auth\Http\Requests\ResetPasswordVerifyCodeRequest;
use Modules\Auth\Services\VerifyCodeService;
use Modules\User\Repositories\UserRepo;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showVerifyCodeRequestForm()
    {
        return view('Auth::forgot');
    }

    public function sendVerifyCodeEmail(SendResetPasswordVerifyCodeRequest $request, UserRepo $userRepo)
    {
        $user = $userRepo->findByEmail($request->email);
        VerifyCodeService::delete($user->id);
        if ($user) $user->sendResetPasswordRequestNotification();

        return view('Auth::passwords.enter-verify-code-form');
    }

    public function checkVerifyCode(ResetPasswordVerifyCodeRequest $request)
    {
        $user = resolve(UserRepo::class)->findByEmail($request->email);
        if ($user == null || ! VerifyCodeService::check($user->id, $request->verify_code)) {
            return back()->withErrors(['verify_code' => 'The entered code is not valid!']);
        }
        auth()->loginUsingId($user->id);

        return redirect()->route('passwords.showResetForm');
    }
}
