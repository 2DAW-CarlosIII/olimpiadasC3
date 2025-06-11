<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Edicion $edicion)
    {
        $curso = $edicion->curso;
        return view('admin.cursos.index', compact('curso', 'edicion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Edicion $edicion)
    {
        return view('admin.cursos.create', compact('edicion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,Edicion $edicion)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'url' => 'required|max:255',
            'edicion_id' => 'required|exists:ediciones,id',
        ]);

        $edicion->curso()->create([
            'nombre' => $request->nombre,
            'url' => $request->url,
            'edicion_id' => $edicion->id,
        ]);

        return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion]);
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
        $edicion = $curso->edicion;
        return view('admin.cursos.edit', compact('curso', 'edicion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $edicion = $curso->edicion;
        $curso->delete();
        return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion]);
    }
}
