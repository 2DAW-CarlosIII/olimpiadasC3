<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participantes = Participante::all();
        return view('admin.participantes.index', ['participantes' => $participantes]);
    }

    /**
     * Display one resource.
     */
    public function show(Participante $participante)
    {
        return view('admin.participantes.show', compact('participante'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.participantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        Participante::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('participantes.index')->with('success', 'Participante creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Participante $participante)
    {
        return view('admin.participantes.edit', compact('participante'));
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Participante $participante){
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $participante->nombre = $request->nombre;
        $participante->save();

        return redirect()->route('participantes.index')->with('success', 'Participante actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Participante $participante)
    {
        $participante->delete();
        return redirect()->route('participantes.index')->with('success', 'Participante eliminado correctamente.');
    }

}
