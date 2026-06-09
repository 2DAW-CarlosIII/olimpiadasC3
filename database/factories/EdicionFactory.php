<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Edicion>
 */
class EdicionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'curso_escolar' => $this->faker->year(),
            'fecha_celebracion' => $this->faker->date(),
            'fecha_apertura' => $this->faker->date(),
            'fecha_cierre' => $this->faker->date(),
            'css_file' => $this->faker->word() . '.css',
        ];
    }
}
