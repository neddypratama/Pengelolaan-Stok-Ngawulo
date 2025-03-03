<?php

namespace App\Livewire\Admin;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\JenisBarang;
use App\Models\Satuan;
use Livewire\Component;

class Dashboard extends Component
{
    public $minimums, $barangs, $satuans, $jeniss, $masuks, $keluars ;
    public function mount()
    {
        $this->minimums = Barang::with(['satuan', 'jenis'])->where('stok_barang', '<=', 10)->get();
        $this->barangs = Barang::all();
        $this->satuans = Satuan::all();
        $this->jeniss = JenisBarang::all();
        $this->masuks = BarangMasuk::all();
        $this->keluars = BarangKeluar::all();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->extends('layouts1.app')->section('content');
    }
}
