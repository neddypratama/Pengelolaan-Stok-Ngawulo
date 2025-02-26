<?php

namespace App\Livewire\Master;

use App\Models\JenisBarang as ModelsJenisBarang;
use Livewire\Component;

class JenisBarang extends Component
{
    public $jeniss;

    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'deleteJenis'];

    public function mount()
    {
        $this->jeniss = ModelsJenisBarang::all();
    }

    public function confirmDelete($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function deleteJenis() // Ubah dari $payload menjadi $id
    {
        $jenis = \App\Models\JenisBarang::find($this->delete_id);

        if (!$jenis) {
            $this->dispatch('delete-failed', message: 'Data jenis tidak ditemukan!');
            return;
        }
    
        // Cek apakah jenis memiliki relasi di tabel jenis_keluar atau jenis_masuk
        if ($jenis->barang()->exists()) {
            $this->dispatch('delete-failed', message: 'Jenis barang tidak bisa dihapus karena masih memiliki data terkait!');

            return;
        }
        
        $jenis->delete();
        $this->mount();
        $this->dispatch('delete-success');
    }
    public function render()
    {
        return view('livewire.master.jenis-barang.jenis-barang')->extends('layouts1.app')->section('content');
    }
}
