<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->truncate();

        foreach (self::$cursos as $curso) {
            DB::table('cursos')->insert([
                'nombre' => $curso['nombre'],
                'url' => $curso['url']
            ]);
        }
        $this->command->info('¡Tabla cursos inicializada con datos!');
    }

    private static $cursos = array(
        array('nombre' => 'XV Olimpiada','url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=10'),
        array('nombre' => 'XIV Olimpiada','url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=9'),
        array('nombre' => 'XIII Olimpiada','url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=7')
    );
}
