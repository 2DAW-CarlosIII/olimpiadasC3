<?php

namespace Database\Seeders;

use App\Models\Edicion;
use App\Models\Grupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\info;

class EdicionesGrupos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('edicion_grupo')->truncate();
        $ediciones = Edicion::all();
        //dd($ediciones);
        $grupos = Grupo::all();
        //dd($grupos);
        foreach ($ediciones as $edicion) {
            foreach ($grupos as $grupo) {
                DB::table('edicion_grupo')->insertOrIgnore([
                    'edicion_id' => $edicion->id,
                    'grupo_id' => $grupo->id,
                ]);
            }
        }
        $this->command->info('Ediciones_grupos iniciados correctamente');
    }
}
