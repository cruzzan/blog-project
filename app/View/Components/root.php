<?php

namespace App\View\Components;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\View\Component;

class root extends Component
{
    private ViewFactory $viewFactory;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ViewFactory $factory)
    {
        $this->viewFactory = $factory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return $this->viewFactory->make('components.root');
    }
}
