<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $variant;
    public $size;
    public $disabled;
    public $isLoading;
    public $leftIcon;
    public $rightIcon;
    public $leftIconClass;
    public $rightIconClass;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $type = 'button',
        $variant = 'primary',
        $size = 'base',
        $disabled = false,
        $isLoading = false,
        $leftIcon = null,
        $rightIcon = null,
        $leftIconClass = '',
        $rightIconClass = ''
    ) {
        $this->type = $type;
        $this->variant = $variant;
        $this->size = $size;
        $this->disabled = $disabled;
        $this->isLoading = $isLoading;
        $this->leftIcon = $leftIcon;
        $this->rightIcon = $rightIcon;
        $this->leftIconClass = $leftIconClass;
        $this->rightIconClass = $rightIconClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.buttons.button');
    }
}
