<?php

namespace Database\Seeders;

use App\Models\Grupo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grupos')->truncate();
        $usuarios = User::where('email', '!=', 'admin@admin.com')->get()->values();
        foreach (self::$grupos as $i => $grupo) {
            $user=$usuarios[$i % $usuarios->count()];
            Grupo::create([
                'nombre' => $grupo['nombre'],
                'abreviatura' => $grupo['abreviatura'],
                'password' =>  bcrypt($grupo['password']),
                'tutor' => $user->id,
                'centro_id' => $grupo['centro_id'],
                'ciclo_id' => $grupo['ciclo_id'],
                'categoria_id' => $grupo['categoria_id'],
            ]);
        }
          $this->command->info('Grupos inicializados con datos!');
    }


    private static array $grupos = [
        [
            'nombre' => 'ASIR 1A',
            'abreviatura' => 'ASIR-1A',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 1,
            'categoria_id' => 1,
        ],
        [
            'nombre' => 'ASIR 1B',
            'abreviatura' => 'ASIR-1B',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 1,
            'categoria_id' => 2,
        ],

        // Ciberseguridad
        [
            'nombre' => 'CIIN 1A',
            'abreviatura' => 'CIIN-1A',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 2,
            'categoria_id' => 3,
        ],
        [
            'nombre' => 'CIIN 1B',
            'abreviatura' => 'CIIN-1B',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 2,
            'categoria_id' => 4,
        ],

        // DAM
        [
            'nombre' => 'DAM 1A',
            'abreviatura' => 'DAM-1A',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 3,
            'categoria_id' => 1,
        ],
        [
            'nombre' => 'DAM 1B',
            'abreviatura' => 'DAM-1B',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 3,
            'categoria_id' => 2,
        ],

        // DAW
        [
            'nombre' => 'DAW 1A',
            'abreviatura' => 'DAW-1A',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 4,
            'categoria_id' => 3,
        ],
        [
            'nombre' => 'DAW 1B',
            'abreviatura' => 'DAW-1B',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 4,
            'categoria_id' => 4,
        ],

        // Videojuegos
        [
            'nombre' => 'DVRV 1A',
            'abreviatura' => 'DVRV-1A',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 5,
            'categoria_id' => 1,
        ],
        [
            'nombre' => 'DVRV 1B',
            'abreviatura' => 'DVRV-1B',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 5,
            'categoria_id' => 2,
        ],

        // IA
        [
            'nombre' => 'IABD 1A',
            'abreviatura' => 'IABD-1A',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 6,
            'categoria_id' => 3,
        ],
        [
            'nombre' => 'IABD 1B',
            'abreviatura' => 'IABD-1B',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 6,
            'categoria_id' => 4,
        ],

        // FPB Informática
        [
            'nombre' => 'INCO 1A',
            'abreviatura' => 'INCO-1A',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 7,
            'categoria_id' => 1,
        ],
        [
            'nombre' => 'INCO 1B',
            'abreviatura' => 'INCO-1B',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 7,
            'categoria_id' => 2,
        ],

        // FPB Oficina
        [
            'nombre' => 'INOF 1A',
            'abreviatura' => 'INOF-1A',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 8,
            'categoria_id' => 3,
        ],
        [
            'nombre' => 'INOF 1B',
            'abreviatura' => 'INOF-1B',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 8,
            'categoria_id' => 4,
        ],

        // SMR
        [
            'nombre' => 'SMR 1A',
            'abreviatura' => 'SMR-1A',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 9,
            'categoria_id' => 1,
        ],
        [
            'nombre' => 'SMR 1B',
            'abreviatura' => 'SMR-1B',
            'password' => '1234',
            'centro_id' => 1,
            'ciclo_id' => 9,
            'categoria_id' => 2,
        ],
    ];

}

