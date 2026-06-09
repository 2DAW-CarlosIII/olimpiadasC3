<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaEdicionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias_ediciones')->truncate();

        $categorias = \App\Models\Categoria::all();
        //dd($categorias);
        $ediciones = \App\Models\Edicion::all();
        //dd($ediciones);

        foreach ($categorias as $categoria) {
                foreach ($ediciones as $edicion) {
                    $categoria->ediciones()->syncWithoutDetaching([
                        $edicion->id => ['num_convocatoria' => rand(1, 10)],
                    ]);
                }
            }
        /* foreach ($categorias as $categoria) {
            foreach ($ediciones as $edicion) {
                DB::table('categorias_ediciones')->insert([
                    'categoria_id' => $categoria->id,
                    'edicion_id' => $edicion->id,
                    'num_convocatoria' => rand(1, 10),
                ]);
            }
        } */
    }
}
