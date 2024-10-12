<?php

namespace App\View\Components\Links;

use Illuminate\View\Component;

class UnstyledLink extends Component
{
    public $href;
    public $openNewTab;
    public $class;

    /**
     * Create a new component instance.
     *
     * @param string $href
     * @param bool $openNewTab
     * @param string $class
     */
    public function __construct($href, $openNewTab = false, $class = '')
    {
        $this->href = $href;
        $this->openNewTab = $openNewTab;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.links.unstyledLink');
    }
}
