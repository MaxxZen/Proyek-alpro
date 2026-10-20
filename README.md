# Proyek-alpro

## MySQL

Proyek ini menggunakan MySQL. Buat database sesuai `DB_DATABASE` di `.env`,
atur `DB_HOST`, `DB_PORT`, `DB_USERNAME`, dan `DB_PASSWORD`, lalu jalankan
migrasi Laravel:

```sh
php artisan migrate
```

MySQL 8.0.18 atau lebih baru mendukung `EXPLAIN ANALYZE` dengan keluaran teks
(bukan JSON):

```sql
EXPLAIN ANALYZE
SELECT * FROM detail_transaksi WHERE id_transaksi = 'TRX-001';
```

Skema MySQL mandiri juga tersedia di [database/db.sql](database/db.sql).