<?php

namespace Database\Seeders;

use App\Models\ResultadoOlimpiada;
use Database\Factories\ResultadoOlimpiadasCacheFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\info;

class ResultadosOlimpiadasCacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resultados_olimpiadas_cache')->truncate();
        ResultadoOlimpiada::factory(30)->create();
        info('Resultados de olimpiadas cacheados correctamente.');
    }
}
