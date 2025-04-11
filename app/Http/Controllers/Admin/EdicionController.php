<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Edicion;
use Illuminate\Http\Request;

class EdicionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ediciones = Edicion::all();
        return view('admin.ediciones.index', compact('ediciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ediciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'curso_escolar' => 'required|string|max:10',
            'num_olimpiada' => 'required|integer',
            'num_modding' => 'required|integer',
            'num_videojuegos' => 'required|integer',
            'fecha_celebracion' => 'required|date',
            'fecha_apertura' => 'required|date',
            'fecha_cierre' => 'required|date',
            'css_file' => 'required|file'
        ]);

        Edicion::create([
            'curso_escolar' => $request->curso_escolar,
            'num_olimpiada' => $request->num_olimpiada,
            'num_modding' => $request->num_modding,
            'num_videojuegos' => $request->num_videojuegos,
            'fecha_celebracion' => $request->fecha_celebracion,
            'fecha_apertura' => $request->fecha_apertura,
            'fecha_cierre' => $request->fecha_cierre,
            'css_file' => $request->file('css_file')->store('css_files', 'public')
        ]);

        return redirect()->route('ediciones.index')->with('success', 'Edición creada con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Edicion $edicion)
    {
        return view('admin.ediciones.edit', compact('edicion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Edicion $edicion)
    {
        $request->validate([
            'curso_escolar' => 'required|string|max:10',
            'num_olimpiada' => 'required|integer',
            'num_modding' => 'required|integer',
            'num_videojuegos' => 'required|integer',
            'fecha_celebracion' => 'required|date',
            'fecha_apertura' => 'required|date',
            'fecha_cierre' => 'required|date',
            'css_file' => 'required|file'
        ]);

        $edicion->update([
            'curso_escolar' => $request->curso_escolar,
            'num_olimpiada' => $request->num_olimpiada,
            'num_modding' => $request->num_modding,
            'num_videojuegos' => $request->num_videojuegos,
            'fecha_celebracion' => $request->fecha_celebracion,
            'fecha_apertura' => $request->fecha_apertura,
            'fecha_cierre' => $request->fecha_cierre,
            'css_file' => $request->file('css_file')->store('css_files', 'public')
        ]);

        return redirect()->route('ediciones.index')->with('success', 'Edición actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Edicion $edicion)
    {
        $edicion->delete();

        return redirect()->route('ediciones.index')->with('success', 'Edición eliminada con éxito.');
    }
}
