<?php

namespace Modules\Share\Components\Panel;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $class;
    public $id;
    public $name;
    public $placeholder;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'text', $class = 'form-control', $id = null, $name, $placeholder = null, $value = null)
    {
        $this->type = $type;
        $this->class = $class;
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('Share::components.panel.input');
    }
}
