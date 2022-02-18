<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Auth\Http\Requests\VerifyCodeRequest;
use Modules\Auth\Services\VerifyCodeService;

class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show()
    {
        return auth()->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('Auth::verify');
    }

    public function verify(VerifyCodeRequest $request)
    {
        if(! VerifyCodeService::check(auth()->id(), $request->verify_code)){
            return back()->withErrors(['verify_code' => 'The entered code is invalid!']);
        }
        auth()->user()->markEmailAsVerified();

        return redirect()->route('landing.index');
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect($this->redirectPath());
        }

        $request->user()->sendEmailVerificationNotification();

        return $request->wantsJson()
            ? new JsonResponse([], 202)
            : back()->with('resent', true);
    }
}
