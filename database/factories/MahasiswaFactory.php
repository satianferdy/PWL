<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => $this->faker->unique()->randomNumber(8),
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'tanggal_lahir' => $this->faker->date(),
            'jurusan' => $this->faker->randomElement(['Teknik Informatika', 'Teknik Mesin', 'Teknik Elektro', 'Teknik Sipil', 'Teknik Industri']),
            'no_handphone' => $this->faker->phoneNumber(),
        ];
    }
}
