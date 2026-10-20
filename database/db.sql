-- MySQL DDL converted from db.dbml.
-- Create and select the target database before running this file.

CREATE TABLE `barang` (
    `id_barang` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key, identifier unik barang',
    `barcode` VARCHAR(100) NULL COMMENT 'Kode barcode untuk pemindaian',
    `nama_barang` VARCHAR(255) NOT NULL COMMENT 'Nama produk',
    `harga_beli` DECIMAL(12, 2) NOT NULL COMMENT 'Harga modal',
    `harga_jual` DECIMAL(12, 2) NOT NULL COMMENT 'Harga jual ke pelanggan',
    `stok_sistem` INT NOT NULL COMMENT 'Jumlah stok saat ini di sistem',
    `batas_stok_minimum` INT NOT NULL COMMENT 'Batas peringatan stok menipis',
    `tanggal_kedaluwarsa` DATE NULL COMMENT 'Tanggal expired barang',
    PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `transaksi_penjualan` (
    `id_transaksi` VARCHAR(50) NOT NULL COMMENT 'Primary Key, nomor struk',
    `tanggal_waktu` DATETIME NOT NULL COMMENT 'Waktu transaksi dilakukan',
    `id_pengguna` BIGINT UNSIGNED NOT NULL COMMENT 'Kasir yang melayani',
    `id_member` BIGINT UNSIGNED NULL COMMENT 'Pelanggan (opsional jika member)',
    `total_belanja` DECIMAL(12, 2) NOT NULL COMMENT 'Total harga semua barang',
    `total_diskon` DECIMAL(12, 2) NOT NULL COMMENT 'Total potongan harga',
    `metode_pembayaran` VARCHAR(50) NOT NULL COMMENT 'Cash / QRIS / dll',
    `jumlah_bayar` DECIMAL(12, 2) NOT NULL COMMENT 'Uang yang diterima dari pelanggan',
    `kembalian` DECIMAL(12, 2) NOT NULL COMMENT 'Uang kembalian ke pelanggan',
    PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `detail_transaksi` (
    `id_detail_transaksi` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `id_transaksi` VARCHAR(50) NOT NULL COMMENT 'Foreign Key ke Transaksi Penjualan',
    `id_barang` BIGINT UNSIGNED NOT NULL COMMENT 'Foreign Key ke Barang',
    `kuantitas` INT NOT NULL COMMENT 'Jumlah barang yang dibeli',
    `harga_satuan` DECIMAL(12, 2) NOT NULL COMMENT 'Harga jual barang pada saat transaksi',
    `subtotal` DECIMAL(12, 2) NOT NULL COMMENT 'Kuantitas x Harga_Satuan',
    PRIMARY KEY (`id_detail_transaksi`),
    CONSTRAINT `detail_transaksi_id_transaksi_foreign`
        FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi_penjualan` (`id_transaksi`),
    CONSTRAINT `detail_transaksi_id_barang_foreign`
        FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
