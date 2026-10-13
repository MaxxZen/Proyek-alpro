<?php

namespace App\Models;

use Database\Factories\TransaksiPenjualanFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    /** @use HasFactory<TransaksiPenjualanFactory> */
    use HasFactory;

    protected $table = 'transaksi_penjualan';

    protected $primaryKey = 'id_transaksi';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id_transaksi',
        'tanggal_waktu',
        'id_pengguna',
        'id_member',
        'total_belanja',
        'total_diskon',
        'metode_pembayaran',
        'jumlah_bayar',
        'kembalian',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_waktu' => 'datetime',
            'total_belanja' => 'decimal:2',
            'total_diskon' => 'decimal:2',
            'jumlah_bayar' => 'decimal:2',
            'kembalian' => 'decimal:2',
        ];
    }
}
