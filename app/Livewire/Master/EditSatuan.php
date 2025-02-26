<?php

namespace App\Livewire\Master;

use App\Models\Satuan;
use Livewire\Component;

class EditSatuan extends Component
{
    public $nama_satuan, $id_satuan;

    public function mount($id)
    {
        $satuan = Satuan::findOrFail($id);

        $this->id_satuan = $satuan->id_satuan;
        $this->nama_satuan = $satuan->nama_satuan;
    }

    public function update()
    {
        $this->validate([
            'nama_satuan' => 'required|string|max:255',
        ]);

        $satuan = Satuan::findOrFail($this->id_satuan);
        $satuan->update([
            'nama_satuan' => $this->nama_satuan,
            'updated_at' => now(),
        ]);

        session()->flash('status', 'Data satuan berhasil diperbarui.');
        return redirect()->route('satuan');
    }

    public function render()
    {
        return view('livewire.master.satuan.edit-satuan')->extends('layouts1.app')->section('content');
    }
}
