<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    protected $table = 'pruebas';

    protected $fillable = [
        'id',
        'nombre',
        'categorias_ediciones_id',
        'patrocinadores_id'
    ];
    public function resultadoOlimpiada()
    {
        return $this->hasMany(ResultadoOlimpiada::class, 'prueba_id', 'id');
    }
}
