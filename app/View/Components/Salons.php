<?php

namespace App\View\Components;

use App\Contracts\Repositories\SalonsClientRepositoryContract;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Salons extends Component
{
    public ?array $salons;
    /**
     * Create a new component instance.
     */
    public function __construct(public readonly SalonsClientRepositoryContract $salonsClientRepositoryContract)
    {
        $this->salons = $salonsClientRepositoryContract->getRandomSalons();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panels.salons.salons');
    }
}
