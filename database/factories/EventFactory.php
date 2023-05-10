<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_acara' => $this->faker->sentence(3),
            'harga_tiket' => $this->faker->numberBetween(10000, 100000),
            'tanggal_acara' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'deskripsi_acara' => $this->faker->paragraph(3),
            'lokasi' => $this->faker->address(),
            'poster' => 'dummy.png',
        ];
    }
}
