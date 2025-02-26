<?php

namespace App\Livewire\Transaksi;

use App\Livewire\Master\Satuan;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Livewire\Component;

class EditMasuk extends Component
{
    public $masuk_id, $kode_masuk, $tanggal_masuk, $jumlah_masuk, $id_barang, $stok_sebelumnya, $stok_total, $satuan;
    public $barangs;

    public function mount($id)
    {
        $masuk = BarangMasuk::findOrFail($id);
        
        $this->masuk_id = $masuk->id_masuk;
        $this->kode_masuk = $masuk->kode_masuk;
        $this->tanggal_masuk = $masuk->tanggal_masuk;
        $this->jumlah_masuk = $masuk->jumlah_masuk;
        $this->id_barang = $masuk->id_barang;

        $this->barangs = \App\Models\Barang::all();
        $barang = Barang::find($this->id_barang);
        $this->stok_sebelumnya = $barang->stok_barang - $this->jumlah_masuk;
        $this->satuan = \App\Models\Satuan::find($barang->id_satuan)->nama_satuan;
        $this->stok_total = $barang->stok_barang;
    }


    public function update()
    {
        $this->validate([
            'kode_masuk' => 'required',
            'tanggal_masuk' => 'required|date',
            'jumlah_masuk' => 'required|integer|min:1',
            'id_barang' => 'required',
        ]);

        $barangMasuk = BarangMasuk::findOrFail($this->masuk_id);
        if ($barangMasuk->id_barang == $this->id_barang) {
            $selisih = $barangMasuk->jumlah_masuk - $this->jumlah_masuk;
        
            $barang = Barang::find($this->id_barang);
            $stok = $barang->stok_barang;
            // dd($stok, $selisih);
            $barang->update([
                'stok_barang' => $stok - $selisih,
            ]);

            $barangMasuk->update([
                'tanggal_masuk' => $this->tanggal_masuk,
                'jumlah_masuk' => $this->jumlah_masuk,
                'id_barang' => $this->id_barang,
                'updated_at' => now(),
            ]);
        } else {
            $barang1 = Barang::find($barangMasuk->id_barang);
            $barang2 = Barang::find($this->id_barang);

            $stok1 = $barang1->stok_barang;
            $barang1->update([
                'stok_barang' => $stok1 - $barangMasuk->jumlah_masuk,
            ]);

            $stok2 = $barang2->stok_barang;
            $barang2->update([
                'stok_barang' => $stok2 + $this->jumlah_masuk,
            ]);

            $barangMasuk->update([
                'tanggal_masuk' => $this->tanggal_masuk,
                'jumlah_masuk' => $this->jumlah_masuk,
                'id_barang' => $this->id_barang,
                'updated_at' => now(),
            ]);
        }

        session()->flash('status', 'Data barang masuk berhasil diperbarui.');
        return redirect()->route('barang-masuk');
    }

    public function render()
    {
        return view('livewire.transaksi.barang-masuk.edit-masuk')->extends('layouts1.app')->section('content');
    }
}
