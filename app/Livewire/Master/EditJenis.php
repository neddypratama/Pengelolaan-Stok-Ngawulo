<?php

namespace App\Livewire\Master;

use App\Models\JenisBarang;
use Livewire\Component;

class EditJenis extends Component
{
    public $nama_jenis, $id_jenis;

    public function mount($id)
    {
        $jenis = JenisBarang::findOrFail($id);

        $this->id_jenis = $jenis->id_jenis;
        $this->nama_jenis = $jenis->nama_jenis;
    }

    public function update()
    {
        $this->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        $jenis = JenisBarang::findOrFail($this->id_jenis);
        $jenis->update([
            'nama_jenis' => $this->nama_jenis,
            'updated_at' => now(),
        ]);

        session()->flash('status', 'Data jenis barang berhasil diperbarui.');
        return redirect()->route('jenis-barang');
    }

    public function render()
    {
        return view('livewire.master.jenis-barang.edit-jenis')->extends('layouts1.app')->section('content');
    }
}
