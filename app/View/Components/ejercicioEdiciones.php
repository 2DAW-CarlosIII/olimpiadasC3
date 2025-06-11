<?php

namespace App\View\Components;

use App\Models\Curso;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ejercicioEdiciones extends Component
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
        $cursos = Curso::all();
        return view('components.ejercicio-ediciones',['cursos' => $cursos]);
    }
}
