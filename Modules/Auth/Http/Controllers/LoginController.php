<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Auth\Repositories\AuthRepo;

class LoginController extends Controller
{
    public function view()
    {
        return view('Auth::login');
    }

    public function login(AuthRepo $authRepo)
    {
//        if (auth()->attempt(request(['email', 'passwords'])) == false) return back()->with($notification);
        if (auth()->attempt(request(['email', 'passwords'])) == false) {
            return redirect()->back()->with('error', 'The email or passwords is incorrect, Please try again');
        }
        return redirect()->route('landing.index');
    }
}
