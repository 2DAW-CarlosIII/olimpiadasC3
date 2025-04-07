<?php

namespace App\View\Components\Inscripciones;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectCentro extends Component
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
        $centros = \App\Models\Centro
            ::orderBy('muncen', 'asc')
            ->orderBy('dencen', 'asc')
            ->get();
        return view('components.inscripciones.select-centro', [
            'centros' => $centros,
        ]);
    }
}
