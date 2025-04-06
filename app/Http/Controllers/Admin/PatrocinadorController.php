<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patrocinador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatrocinadorController extends Controller
{
    public function index()
    {
        $patrocinadores = Patrocinador::all();
        return view('admin.patrocinadores.index', compact('patrocinadores'));
    }

    public function create()
    {
        return view('admin.patrocinadores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'logotipo' => 'required|image|max:2048',
        ]);

        $path = $request->file('logotipo')->store('patrocinadores', ['disk' => 'public']);

        Patrocinador::create([
            'nombre' => $request->nombre,
            'logotipo' => $path,
        ]);

        return redirect()->route('patrocinadores.index')->with('success', 'Patrocinador creado correctamente.');
    }

    public function edit(Patrocinador $patrocinador)
    {
        return view('admin.patrocinadores.edit', compact('patrocinador'));
    }

    public function update(Request $request, Patrocinador $patrocinador)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'logotipo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logotipo')) {
            Storage::delete($patrocinador->logotipo);
            $path = $request->file('logotipo')->store('patrocinadores', ['disk' => 'public']);
            $patrocinador->logotipo = $path;
        }

        $patrocinador->nombre = $request->nombre;
        $patrocinador->save();

        return redirect()->route('patrocinadores.index')->with('success', 'Patrocinador actualizado correctamente.');
    }

    public function destroy(Patrocinador $patrocinador)
    {
        Storage::delete($patrocinador->logotipo);
        $patrocinador->delete();

        return redirect()->route('patrocinadores.index')->with('success', 'Patrocinador eliminado correctamente.');
    }
}
