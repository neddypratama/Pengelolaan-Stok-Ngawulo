<?php

namespace App\Livewire\Master;

use App\Models\Barang;
use Livewire\Component;

class EntriBarang extends Component
{
    public $kode_barang, $nama_barang, $stok_barang, $id_satuan, $id_jenis;
    public $satuans, $jeniss;

    public function mount()
    {
        $this->satuans = \App\Models\Satuan::all();
        $this->jeniss = \App\Models\JenisBarang::all();
        $this->generateKodeBarang(); // Panggil fungsi untuk generate kode otomatis
    }

    public function generateKodeBarang()
    {
        $latestBarang = Barang::latest('id_barang')->first(); // Ambil data terakhir
        $nextNumber = $latestBarang ? ((int) substr($latestBarang->kode_barang, 1)) + 1 : 1;
        $this->kode_barang = 'B' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function save()
    {
        $this->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'nama_barang' => 'required',
            'stok_barang' => 'required|integer|min:1',
            'id_satuan' => 'required',
            'id_jenis' => 'required',
        ]);

        Barang::create([
            'kode_barang' => $this->kode_barang,
            'nama_barang' => $this->nama_barang,
            'stok_barang' => $this->stok_barang,
            'id_satuan' => $this->id_satuan,
            'id_jenis' => $this->id_jenis,
        ]);

        session()->flash('status', 'Data barang berhasil ditambahkan.');
        $this->reset(['nama_barang', 'stok_barang', 'id_satuan', 'id_jenis']);
        $this->generateKodeBarang(); // Generate kode baru setelah menyimpan data
        return redirect()->to('/data-barang');
    }

    public function render()
    {
        return view('livewire.master.barang.entri-barang')->extends('layouts1.app')->section('content');
    }
}
