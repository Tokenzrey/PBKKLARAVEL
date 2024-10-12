<?php

namespace App\View\Components\Links;

use Illuminate\View\Component;

class IconLink extends Component
{
    public $variant;
    public $size;
    public $icon;
    public $iconClass;
    public $href;
    public $class;
    public $openNewTab;

    /**
     * Create a new component instance.
     *
     * @param string $variant
     * @param string $size
     * @param string|null $icon
     * @param string $iconClass
     * @param bool $href
     * @param bool $iconClass
     */
    public function __construct(
        $variant = 'outline-primary',
        $size = 'base',
        $icon = null,
        $iconClass = '',
        $class='',
        $openNewTab = false,
        $href = '/'
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->icon = $icon;
        $this->iconClass = $iconClass;
        $this->class = $class;
        $this->href = $href;
        $this->openNewTab = $openNewTab;
    }

    /**
     * Get the view that represents the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.links.iconLink');
    }
}
