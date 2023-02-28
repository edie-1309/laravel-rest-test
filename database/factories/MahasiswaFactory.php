<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'nama' => fake()->name(),
            'nim' => fake()->randomNumber(9, true),
            'kelas' => fake()->word(),
            'alamat' => fake()->text(200),
            'jurusan_id' => fake()->numberBetween(1, 5)
        ];
    }
}
