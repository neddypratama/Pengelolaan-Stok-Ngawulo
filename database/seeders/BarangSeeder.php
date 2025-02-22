<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_barang' => 'B0001', 'nama_barang' => 'Kopi Arabika', 'stok_barang' => 50, 'id_satuan' => 2, 'id_jenis' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0002', 'nama_barang' => 'Kopi Robusta', 'stok_barang' => 40, 'id_satuan' => 2, 'id_jenis' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0003', 'nama_barang' => 'Susu UHT', 'stok_barang' => 30, 'id_satuan' => 3, 'id_jenis' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0004', 'nama_barang' => 'Susu Kental Manis', 'stok_barang' => 25, 'id_satuan' => 7, 'id_jenis' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0005', 'nama_barang' => 'Gula Pasir', 'stok_barang' => 40, 'id_satuan' => 2, 'id_jenis' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0006', 'nama_barang' => 'Gula Aren', 'stok_barang' => 35, 'id_satuan' => 2, 'id_jenis' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0007', 'nama_barang' => 'Sirup Vanila', 'stok_barang' => 20, 'id_satuan' => 7, 'id_jenis' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0008', 'nama_barang' => 'Sirup Hazelnut', 'stok_barang' => 18, 'id_satuan' => 7, 'id_jenis' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0009', 'nama_barang' => 'Coklat Bubuk', 'stok_barang' => 22, 'id_satuan' => 2, 'id_jenis' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0010', 'nama_barang' => 'Matcha Powder', 'stok_barang' => 15, 'id_satuan' => 2, 'id_jenis' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0011', 'nama_barang' => 'Cup Plastik 16oz', 'stok_barang' => 100, 'id_satuan' => 5, 'id_jenis' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0012', 'nama_barang' => 'Cup Plastik 22oz', 'stok_barang' => 80, 'id_satuan' => 5, 'id_jenis' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0013', 'nama_barang' => 'Sedotan Jumbo', 'stok_barang' => 200, 'id_satuan' => 6, 'id_jenis' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0014', 'nama_barang' => 'Tutup Cup Plastik', 'stok_barang' => 150, 'id_satuan' => 5, 'id_jenis' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0015', 'nama_barang' => 'Saringan Kopi', 'stok_barang' => 10, 'id_satuan' => 5, 'id_jenis' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0016', 'nama_barang' => 'French Press', 'stok_barang' => 8, 'id_satuan' => 5, 'id_jenis' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0017', 'nama_barang' => 'Teko Susu', 'stok_barang' => 12, 'id_satuan' => 5, 'id_jenis' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0018', 'nama_barang' => 'Gelas Takar', 'stok_barang' => 15, 'id_satuan' => 5, 'id_jenis' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0019', 'nama_barang' => 'Plastik Pembungkus', 'stok_barang' => 50, 'id_satuan' => 6, 'id_jenis' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_barang' => 'B0020', 'nama_barang' => 'Kantong Kertas', 'stok_barang' => 60, 'id_satuan' => 6, 'id_jenis' => 2, 'created_at' => now(), 'updated_at' => now(),],
        ];

        DB::table('barangs')->insert($data);
    }
}
