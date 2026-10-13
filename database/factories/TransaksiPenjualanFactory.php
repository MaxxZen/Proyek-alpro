<?php

namespace Database\Factories;

use App\Models\TransaksiPenjualan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<TransaksiPenjualan>
 */
class TransaksiPenjualanFactory extends Factory
{
    protected $model = TransaksiPenjualan::class;

    public function definition(): array
    {
        $totalBelanja = fake()->randomFloat(2, 10000, 1000000);
        $totalDiskon = fake()->randomFloat(2, 0, min(100000, $totalBelanja));
        $jumlahBayar = $totalBelanja - $totalDiskon;

        return [
            'id_transaksi' => 'TRX-'.Str::upper((string) Str::ulid()),
            'tanggal_waktu' => fake()->dateTimeBetween('-1 year', 'now'),
            'id_pengguna' => fake()->numberBetween(1, 100),
            'id_member' => fake()->optional()->numberBetween(1, 1000),
            'total_belanja' => $totalBelanja,
            'total_diskon' => $totalDiskon,
            'metode_pembayaran' => fake()->randomElement(['Cash', 'QRIS', 'Debit']),
            'jumlah_bayar' => $jumlahBayar,
            'kembalian' => 0,
        ];
    }
}
