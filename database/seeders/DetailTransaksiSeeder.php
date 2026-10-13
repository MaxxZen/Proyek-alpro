<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\TransaksiPenjualan;
use Illuminate\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $barang = Barang::factory()->count(100)->create();

        foreach ($barang->chunk(5) as $index => $items) {
            $details = $items->map(function (Barang $item): array {
                $kuantitas = fake()->numberBetween(1, 5);
                $hargaSatuan = (float) $item->harga_jual;

                return [
                    'id_barang' => $item->id_barang,
                    'kuantitas' => $kuantitas,
                    'harga_satuan' => $hargaSatuan,
                    'subtotal' => round($kuantitas * $hargaSatuan, 2),
                ];
            });
            $totalBelanja = $details->sum('subtotal');

            $transaksi = TransaksiPenjualan::factory()->create([
                'id_transaksi' => sprintf('TRX-%s-%03d', now()->format('YmdHis'), $index + 1),
                'total_belanja' => $totalBelanja,
                'total_diskon' => 0,
                'jumlah_bayar' => $totalBelanja,
                'kembalian' => 0,
            ]);

            $details->each(function (array $detail) use ($transaksi): void {
                DetailTransaksi::factory()->create([
                    ...$detail,
                    'id_transaksi' => $transaksi->id_transaksi,
                ]);
            });
        }
    }
}
