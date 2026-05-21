<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->truncate();

        $ediciones = DB::table('ediciones')->get();

        foreach (self::$cursos as $curso) {

            $edicion = $ediciones->shift();

            if ($edicion) {
                DB::table('cursos')->insert([
                    'num_olimpiada'   => $curso['num_olimpiada'],
                    'curso_lectivo'   => $curso['curso_lectivo'],
                    'edicion_id'      => $edicion->id,
                    'curso_moodle_id' => $curso['curso_moodle_id'],
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ]);
            }
        }

        $this->command->info('¡Tablas limpiadas y cursos insertados correctamente!');
    }

    private static $cursos = array(
        array('num_olimpiada' => 13, 'curso_lectivo' => '2021-2022', 'curso_moodle_id' => 7),
        array('num_olimpiada' => 14, 'curso_lectivo' => '2022-2023', 'curso_moodle_id' => 9),
        array('num_olimpiada' => 15, 'curso_lectivo' => '2023-2024', 'curso_moodle_id' => 10),
        array('num_olimpiada' => 16, 'curso_lectivo' => '2024-2025', 'curso_moodle_id' => 13),

    );
}
