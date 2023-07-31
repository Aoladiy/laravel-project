<?php

namespace App\View\Components\Forms\Selections;

use App\Models\CarClass;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectClasses extends Component
{
    public $classes;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->classes = CarClass::get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.selections.select-classes');
    }
}
