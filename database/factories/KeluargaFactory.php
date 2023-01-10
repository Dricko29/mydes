<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keluarga>
 */
class KeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_keluarga' => $this->faker->unique()->nik(),
            'tanggal_terdaftar' => $this->faker->dateTimeBetween('-10 years', '-5 years'),
            'alamat' => 'Goa Boma'
        ];
    }
}