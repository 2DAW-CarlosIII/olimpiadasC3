<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(Edicion $edicion)
    {
        $curso = $edicion->curso;
        return view('admin.cursos.index', compact('curso', 'edicion'));
    }

    public function create(Edicion $edicion)
    {
        return view('admin.cursos.create', compact('edicion'));
    }

    public function store(Request $request, Edicion $edicion)
    {
        $request->validate([
            'num_olimpiada' => 'required|integer',
            'curso_lectivo' => 'required|string|max:255',
            'curso_moodle_id' => 'nullable|integer|unique:cursos,curso_moodle_id',
        ]);

        $edicion->cursos()->create($request->all());

        return redirect()->route('ediciones.cursos.index', $edicion)
                         ->with('success', 'Curso creado correctamente.');
    }

    public function show(Curso $curso)
    {
        return view('admin.cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        $edicion = $curso->edicion;
        return view('admin.cursos.edit', compact('curso', 'edicion'));
    }

    public function update(Request $request, Curso $curso)
    {

        $request->validate([
            'num_olimpiada' => 'required|integer',
            'curso_lectivo' => 'required|string|max:255',
            'curso_moodle_id' => 'nullable|integer|unique:cursos,curso_moodle_id,'
        ]);

        $curso->update($request->all());

        return redirect()->route('ediciones.cursos.index', $curso->edicion_id)
                         ->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Curso $curso)
    {
        $edicion = $curso->edicion;
        $curso->delete();

        return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion])
                         ->with('success', 'Curso eliminado correctamente.');
    }
}
