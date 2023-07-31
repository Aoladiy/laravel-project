<?php

namespace App\View\Components\Forms\Selections;

use App\Models\CarEngine;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectEngines extends Component
{
    public $engines;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->engines = CarEngine::get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.selections.select-engines');
    }
}
