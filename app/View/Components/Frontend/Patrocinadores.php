<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Patrocinadores extends Component
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
        $patrocinadores = \App\Models\Patrocinador::all();
        return view('components.frontend.patrocinadores', [
            'patrocinadores' => $patrocinadores,
        ]);
    }
}
