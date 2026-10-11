<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nim' => fake()->unique()->numerify('########'),
            'nama' => fake()->name(),
            'jurusan' => fake()->randomElement([
                'Informatika',
                'Sistem Informasi',
                'Manajemen',
                'Akuntansi',
                'Teknik Sipil',
            ]),
            'email' => fake()->unique()->safeEmail(),
            'no_hp' => fake()->numerify('08##########'),
        ];
    }
}