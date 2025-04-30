<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'palmares',
    ];

    public function edicion()
    {
        return $this->belongsTo(Edicion::class, 'id');
    }

    public static function generarTablaPalmares() {
        $categorias = \App\Models\Categoria::all();

        $thead = '<thead><tr>';
        $tbody = '<tbody><tr>';

        foreach ($categorias as $categoria) {
            $thead .= "<th>{$categoria->nombre}</th>";
            $tbody .= "<td><ol><li></li><li></li><li></li></ol></td>";
        }

        $thead .= '</tr></thead>';
        $tbody .= '</tr></tbody>';

        return "<table border='1'>{$thead}{$tbody}</table>";
    }
}
