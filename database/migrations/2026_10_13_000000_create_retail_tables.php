<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('barcode', 100)->nullable();
            $table->string('nama_barang');
            $table->decimal('harga_beli', 12, 2);
            $table->decimal('harga_jual', 12, 2);
            $table->integer('stok_sistem');
            $table->integer('batas_stok_minimum');
            $table->date('tanggal_kedaluwarsa')->nullable();
        });

        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->string('id_transaksi', 50)->primary();
            $table->dateTime('tanggal_waktu');
            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_member')->nullable();
            $table->decimal('total_belanja', 12, 2);
            $table->decimal('total_diskon', 12, 2);
            $table->string('metode_pembayaran', 50);
            $table->decimal('jumlah_bayar', 12, 2);
            $table->decimal('kembalian', 12, 2);
        });

        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id('id_detail_transaksi');
            $table->string('id_transaksi', 50);
            $table->unsignedBigInteger('id_barang');
            $table->integer('kuantitas');
            $table->decimal('harga_satuan', 12, 2);
            $table->decimal('subtotal', 12, 2);

            $table->foreign('id_transaksi')
                ->references('id_transaksi')
                ->on('transaksi_penjualan');
            $table->foreign('id_barang')
                ->references('id_barang')
                ->on('barang');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
        Schema::dropIfExists('transaksi_penjualan');
        Schema::dropIfExists('barang');
    }
};
