<?php

namespace App\Livewire\Transaksi;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Livewire\Component;

class EntriKeluar extends Component
{
    public $kode_keluar, $tanggal_keluar, $jumlah_keluar, $id_barang;
    public $barangs;

    public function mount()
    {
        $this->barangs = \App\Models\Barang::all();
        $this->generateKodekeluar(); // Panggil fungsi untuk generate kode otomatis
    }

    public function generateKodekeluar()
    {
        // Ambil data terakhir berdasarkan id_keluar (paling baru)
        $latestkeluar = BarangKeluar::latest('id_keluar')->first();

        // dd((int) substr($latestkeluar->kode_keluar, 3));
        // Jika ada data terakhir, ambil nomor urutnya dan tambahkan 1
        // substr($latestkeluar->kode_keluar, 2) digunakan untuk menghapus "TM" di depan
        $nextNumber = $latestkeluar ? ((int) substr($latestkeluar->kode_keluar, 3)) + 1 : 1;

        // Format kode dengan "TM" + nomor urut yang dipad dengan nol agar tetap 7 digit
        $this->kode_keluar = 'TK' . str_pad($nextNumber, 7, '0', STR_PAD_LEFT);
    }

    public function save()
    {
        $this->validate([
            'kode_keluar' => 'required|unique:barang_keluars,kode_keluar',
            'tanggal_keluar' => 'required|date',
            'jumlah_keluar' => 'required|integer|min:1',
            'id_barang' => 'required',
        ]);
        
        $barang = Barang::find($this->id_barang);
        $stok1 = $barang->stok_barang;
        $stok2 = $this->jumlah_keluar;
        // dd($stok1, $stok2);
        $barang->update([
            'stok_barang' => $stok1 - $stok2,
        ]);

        Barangkeluar::create([
            'kode_keluar' => $this->kode_keluar,
            'tanggal_keluar' => $this->tanggal_keluar,
            'jumlah_keluar' => $this->jumlah_keluar,
            'id_barang' => $this->id_barang,
        ]);
        
        session()->flash('status', 'Data barang keluar berhasil ditambahkan.');
        $this->reset(['tanggal_keluar', 'jumlah_keluar', 'id_barang']);
        $this->generateKodekeluar(); // Generate kode baru setelah menyimpan data
        return redirect()->to('/barang-keluar');
    }
    public function render()
    {
        return view('livewire.transaksi.barang-keluar.entri-keluar')->extends('layouts1.app')->section('content');
    }
}
