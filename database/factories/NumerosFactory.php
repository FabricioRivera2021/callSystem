<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Numeros>
 */
class NumerosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $counter = 1;

    public function definition(): array
    {
        return [
            'numero' => self::$counter++,
            'estado' => fake()->randomElement([
                'Sin atender',
                'En preparación',
                'Para pagar',
                'Para entregar',
                'Pausados',
                'Cancelados',
                'Finalizados',
            ]),
            'fila' => fake()->randomElement([
                'Comun',
                'Emergencia',
                'FNR',
                'Prioridad'
            ])
        ];
    }
}
