<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resultado;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados = Resultado::all();
        return view('admin.resultados.index',compact('resultados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.resultados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|min:1',
            'palmares' => 'required|string',

        ]);

        Resultado::create([
            'id' => $request->id,
            'palmares' => $request->palmares
        ]);

        return redirect()->route('resultados.index')->with('success', 'Resultado creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultado $resultado)
    {
        return view('admin.resultados.edit',compact('resultado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultado $resultado)
    {
        $request->validate([
            'id' => 'required|min:1', /*no puede ser 0 tiene que ser 1 o mayor*/
            'palmares' => 'required|string',

        ]);

        $resultado->id = $request->id;
        $resultado->palmares = $request->palmares;
        $resultado->save();
        return redirect()->route('resultados.index')->with('success', 'Resultado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultado $resultado)
    {
        $resultado->delete();
        return redirect()->route('resultados.index')->with('success', 'Resultado eliminado correctamente.');
    }
}
