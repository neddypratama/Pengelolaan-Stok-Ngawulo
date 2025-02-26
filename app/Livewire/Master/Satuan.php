<?php

namespace App\Livewire\Master;

use App\Models\Satuan as ModelsSatuan;
use Livewire\Component;

class Satuan extends Component
{
    
    public $satuans;

    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'deleteSatuan'];

    public function mount()
    {
        $this->satuans = ModelsSatuan::all();
    }

    public function confirmDelete($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function deleteSatuan() // Ubah dari $payload menjadi $id
    {
        $satuan = \App\Models\Satuan::find($this->delete_id);

        if (!$satuan) {
            $this->dispatch('delete-failed', message: 'Data satuan tidak ditemukan!');
            return;
        }
    
        // Cek apakah satuan memiliki relasi di tabel satuan_keluar atau satuan_masuk
        if ($satuan->barang()->exists()) {
            $this->dispatch('delete-failed', message: 'Satuan tidak bisa dihapus karena masih memiliki data terkait!');

            return;
        }
        
        $satuan->delete();
        $this->mount();
        $this->dispatch('delete-success');
    }
    public function render()
    {
        return view('livewire.master.satuan.satuan')->extends('layouts1.app')->section('content');
    }
}
