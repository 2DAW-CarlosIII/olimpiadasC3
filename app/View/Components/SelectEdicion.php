<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use \App\Models\Edicion;

class SelectEdicion extends Component
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
        $ediciones = Edicion::all();
        return view('components.select-edicion')->with('ediciones', $ediciones);
    }
}
