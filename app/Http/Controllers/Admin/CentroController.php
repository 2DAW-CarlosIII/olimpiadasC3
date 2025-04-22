<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Centro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centros = Centro::all();
        return view('admin.centros.index', compact('centros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $municipios = Centro::select('muncen')->orderBy('muncen')->distinct()->get();
        $titularidades = Centro::select('titularidad')->orderBy('titularidad')->distinct()->get();
        return view('admin.centros.create', ['municipios' => $municipios,
                                            'titularidades' => $titularidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codcen' => 'required|max:100',
            'dencen' => 'required|max:255',
            'muncen' => 'required|max:15',
            'titularidad' => 'required|max:100',
            'domcen' => 'nullable|max:255',
            'cpcen' => 'nullable|max:10',
            'loccen' => 'nullable|max:50',
        ]);

        Centro::create([
            'codcen' => $request->codcen,
            'dencen' => $request->dencen,
            'muncen' => $request->muncen,
            'titularidad' => $request->titularidad,
            'domcen' => $request->domcen,
            'cpcen' => $request->cpcen,
            'loccen' => $request->loccen,
        ]);

        return redirect()->route('centros.index')->with('success', 'Centro creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Centro $centro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centro $centro)
    {
        $municipios = Centro::select('muncen')->orderBy('muncen')->distinct()->get();
        $titularidades = Centro::select('titularidad')->orderBy('titularidad')->distinct()->get();
        return view('admin.centros.edit', ['centro' => $centro,
                                            'municipios' => $municipios,
                                            'titularidades' => $titularidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centro $centro)
    {
        $request->validate([
            'codcen' => 'required|max:100',
            'dencen' => 'required|max:255',
            'muncen' => 'required|max:15',
        ]);

        $centro->update([
            'codcen' => $request->codcen,
            'dencen' => $request->dencen,
            'muncen' => $request->muncen,
        ]);

        return redirect()->route('centros.index')->with('success', 'Centro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centro $centro)
    {
        $centro->delete();
        return redirect()->route('centros.index')->with('success', 'Centro eliminado correctamente.');
    }
}
