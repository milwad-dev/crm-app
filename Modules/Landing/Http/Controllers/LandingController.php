<?php

namespace Modules\Landing\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index()
    {
        return view('Landing::index');
    }
}
