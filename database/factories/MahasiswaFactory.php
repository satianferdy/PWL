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
            'kelas' => $this->faker->randomElement([
                '1A', '1B', '1C', '1D', '1E', '1F', '1G',
                '2A', '2B', '2C', '2D', '2E', '2F', '2G',
                '3A', '3B', '3C', '3D', '3E', '3F', '3G',
                '4A', '4B', '4C', '4D', '4E', '4F', '4G',
                ]),
            'jurusan' => $this->faker->randomElement(['Teknik Informatika', 'Teknik Mesin', 'Teknik Elektro', 'Teknik Sipil', 'Teknik Industri']),
            'no_handphone' => $this->faker->phoneNumber(),
        ];
    }
}
