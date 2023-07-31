<?php

namespace App\View\Components\Forms\Selections;

use App\Models\CarCarcase;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectCarcases extends Component
{
    public $carcases;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->carcases = CarCarcase::get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.selections.select-carcases');
    }
}
