<?php

namespace Modules\Share\Components\Panel;

use Illuminate\Contracts\View\View as ViewAlias;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $class;
    public $id;
    public $name;
    public $rows;
    public $placeholder;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = 'form-control', $id = null, $name, $rows = '3', $placeholder = null, $value = null)
    {
        $this->class = $class;
        $this->id = $id;
        $this->name = $name;
        $this->rows = $rows;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return ViewAlias
     */
    public function render()
    {
        return view('Share::components.panel.textarea');
    }
}
