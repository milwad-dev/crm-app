<?php

namespace Modules\Landing\Http\Controllers;

use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index()
    {
        return view('Landing::index');
    }
}
