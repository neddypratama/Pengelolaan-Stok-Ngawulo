<?php

namespace App\Livewire\Master;

use App\Models\Barang;
use Livewire\Component;

class DataBarang extends Component
{
    public $barangs;

    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'deleteBarang'];

    public function mount()
    {
        $this->barangs = Barang::with(['satuan', 'jenis'])->get();
    }

    public function confirmDelete($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function deleteBarang() // Ubah dari $payload menjadi $id
    {
        $barang = Barang::find($this->delete_id);

        if (!$barang) {
            $this->dispatch('delete-failed', message: 'Data barang tidak ditemukan!');
            return;
        }
    
        // Cek apakah barang memiliki relasi di tabel barang_keluar atau barang_masuk
        if ($barang->barangKeluars()->exists() || $barang->barangMasuks()->exists()) {
            $this->dispatch('delete-failed', message: 'Barang tidak bisa dihapus karena masih memiliki data terkait!');

            return;
        }
        
        $barang->delete();
        $this->mount();
        $this->dispatch('delete-success');
    }

    public function render()
    {
        return view('livewire.master.barang.data-barang')->extends('layouts1.app')->section('content');
    }
}
