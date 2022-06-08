<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing.index');
    }
}
