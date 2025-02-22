<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;

class BarangMasuk extends Component
{
    public function render()
    {
        return view('livewire.transaksi.barang-masuk')->extends('layouts1.app')->section('content');
    }
}
