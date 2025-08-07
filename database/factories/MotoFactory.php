<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Moto>
 */
class MotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [

            'nombre' => $this->faker->randomElement(['Pulsar', 'Discover']),
            'model' => $this->faker->randomElement(['125a', '150s', '200a']),
            'precio' => $this->faker->numberBetween(7000, 20000),
            'bono' => $this->faker->numberBetween(100, 300),
            'precio_base' => function (array $attributes) {
                return round($attributes['precio'] * 0.9); // Assuming a 10% discount for the base price
            },
        ];
    }
}
