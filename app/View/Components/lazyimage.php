<?php

namespace App\View\Components;

use Illuminate\View\Component;

class lazyimage extends Component
{
    public $src;
    public $placeholder;
    public $alt;
    public $class;
    public $id;

    /**
     * Create a new component instance.
     *
     * @param  string  $src
     * @param  string  $placeholder
     * @param  string  $alt
     * @param  string  $class
     * @param  string  $id
     * @return void
     */
    public function __construct($src, $placeholder = '/placeholder.jpg', $alt = "Le Carnot", $class, $id = null)
    {
        $this->src = $src;
        $this->placeholder = $placeholder;
        $this->alt = $alt;
        $this->class = $class;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lazyimage');
    }
}
