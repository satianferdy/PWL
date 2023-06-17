<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa_MataKuliah>
 */
class MahasiswaMataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mahasiswa_id' => $this->faker->randomNumber(1),
            'matakuliah_id' => $this->faker->randomNumber(1),
            'nilai' => $this->faker->randoElement(['A', 'B', 'C', 'D', 'E']),
        ];
    }
}
