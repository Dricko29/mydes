<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name('male'),
            'nik' => $this->faker->unique()->nik(),
            'nipd' => $this->faker->unique()->creditCardNumber(),
            'nip' => $this->faker->unique()->creditCardNumber(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-40 years', '-30 years '),
            'attr_kelamin_id' => 1,
            'attr_pendidikan_keluarga_id' => $this->faker->numberBetween(6,10),
            'attr_agama_id' => $this->faker->numberBetween(1,6),
            'no_skp' => $this->faker->iban('M', 'DGB'),
            'tanggal_skp' => $this->faker->dateTimeBetween('-3 years'),
            'masa_jabatan' => '5 Tahun'
        ];
    }
}