<?php

namespace App\View\Components;

use Illuminate\View\Component;

class profile_column extends Component
{
    public $logoImg;
    public $title;
    public $inputName;
    public $inputValue;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($logoImg, $title, $inputName, $inputValue)
    {
        $this->logoImg = $logoImg;
        $this->title = $title;
        $this->inputName = $inputName;
        $this->inputValue = $inputName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile_column');
    }
}
