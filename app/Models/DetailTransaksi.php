<?php

namespace App\Models;

use Database\Factories\DetailTransaksiFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksi extends Model
{
    /** @use HasFactory<DetailTransaksiFactory> */
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $primaryKey = 'id_detail_transaksi';

    public $timestamps = false;

    protected $fillable = [
        'id_transaksi',
        'id_barang',
        'kuantitas',
        'harga_satuan',
        'subtotal',
    ];

    protected function casts(): array
    {
        return [
            'harga_satuan' => 'decimal:2',
            'subtotal' => 'decimal:2',
        ];
    }

    public function transaksiPenjualan(): BelongsTo
    {
        return $this->belongsTo(TransaksiPenjualan::class, 'id_transaksi', 'id_transaksi');
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}
