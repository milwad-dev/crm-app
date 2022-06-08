<?php

namespace Modules\Share\Components\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OAuth extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('Share::components.auth.o-auth');
    }
}
