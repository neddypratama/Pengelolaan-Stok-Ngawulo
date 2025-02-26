<?php

namespace App\Livewire\Master;

use App\Models\JenisBarang;
use Livewire\Component;

class EntriJenis extends Component
{
    public $nama_jenis, $id_jenis;

    public function mount(){
        $this->generateIDJenis(); // Panggil fungsi untuk generate kode otomatis
    }

    public function generateIDJenis()
    {
        $latestBarang = JenisBarang::latest('id_jenis')->first(); // Ambil data terakhir
        $nextNumber = $latestBarang->id_jenis + 1;
        // dd($nextNumber + 1);
        $this->id_jenis = $nextNumber;
    }

    public function save()
    {
        $this->validate([
            'nama_jenis' => 'required|unique:jenis_barangs,nama_jenis',
        ]);

        JenisBarang::create([
            'nama_jenis' => $this->nama_jenis,
        ]);

        session()->flash('status', 'Data jenis barang berhasil ditambahkan.');
        $this->reset(['nama_jenis']);
        $this->generateIDJenis();
        // $this->dispatch('jenisAdded');
        return redirect()->to('/jenis-barang');
    }

    public function render()
    {
        return view('livewire.master.jenis-barang.entri-jenis')->extends('layouts1.app')->section('content');
    }
}
