<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_keluar' => 'TK-0000001', 'tanggal_keluar' => Carbon::now()->subDays(10), 'jumlah_keluar' => 5, 'id_barang' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_keluar' => 'TK-0000002', 'tanggal_keluar' => Carbon::now()->subDays(9), 'jumlah_keluar' => 8, 'id_barang' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_keluar' => 'TK-0000003', 'tanggal_keluar' => Carbon::now()->subDays(8), 'jumlah_keluar' => 6, 'id_barang' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_keluar' => 'TK-0000004', 'tanggal_keluar' => Carbon::now()->subDays(7), 'jumlah_keluar' => 10, 'id_barang' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_keluar' => 'TK-0000005', 'tanggal_keluar' => Carbon::now()->subDays(6), 'jumlah_keluar' => 12, 'id_barang' => 5, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_keluar' => 'TK-0000006', 'tanggal_keluar' => Carbon::now()->subDays(5), 'jumlah_keluar' => 9, 'id_barang' => 6, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_keluar' => 'TK-0000007', 'tanggal_keluar' => Carbon::now()->subDays(4), 'jumlah_keluar' => 7, 'id_barang' => 7, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_keluar' => 'TK-0000008', 'tanggal_keluar' => Carbon::now()->subDays(3), 'jumlah_keluar' => 11, 'id_barang' => 8, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_keluar' => 'TK-0000009', 'tanggal_keluar' => Carbon::now()->subDays(2), 'jumlah_keluar' => 13, 'id_barang' => 9, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_keluar' => 'TK-0000010', 'tanggal_keluar' => Carbon::now()->subDays(1), 'jumlah_keluar' => 15, 'id_barang' => 10, 'created_at' => now(), 'updated_at' => now(),],
        ];

        DB::table('barang_keluars')->insert($data);
    }
}
