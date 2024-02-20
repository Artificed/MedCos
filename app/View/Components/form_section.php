<?php

namespace App\View\Components;

use Illuminate\View\Component;

class form_section extends Component
{
    public $title;

    public $name;
    public $id;
    public $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $name, $id, $placeholder)
    {
        $this->title = $title;

        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form_section');
    }
}
