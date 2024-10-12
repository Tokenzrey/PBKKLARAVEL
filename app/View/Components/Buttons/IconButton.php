<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class IconButton extends Component
{
    public $variant;
    public $size;
    public $icon;
    public $iconClass;
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @param string $variant
     * @param string $size
     * @param string|null $icon
     * @param string $iconClass
     * @param bool $disabled
     */
    public function __construct(
        $variant = 'outline-primary',
        $size = 'base',
        $icon = null,
        $iconClass = '',
        $disabled = false
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->icon = $icon;
        $this->iconClass = $iconClass;
        $this->disabled = $disabled;
    }

    /**
     * Get the view that represents the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.buttons.iconButton');
    }
}
