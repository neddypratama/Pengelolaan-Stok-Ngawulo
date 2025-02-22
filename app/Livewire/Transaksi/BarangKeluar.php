<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;

class BarangKeluar extends Component
{
    public function render()
    {
        return view('livewire.transaksi.barang-keluar')->extends('layouts1.app')->section('content');
    }
}
