<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode_pemesanan' => 'TIK-'.date('YmdHi').$this->faker->numberBetween(100, 999),
            'event_id' => $this->faker->numberBetween(1, 50),
            'nama_pemesan' => $this->faker->name,
            'email_pemesan' => $this->faker->email,
            'no_hp_pemesan' => $this->faker->phoneNumber,
            'jumlah_tiket' => $this->faker->numberBetween(1, 10),
        ];
    }
}
