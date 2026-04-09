<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TrxUsulanKiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'mst_ki_id' => 1, // PATEN
            'judul' => $this->faker->sentence(5),
            'nama_pemohon' => $this->faker->name(),
            'deskripsi' => $this->faker->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
