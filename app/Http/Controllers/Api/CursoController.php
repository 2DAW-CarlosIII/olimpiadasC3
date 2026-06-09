<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CursoResource;
use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $query = Curso::query();
        if ($query) {
            $query->orWhere('curso_escolar', 'like', '%' . $request->q . '%');
        }

        return CursoResource::collection(
            Curso::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
                ->paginate($request->perPage)
        );
    }

    public function show(Curso $id)
    {
        $curso=Curso::with('ediciones')->find($id);
         if (!$curso) {
            return response()->json(['message' => 'Curso no encontrado'], 404);
        }
        return new CursoResource($curso->id);
    }

    public function store(Request $request, Edicion $parent_id)
    {
        $cursoData = json_decode($request->getContent(), true);

        $cursoData['edicion_id'] = $parent_id;

        $curso = Curso::create($cursoData);

        return new CursoResource($curso);
    }

    public function update(Request $request, Curso $id)
    {
         $cursoData = json_decode($request->getContent(), true);
        if (!$id) {
            return response()->json(['message' => 'Curso no encontrado'], 404);
        }
        $id->update($cursoData);
        return new CursoResource($id);
    }

    public function destroy($id)
    {
        $curso = Curso::with('edicion')->find($id);
        try {
            $curso->delete();
            return response()->json(['message' => 'Curso eliminado'], 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
