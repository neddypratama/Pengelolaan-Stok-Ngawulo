<?php
namespace App\Livewire\Master;

use Livewire\Component;
use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Jenis;
use App\Models\JenisBarang;

class EditBarang extends Component
{
    public $barang_id, $kode_barang, $nama_barang, $stok_barang, $id_satuan, $id_jenis;
    public $satuans, $jeniss;

    public function mount($id)
    {
        $barang = Barang::findOrFail($id);

        $this->barang_id = $barang->id_barang;
        $this->kode_barang = $barang->kode_barang;
        $this->nama_barang = $barang->nama_barang;
        $this->stok_barang = $barang->stok_barang;
        $this->id_satuan = $barang->id_satuan;
        $this->id_jenis = $barang->id_jenis;

        $this->satuans = Satuan::all();
        $this->jeniss = JenisBarang::all();
    }

    public function update()
    {
        $this->validate([
            'nama_barang' => 'required|string|max:255',
            'stok_barang' => 'required|integer|min:0',
            'id_satuan' => 'required',
            'id_jenis' => 'required',
        ]);

        $barang = Barang::findOrFail($this->barang_id);
        $barang->update([
            'nama_barang' => $this->nama_barang,
            'stok_barang' => $this->stok_barang,
            'id_satuan' => $this->id_satuan,
            'id_jenis' => $this->id_jenis,
            'updated_at' => now(),
        ]);

        session()->flash('status', 'Data barang berhasil diperbarui.');
        return redirect()->route('data-barang');
    }

    public function render()
    {
        return view('livewire.master.edit-barang')->extends('layouts1.app')->section('content');
    }
}
