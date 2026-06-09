<?php

namespace Database\Factories;

use App\Models\Prueba;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ResultadoOlimpiadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grado = $this->faker->randomElement(['GM', 'GS']);
        $nombrePrueba = ($grado === 'GM')
            ? $this->faker->randomElement(['Hardware', 'Sistemas', 'Redes Locales'])
            : $this->faker->randomElement([
                'Programación',
                'Bases de datos',
                'Redes Locales',
                'Sistemas',
                'Lenguajes de Marcas'
            ]);
        $MomentoConsecucion = $this->faker->dateTime('2026-05-13');
        $penalizaciones = $this->faker->numberBetween(0, 5);



        return [
            'grado' => $grado,
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'maxpuntuacion' => $this->faker->randomElement([0, 33, 66, 100]),
            'MomentoConsecucion' => $MomentoConsecucion,
            'penalizaciones' => $penalizaciones,
            'TiempoFinal' =>  date(
                'Y-m-d H:i:s',
                strtotime($MomentoConsecucion->format('Y-m-d H:i:s')) + ($penalizaciones * 30)
            ),
            'id_prueba' => Prueba::inRandomOrder()->value('id'),
            'nombrePrueba' => $nombrePrueba,
        ];
    }
}
