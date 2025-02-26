<?php

namespace App\Livewire\Transaksi;

use App\Models\Barang;
use App\Models\BarangMasuk as ModelsBarangMasuk;
use Livewire\Component;

class BarangMasuk extends Component
{
    public $masuks;

    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'deleteMasuk'];

    public function mount()
    {
        $this->masuks = ModelsBarangMasuk::with(['barangMasuk.satuan'])->get();
    }

    public function confirmDelete($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function deleteMasuk() // Ubah dari $payload menjadi $id
    {
        $BarangMasuk = \App\Models\BarangMasuk::find($this->delete_id);

        if (!$BarangMasuk) {
            $this->dispatch('delete-failed', message: 'Data barang masuk tidak ditemukan!');
            return;
        }

        $barang = Barang::find($BarangMasuk->id_barang);
        $barang->update([
            'stok_barang' => $barang->stok_barang - $BarangMasuk->jumlah_masuk,
        ]);
        // dd($barang);
        
        $BarangMasuk->delete();
        $this->mount();
        $this->dispatch('delete-success');
    }

    public function render()
    {
        return view('livewire.transaksi.barang-masuk.barang-masuk')->extends('layouts1.app')->section('content');
    }
}
