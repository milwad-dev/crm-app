<?php

namespace Modules\Panel\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index()
    {
        return view('Panel::index');
    }
}
