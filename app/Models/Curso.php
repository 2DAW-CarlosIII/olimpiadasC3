<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'url',
        'edicion_id',
    ];

    public function edicion()
    {
        return $this->belongsTo(Edicion::class);
    }
}
