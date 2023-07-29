<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InformationMenu extends Component
{
    public array $menu = [
        [
            'title' => 'О компании',
            'route' => 'about',
        ],
        [
            'title' => 'Контактная информация',
            'route' => 'contacts',
        ],
        [
            'title' => 'Условия продаж',
            'route' => 'sale',
        ],
        [
            'title' => 'Финансовый отдел',
            'route' => 'finance',
        ],
        [
            'title' => 'Для клиентов',
            'route' => 'clients',
        ],
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(public readonly string $template)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panels.information-menu.' . $this->template);
    }
}
