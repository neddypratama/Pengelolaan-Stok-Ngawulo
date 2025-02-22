<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_jenis' => 'Bahan Baku', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_jenis' => 'Minuman', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_jenis' => 'Makanan', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_jenis' => 'Alat Masak', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_jenis' => 'Peralatan Kafe', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_jenis' => 'Kemasan', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_jenis' => 'Kebersihan', 'created_at' => now(), 'updated_at' => now(),],
        ];

        DB::table('jenis_barangs')->insert($data);
    }
}
