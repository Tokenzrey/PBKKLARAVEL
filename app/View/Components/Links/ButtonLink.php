<?php

namespace App\View\Components\Links;

use Illuminate\View\Component;

class ButtonLink extends Component
{
    public $type;
    public $variant;
    public $href;
    public $size;
    public $class;
    public $leftIcon;
    public $rightIcon;
    public $leftIconClass;
    public $rightIconClass;
    public $openNewTab;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $type = 'button',
        $variant = 'primary',
        $size = 'base',
        $href = '/',
        $leftIcon = null,
        $rightIcon = null,
        $leftIconClass = '',
        $rightIconClass = '',
        $class = '',
        $openNewTab = false
    ) {
        $this->type = $type;
        $this->variant = $variant;
        $this->size = $size;
        $this->href = $href;
        $this->leftIcon = $leftIcon;
        $this->rightIcon = $rightIcon;
        $this->leftIconClass = $leftIconClass;
        $this->rightIconClass = $rightIconClass;
        $this->class = $class;
        $this->openNewTab = $openNewTab;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.links.buttonLink');
    }
}
