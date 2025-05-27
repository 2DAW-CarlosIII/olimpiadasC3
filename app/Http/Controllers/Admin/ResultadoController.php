<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resultado;
use App\Models\Edicion;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Edicion $edicion)
    {
        $resultados = $edicion->resultados;
        return view('admin.resultados.index', compact('edicion', 'resultados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Edicion $edicion)
    {
        $palmaresEsqueleto = \App\Models\Resultado::getPalmaresEsqueleto(); // Generar el contenido inicial

        return view('admin.resultados.create', compact('edicion', 'palmaresEsqueleto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Edicion $edicion)
    {
        $request->validate([
            'palmares' => 'required|string',
        ]);
        Resultado::create([
            'id' => $request->id,
            'palmares' => $request->palmares,
        ]);

        return redirect()->route('resultados.index')->with('success', 'Resultado creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resultado $resultado)
    {
        return view('admin.resultados.show', compact('resultado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultado $resultado)
    {
        return view('admin.resultados.edit', compact('resultado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultado $resultado)
    {
        $request->validate([
            'palmares' => 'required|string',
        ]);

        $resultado->update([
            'palmares' => $request->palmares,
        ]);

        return redirect()->route('ediciones.resultados.index', $resultado->edicion)->with('success', 'Resultado actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultado $resultado)
    {
        $edicion = $resultado->edicion;
        $resultado->delete();
        return redirect()->route('ediciones.resultados.index', $edicion)->with('success', 'Resultado eliminado con éxito.');
    }
}
