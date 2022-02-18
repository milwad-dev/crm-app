<?php

namespace Modules\Share\Components\Panel;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $title;
    public $buttonRoute;
    public $buttonTitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $buttonRoute = null, $buttonTitle = null)
    {
        $this->title = $title;
        $this->buttonRoute = $buttonRoute;
        $this->buttonTitle = $buttonTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('Share::components.panel.breadcrumb');
    }
}
