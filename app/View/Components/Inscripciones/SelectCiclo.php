<?php

namespace App\View\Components\Inscripciones;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectCiclo extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $ciclos = \App\Models\Ciclo
            ::orderBy('grado_id', 'asc')
            ->orderBy('nombre', 'asc')
            ->get();
        return view('components.inscripciones.select-ciclo', [
            'ciclos' => $ciclos,
        ]);
    }
}
