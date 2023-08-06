<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideBarNav extends Component
{
    public $modules;

    public $module;

    public $section;

    public $quiz;

    public $page;

    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modules, $module, $section, $quiz, $class, $page)
    {

        $this->modules = $modules;
        $this->module = $module;
        $this->section = $section;
        $this->quiz = $quiz;
        $this->class = $class;
        $this->page = $page;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-bar-nav');
    }
}
