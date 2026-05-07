<?php

namespace App\Http\Resources;

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
        return [
            'id' => $this->id,
            'num_olimpiada' => $this->num_olimpiada,
            'curso_lectivo' => $this->curso_lectivo,
            'curso_moodle_id' => $this->curso_moodle_id,
            'edicion_id' => $this->edicion_id,
        ];
    }
}
