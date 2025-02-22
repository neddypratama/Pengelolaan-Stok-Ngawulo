<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_id' => 1,
            'role_name' => "Admin",
            'role_description' => 'Mengatur segalanya',
        'created_at' => now(), 'updated_at' => now(),]);
        Role::create([
            'role_id' => 2,
            'role_name' => "Manager",
            'role_description' => 'Mengatur Laporan',
        'created_at' => now(), 'updated_at' => now(),]);
        Role::create([
            'role_id' => 3,
            'role_name' => "Kasir",
            'role_description' => 'Mengatur Pesanan',
        'created_at' => now(), 'updated_at' => now(),]);
        Role::create([
            'role_id' => 4,
            'role_name' => "Pembeli",
            'role_description' => 'Melakukan Pemesanan',
        'created_at' => now(), 'updated_at' => now(),]);
    }
}
