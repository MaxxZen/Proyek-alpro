<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\TransaksiPenjualan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DetailTransaksi>
 */
class DetailTransaksiFactory extends Factory
{
    protected $model = DetailTransaksi::class;

    public function definition(): array
    {
        $kuantitas = fake()->numberBetween(1, 10);
        $hargaSatuan = fake()->randomFloat(2, 1000, 750000);

        return [
            'id_transaksi' => TransaksiPenjualan::factory(),
            'id_barang' => Barang::factory(),
            'kuantitas' => $kuantitas,
            'harga_satuan' => $hargaSatuan,
            'subtotal' => round($kuantitas * $hargaSatuan, 2),
        ];
    }
}
