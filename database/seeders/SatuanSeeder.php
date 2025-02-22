<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_satuan' => 'Gram', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_satuan' => 'Kilogram', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_satuan' => 'Liter', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_satuan' => 'Mililiter', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_satuan' => 'Pcs', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_satuan' => 'Pack', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_satuan' => 'Botol', 'created_at' => now(), 'updated_at' => now(),],
            ['nama_satuan' => 'Dus', 'created_at' => now(), 'updated_at' => now(),],
        ];

        DB::table('satuans')->insert($data);
    }
}
