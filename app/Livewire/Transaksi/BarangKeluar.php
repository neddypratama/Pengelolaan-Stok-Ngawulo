<?php

namespace App\Livewire\Transaksi;

use App\Models\Barang;
use App\Models\BarangKeluar as ModelsBarangKeluar;
use Livewire\Component;

class BarangKeluar extends Component
{
    public $keluars;

    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'deleteKeluar'];

    public function mount()
    {
        $this->keluars = ModelsBarangKeluar::with(['barangKeluar.satuan'])->get();
    }

    public function confirmDelete($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function deletekeluar() // Ubah dari $payload menjadi $id
    {
        $Barangkeluar = \App\Models\BarangKeluar::find($this->delete_id);

        if (!$Barangkeluar) {
            $this->dispatch('delete-failed', message: 'Data barang keluar tidak ditemukan!');
            return;
        }

        $barang = Barang::find($Barangkeluar->id_barang);
        $barang->update([
            'stok_barang' => $barang->stok_barang + $Barangkeluar->jumlah_keluar,
        ]);
        // dd($barang);
        
        $Barangkeluar->delete();
        $this->mount();
        $this->dispatch('delete-success');
    }

    public function render()
    {
        return view('livewire.transaksi.barang-keluar.barang-keluar')->extends('layouts1.app')->section('content');
    }
}
