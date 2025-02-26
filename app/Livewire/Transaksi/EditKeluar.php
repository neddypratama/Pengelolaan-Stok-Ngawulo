<?php

namespace App\Livewire\Transaksi;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Livewire\Component;

class EditKeluar extends Component
{
    public $keluar_id, $kode_keluar, $tanggal_keluar, $jumlah_keluar, $id_barang, $stok_sebelumnya, $stok_total, $satuan;
    public $barangs;

    public function mount($id)
    {
        $keluar = BarangKeluar::findOrFail($id);
        
        $this->keluar_id = $keluar->id_keluar;
        $this->kode_keluar = $keluar->kode_keluar;
        $this->tanggal_keluar = $keluar->tanggal_keluar;
        $this->jumlah_keluar = $keluar->jumlah_keluar;
        $this->id_barang = $keluar->id_barang;

        $this->barangs = \App\Models\Barang::all();
        $barang = Barang::find($this->id_barang);
        $this->stok_sebelumnya = $barang->stok_barang + $this->jumlah_keluar;
        $this->satuan = \App\Models\Satuan::find($barang->id_satuan)->nama_satuan;
        $this->stok_total = $barang->stok_barang;
    }


    public function update()
    {
        $this->validate([
            'kode_keluar' => 'required',
            'tanggal_keluar' => 'required|date',
            'jumlah_keluar' => 'required|integer|min:1',
            'id_barang' => 'required',
        ]);

        $barangkeluar = BarangKeluar::findOrFail($this->keluar_id);
        if ($barangkeluar->id_barang == $this->id_barang) {
            $selisih = $barangkeluar->jumlah_keluar - $this->jumlah_keluar;
        
            $barang = Barang::find($this->id_barang);
            $stok = $barang->stok_barang;
            // dd($stok, $selisih);
            $barang->update([
                'stok_barang' => $stok + $selisih,
            ]);

            $barangkeluar->update([
                'tanggal_keluar' => $this->tanggal_keluar,
                'jumlah_keluar' => $this->jumlah_keluar,
                'id_barang' => $this->id_barang,
                'updated_at' => now(),
            ]);
        } else {
            $barang1 = Barang::find($barangkeluar->id_barang);
            $barang2 = Barang::find($this->id_barang);

            $stok1 = $barang1->stok_barang;
            $barang1->update([
                'stok_barang' => $stok1 + $barangkeluar->jumlah_keluar,
            ]);

            $stok2 = $barang2->stok_barang;
            $barang2->update([
                'stok_barang' => $stok2 - $this->jumlah_keluar,
            ]);

            $barangkeluar->update([
                'tanggal_keluar' => $this->tanggal_keluar,
                'jumlah_keluar' => $this->jumlah_keluar,
                'id_barang' => $this->id_barang,
                'updated_at' => now(),
            ]);
        }

        session()->flash('status', 'Data barang keluar berhasil diperbarui.');
        return redirect()->route('barang-keluar');
    }

    public function render()
    {
        return view('livewire.transaksi.barang-keluar.edit-keluar')->extends('layouts1.app')->section('content');
    }
}
