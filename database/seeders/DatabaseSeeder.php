<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([SatuanSeeder::class]);
        $this->call([JenisBarangSeeder::class]);
        $this->call([BarangSeeder::class]);
        $this->call([BarangMasukSeeder::class]);
        $this->call([BarangKeluarSeeder::class]);
    }
}
