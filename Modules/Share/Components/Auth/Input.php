<?php

namespace Modules\Share\Components\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $class;
    public $type;
    public $id;
    public $name;
    public $placeholder;
    public $index;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = 'form-control', $type = 'text', $id = null, $name, $placeholder = null, $index = 0)
    {
        $this->class = $class;
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('Share::components.auth.input');
    }
}
