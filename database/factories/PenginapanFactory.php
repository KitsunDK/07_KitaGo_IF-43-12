<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penginapan>
 */
class PenginapanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'namaPenginapan' => $this->faker->company,
            'hargaP' => $this->faker->numberBetween($min = 300000, $max = 3000000),
        ];
    }
}
