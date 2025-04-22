<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100'
        ]);

        Categoria::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoria creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|max:100'
        ]);

        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        Storage::delete($categoria->nombre);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria eliminado correctamente.');
    }
}
