<?php

namespace Modules\Landing\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function __construct()
    {
        if (auth()->check()) $this->middleware('verified');
    }

    public function index()
    {
        return view('Landing::index');
    }
}
