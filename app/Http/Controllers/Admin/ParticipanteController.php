<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Grupo;
use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Grupo $grupo)
    {
        $this->authorize('view', $grupo);
        $participantes = $grupo->participantes()->get();
        return view('admin.participantes.index', compact('participantes', 'grupo'));
    }

    /**
     * Display one resource.
     */
    public function show(Participante $participante)
    {
        $this->authorize('view', $participante->grupo);
        return view('admin.participantes.show', compact('participante'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Grupo $grupo)
    {
        $this->authorize('update', $grupo);
        return view('admin.participantes.create', compact('grupo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Grupo $grupo)
    {
        $this->authorize('update', $grupo);
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $grupo->participantes()->create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,

        ]);

        return redirect()->route('grupos.participantes.index', ['grupo' => $grupo])->with('success', 'Participante creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Participante $participante)
    {
        $grupo = $participante->grupo;
        $this->authorize('update', $grupo);
        return view('admin.participantes.edit', compact('participante', 'grupo'));
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Participante $participante){
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $grupo = $participante->grupo;
        $this->authorize('update', $grupo);
        $participante->nombre = $request->nombre;
        $participante->apellidos = $request->apellidos;
        $participante->save();

        return redirect()->route('grupos.participantes.index', ['grupo' => $grupo])->with('success', 'Participante actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Participante $participante)
    {
        $grupo = $participante->grupo;
        $this->authorize('update', $grupo);
        $participante->delete();
        return redirect()->route('grupos.participantes.index', ['grupo' => $grupo])->with('success', 'Participante eliminado correctamente.');
    }

}
