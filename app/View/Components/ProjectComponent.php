<?php

namespace App\View\Components;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $project;
    public function __construct(Project $project)
    {


        
        
        //
        $this->project = $project;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project-component');
    }
}
