<?php

namespace Database\Factories;

use App\Models\Mentor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama' => fake()->name(),
            'tanggal_lahir' => fake()->dateTimeBetween('-18 years', '-15 years')->format('Y-m-d'),
            'jurusan' => fake()->randomElement(['RPL', 'TKJ', 'TEI','TET','AKL']),
            'nilai' => fake()->numberBetween(50, 100),
            'mentor_id' => Mentor::inRandomOrder()->first()->id,
        ];
    }
}
