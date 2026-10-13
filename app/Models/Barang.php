<?php

namespace App\Models;

use Database\Factories\BarangFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    /** @use HasFactory<BarangFactory> */
    use HasFactory;

    protected $table = 'barang';

    protected $primaryKey = 'id_barang';

    public $timestamps = false;

    protected $fillable = [
        'barcode',
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'stok_sistem',
        'batas_stok_minimum',
        'tanggal_kedaluwarsa',
    ];
}
