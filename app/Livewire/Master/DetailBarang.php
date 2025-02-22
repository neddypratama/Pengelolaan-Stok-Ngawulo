<?php

namespace App\Livewire\Master;

use App\Models\Barang;
use Livewire\Component;

class DetailBarang extends Component
{
    public $barang;

    public function mount($id)
    {
        $this->barang = Barang::with(['satuan', 'jenis'])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.master.detail-barang')->extends('layouts1.app')->section('content');
    }
}
