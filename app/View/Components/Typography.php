<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Typography extends Component
{
    public $as;
    public $class;
    public $weight;
    public $font;
    public $variant;

    /**
     * Create a new component instance.
     *
     * @param string $as
     * @param string $class
     * @param string $weight
     * @param string $font
     * @param string $variant
     */
    public function __construct(
        $as = 'p',
        $class = '',
        $weight = 'regular',
        $font = 'poppins',
        $variant = 'p'
    ) {
        $this->as = $as;
        $this->class = $class;
        $this->weight = $weight;
        $this->font = $font;
        $this->variant = $variant;
    }

    /**
     * Get the view that represents the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.typography');
    }
}
