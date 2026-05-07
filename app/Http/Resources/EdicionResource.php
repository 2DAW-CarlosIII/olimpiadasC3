<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EdicionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'curso_escolar' => $this->curso_escolar,
            'num_olimpiada' => $this->num_olimpiada,
            'num_modding' => $this->num_modding,
            'num_videojuegos' => $this->num_videojuegos,
            'fecha_celebracion' => $this->fecha_celebracion,
            'fecha_apertura' => $this->fecha_apertura,
            'fecha_cierre' => $this->fecha_cierre,
            'cursos' => $this->curso
        ];
    }
}
