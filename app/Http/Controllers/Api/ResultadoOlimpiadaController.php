<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResultadoOlimpiadaResource;
use App\Models\ResultadoOlimpiada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultadoOlimpiadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('nombreCompleto');
        //dd($request->query('nombreCompleto'));
        if (!$query) {
            return response()->json([
                'error' => 'nombreCompleto es obligatorio'
            ], 400);
        }
        $resultados = ResultadoOlimpiada::all();
        //$resultados= DB::table('resultados_olimpiadas_cache')->get();
        //dd($resultados);
        $parciales = [];
        foreach ($resultados as $resultado) {

            $nombrePersona = trim($resultado->first_name . ' ' . $resultado->last_name);
            $grado = $resultado->grado;
            //dd($nombrePersona, $query);
            if (trim($query) === $nombrePersona) {

                $ranking = ResultadoOlimpiada::where(
                    'nombrePrueba',
                    $resultado->nombrePrueba
                )
                    ->orderBy('TiempoFinal')
                    ->get();

                $posicion = 1;

                foreach ($ranking as $participante) {

                    $nombreParticipante =
                        $participante->firstname . ' ' . $participante->lastname;

                    if ($nombreParticipante === $query) {
                        break;
                    }

                    $posicion++;
                }

                $parciales[] = [
                    'nombrePrueba' => $resultado->nombrePrueba,
                    'TiempoFinal' => $resultado->TiempoFinal,
                    'posicion' => $posicion
                ];
            }
        }
        return response()->json([
            'parciales' => $parciales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resultado = ResultadoOlimpiada::find($id);
        if (!$resultado) {
            return response()->json(['error' => 'Recurso no encontrado'], 404);
        }
        return new ResultadoOlimpiadaResource($resultado);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resultado = ResultadoOlimpiada::find($id);
        if (!$resultado) {
            return response()->json(['error' => 'Recurso no encontrado'], 404);
        }
        return new ResultadoOlimpiadaResource($resultado);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resultadoData = json_decode($request->getContent(), true);
        $resultado = ResultadoOlimpiada::find($id);
        if (!$resultado) {
            return response()->json(['error' => 'Recurso no encontrado'], 404);
        }
        $resultado->update($resultadoData);
        return new ResultadoOlimpiadaResource($resultado);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resultado = ResultadoOlimpiada::find($id);
        if (!$resultado) {
            return response()->json(['error' => 'Recurso no encontrado'], 404);
        }
        $resultado->delete();
        return response()->json(['message' => 'Recurso eliminado con éxito']);
    }
}
