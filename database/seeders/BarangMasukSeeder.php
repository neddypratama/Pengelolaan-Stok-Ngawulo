<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_masuk' => 'TM-0000001', 'tanggal_masuk' => Carbon::now()->subDays(10), 'jumlah_masuk' => 10, 'id_barang' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_masuk' => 'TM-0000002', 'tanggal_masuk' => Carbon::now()->subDays(9), 'jumlah_masuk' => 15, 'id_barang' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_masuk' => 'TM-0000003', 'tanggal_masuk' => Carbon::now()->subDays(8), 'jumlah_masuk' => 20, 'id_barang' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_masuk' => 'TM-0000004', 'tanggal_masuk' => Carbon::now()->subDays(7), 'jumlah_masuk' => 12, 'id_barang' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_masuk' => 'TM-0000005', 'tanggal_masuk' => Carbon::now()->subDays(6), 'jumlah_masuk' => 30, 'id_barang' => 5, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_masuk' => 'TM-0000006', 'tanggal_masuk' => Carbon::now()->subDays(5), 'jumlah_masuk' => 25, 'id_barang' => 6, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_masuk' => 'TM-0000007', 'tanggal_masuk' => Carbon::now()->subDays(4), 'jumlah_masuk' => 18, 'id_barang' => 7, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_masuk' => 'TM-0000008', 'tanggal_masuk' => Carbon::now()->subDays(3), 'jumlah_masuk' => 22, 'id_barang' => 8, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_masuk' => 'TM-0000009', 'tanggal_masuk' => Carbon::now()->subDays(2), 'jumlah_masuk' => 16, 'id_barang' => 9, 'created_at' => now(), 'updated_at' => now(),],
            ['kode_masuk' => 'TM-0000010', 'tanggal_masuk' => Carbon::now()->subDays(1), 'jumlah_masuk' => 28, 'id_barang' => 10, 'created_at' => now(), 'updated_at' => now(),],
        ];

        DB::table('barang_masuks')->insert($data);
    }
}
