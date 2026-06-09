<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //\App\Models\Curso::factory(10)->create();
        \App\Models\Curso::truncate();
        foreach (self::$cursos as $curso) {
            $edicion = \App\Models\Edicion::where('curso_escolar', $curso['curso_escolar'])->first();
            if (!$edicion) {
                $this->command->error('No se encontró una edición para el curso escolar: ' . $curso['curso_escolar']);
                continue; // Saltar este curso si no se encuentra la edición
            } else {
                \App\Models\Curso::create([
                    'moodle_id' => $curso['moodle_id'] ?? null,
                    'curso_escolar' => $curso['curso_escolar'] ?? null,
                    'olimpiada_id' => $curso['olimpiada_id'] ?? null,
                    'edicion_id' => $edicion->id ?? null,
                ]);
            }
        }
        $this->command->info('Cursos inicializados con datos!');
    }
    private static $cursos = array(
        
        array('moodle_id' => 7, 'curso_escolar' =>  '21/22', 'olimpiada_id' => 13),
        array('moodle_id' => 9, 'curso_escolar' => '22/23', 'olimpiada_id' => 14),
        array('moodle_id' => 10, 'curso_escolar' => '23/24', 'olimpiada_id' => 15),
        array('moodle_id' => 13, 'curso_escolar' => '24/25', 'olimpiada_id' => 16),

    );
}
