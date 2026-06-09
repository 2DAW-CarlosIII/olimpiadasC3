<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('admin.cursos.index', compact('cursos'));
    }
    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return view('admin.cursos.show', compact('curso'));
    }
    public function create()
    {
        return view('admin.cursos.create');
    }
    public function store(Request $request)
    {
        $curso = Curso::create($request->all());
        //dd($curso->id);
        return redirect()->action([self::class, 'show'], ['curso' => $curso->id]);
    }
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('admin.cursos.edit', compact('curso'));
    }
    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());
        return redirect()->action([self::class, 'show'], ['curso' => $curso->id]);
    }
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return redirect()->action([self::class, 'index']);
    }

}
