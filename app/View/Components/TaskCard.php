<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TaskCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $task;
    public $class;
    public function __construct($task, $class)
    {
        $this->task = $task;
        $this->class =$class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.task-card');
    }
}
