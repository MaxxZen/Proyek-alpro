<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Barang>
 */
class BarangFactory extends Factory
{
    protected $model = Barang::class;

    public function definition(): array
    {
        return [
            'barcode' => fake()->unique()->numerify('############'),
            'nama_barang' => fake()->words(2, true),
            'harga_beli' => fake()->randomFloat(2, 1000, 500000),
            'harga_jual' => fake()->randomFloat(2, 1000, 750000),
            'stok_sistem' => fake()->numberBetween(0, 100),
            'batas_stok_minimum' => fake()->numberBetween(1, 20),
            'tanggal_kedaluwarsa' => fake()->optional()->dateTimeBetween('now', '+2 years')?->format('Y-m-d'),
        ];
    }
}
