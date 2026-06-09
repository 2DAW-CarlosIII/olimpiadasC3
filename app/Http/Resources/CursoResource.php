<?php

namespace App\Http\Resources;

use App\Models\Edicion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'moodle_id' => $this->moodle_id,
            'curso_escolar' => $this->curso_escolar,
            'olimpiada_id' => $this->olimpiada_id,
            'edicion' => new EdicionResource(Edicion::find($this->edicion_id)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
