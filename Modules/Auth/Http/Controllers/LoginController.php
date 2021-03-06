<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;
use Modules\Auth\Repositories\AuthRepo;

class LoginController extends Controller
{
    public function view()
    {
        return view('Auth::login');
    }

    public function login()
    {
        if (auth()->attempt(request(['email', 'passwords'])) == false) {
            return redirect()->back()->with('error', 'The email or passwords is incorrect, Please try again');
        }
        return redirect()->route('landing.index');
    }
}
