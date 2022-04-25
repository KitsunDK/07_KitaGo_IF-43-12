<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'usernameC' => $this->faker->userName,
            'passwordC' => Hash::make($this->faker->password),
            'nama_lengkap' => $this->faker->name,
            'emailC' => $this->faker->safeEmail,
            'birthDate' => $this->faker->date,
            'telpNumbC' => $this->faker->phoneNumber,
        ];
    }
}
