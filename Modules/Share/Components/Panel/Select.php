<?php

namespace Modules\Share\Components\Panel;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $class;
    public $id;
    public $name;
    public $defaultText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = 'form-select', $id = null, $name, $defaultText = null)
    {
        $this->class = $class;
        $this->id = $id;
        $this->name = $name;
        $this->defaultText = $defaultText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('Share::components.panel.select');
    }
}
