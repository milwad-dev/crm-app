<?php

namespace Modules\Panel\Http\Controllers;

use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function __construct()
    {
        if (auth()->check()) {
            $this->middleware('verify');
        }
    }

    public function index()
    {
        return view('Panel::index');
    }
}
