<?php

namespace Modules\Share\Components\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $class;
    public $type;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = 'btn btn-primary w-100', $type = 'submit', $title)
    {
        $this->class = $class;
        $this->type = $type;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('Share::components.auth.button');
    }
}
