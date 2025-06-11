<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::$cursos as $curso) {
            Curso::create([
                'nombre' => $curso['nombre'],
                'url' => $curso['url'],
                'edicion_id' => $curso['edicion_id'],
            ]);
            $this->command->info('¡Tabla cursos inicializada!');
        }

    }

    private static $cursos = array(
        array('nombre' => 'XV', 'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=10', 'edicion_id' => 3),
        array('nombre' => 'XIV', 'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=9', 'edicion_id' =>  2),
        array('nombre' => 'XV', 'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=7', 'edicion_id' => 1),
    );
}
