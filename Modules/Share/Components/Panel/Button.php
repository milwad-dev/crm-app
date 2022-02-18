<?php

namespace Modules\Share\Components\Panel;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $class;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'submit', $class = 'btn btn-primary me-1 waves-effect waves-float waves-light', $title)
    {
        $this->type = $type;
        $this->class = $class;
        $this->title = $title;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('Share::components.panel.button');
    }
}
