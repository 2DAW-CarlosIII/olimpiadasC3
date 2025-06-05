<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Grupo;
use App\Models\Edicion;
use App\Providers\MoodleServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class GrupoController extends Controller
{
    protected $moodleService;

    /**
     * Create the controller instance.
    */
    public function __construct(MoodleServiceProvider $moodleService)
    {
        $this->authorizeResource(Grupo::class, 'grupo');
        $this->moodleService = $moodleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Edicion $edicion)
    {
        $grupos = $edicion->grupos()->get();
        return view('admin.grupos.index', ['grupos' => $grupos, 'edicion' => $edicion]);
    }

    /**
     * Display one resource.
     */
    public function show(Grupo $grupo)
    {
        return view('admin.grupos.show', compact('grupo'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.grupos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        Grupo::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('grupos.index')->with('success', 'Grupo creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Grupo $grupo)
    {
        $edicion = $grupo->edicion;
        return view('admin.grupos.edit', compact('grupo', 'edicion'));
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Grupo $grupo){
        $edicion = $grupo->edicion;
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $grupo->nombre = $request->nombre;
        $grupo->save();

        return redirect()->route('ediciones.grupos.index', ['edicion' => $edicion])->with('success', 'Grupo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Grupo $grupo)
    {
        $edicion = $grupo->edicion;
        $grupo->delete();
        return redirect()->route('ediciones.grupos.index', ['edicion' => $edicion])->with('success', 'Grupo eliminado correctamente.');
    }

    public function crearUsuarioMoodle(Grupo $grupo)
    {
        $redirect = redirect()->route('grupos.index');
        $resultado = $this->moodleService->createUsersFromGrupos(collect([$grupo]));
        $redirect = $this->getWith($redirect, $resultado);

        return $redirect;
    }

    public function crearUsuariosMoodle()
    {
        $redirect = redirect()->route('grupos.index');
        $resultado = $this->moodleService->createUsersFromGrupos(Grupo::all());
        $redirect = $this->getWith($redirect, $resultado);
        return $redirect;
    }

    protected function getWith($redirect, $resultado)
    {
        $errores = new MessageBag(); // Crear una instancia de MessageBag
        foreach ($resultado as $grupo => $resultadoGrupo) {
            if (!$resultadoGrupo) {
                $errores->add('grupo', "Error al crear usuarios del grupo: $grupo");
            }
        }
        if ($errores->isNotEmpty()) {
            $redirect->withErrors($errores); // Usar withErrors para pasar los errores
        } else {
            $redirect->with('success', 'Usuarios creados correctamente en Moodle.');
        }
        return $redirect;
    }

}
