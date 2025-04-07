<?php

namespace App\View\Components\Inscripciones;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectCategoria extends Component
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
        $categorias = \App\Models\Categoria
            ::orderBy('id', 'asc')
            ->get();
        return view('components.inscripciones.select-categoria', [
            'categorias' => $categorias,
        ]);
    }
}
