<?php

namespace Modules\Share\Components\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Label extends Component
{
    public $class;
    public $for;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = 'form-label', $for, $title)
    {
        $this->class = $class;
        $this->for = $for;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('Share::components.auth.label');
    }
}
