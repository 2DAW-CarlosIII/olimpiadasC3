<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoOlimpiada extends Model
{
    use HasFactory;
    //protected $connection = 'olimpiadas';
    protected $table      = 'resultados_olimpiadas_cache';
    public    $timestamps = false;
    protected $fillable = [
        'grado','last_name','first_name','maxpuntuacion','MomentoConsecucion','penalizaciones','TiempoFinal','nombrePrueba','id_prueba'

    ];
    public function prueba()
    {
        return $this->belongsTo(Prueba::class, 'id_prueba', 'id');
    }
}
