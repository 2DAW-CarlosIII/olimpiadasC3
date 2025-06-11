<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Curso::truncate();
        foreach (self::$cursos as $curso) {
            \App\Models\Curso::create([
                'nombre' => $curso['nombre'],
                'url' => $curso['url'],
            ]);
        }
    }

    private static $cursos = array(
        array('nombre' => 'XIII Olimpiadas', 'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=7'),
        array('nombre' => 'XIV Olimpiadas', 'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=9'),
        array('nombre' => 'XV Olimpiadas', 'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=10'),
    );
}
