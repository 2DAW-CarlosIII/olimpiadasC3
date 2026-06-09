<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    protected $fillable = [
        'moodle_id',
        'curso_escolar',
        'olimpiada_id',
        'edicion_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function edicion()
    {
        return $this->belongsTo(Edicion::class, 'edicion_id', 'id');
    }
}
