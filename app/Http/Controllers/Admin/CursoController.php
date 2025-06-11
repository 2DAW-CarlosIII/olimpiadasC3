<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('admin.cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ediciones = \App\Models\Edicion::all();
        // eliminar las ediciones que tienen cursos
        $ediciones = $ediciones->filter(function ($edicion) {
            $curso = $edicion->cursos;
            return !($curso);
        });

        return view('admin.cursos.create', compact('ediciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:ediciones,id|unique:cursos,id',
            'nombre' => 'required|string',
        ]);
        Curso::create([
            'id' => $request->id,
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        return view('admin.cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        return view('admin.cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        $curso->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado con éxito.');
    }
}
