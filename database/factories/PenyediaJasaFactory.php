<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenyediaJasa>
 */
class PenyediaJasaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'usernameP' => $this->faker->userName,
            'passwordP' => Hash::make($this->faker->password),
            'nama_penyedia_jasa' => $this->faker->company,
            'emailP' => $this->faker->safeEmail,
            'alamat' => $this->faker->address,
            'telpNumbP' => $this->faker->phoneNumber,
        ];
    }
}
