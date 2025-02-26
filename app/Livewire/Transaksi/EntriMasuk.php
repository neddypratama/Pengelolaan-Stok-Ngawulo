<?php

namespace App\Livewire\Transaksi;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Satuan;
use Livewire\Component;

class EntriMasuk extends Component
{
    public $kode_masuk, $tanggal_masuk, $jumlah_masuk, $id_barang;
    public $barangs;

    public function mount()
    {
        $this->barangs = \App\Models\Barang::all();
        $this->generateKodemasuk(); // Panggil fungsi untuk generate kode otomatis
    }

    public function generateKodemasuk()
    {
        // Ambil data terakhir berdasarkan id_masuk (paling baru)
        $latestmasuk = BarangMasuk::latest('id_masuk')->first();

        // dd(((int) substr($latestmasuk->kode_masuk, 2)));
        // Jika ada data terakhir, ambil nomor urutnya dan tambahkan 1
        // substr($latestmasuk->kode_masuk, 2) digunakan untuk menghapus "TM" di depan
        $nextNumber = $latestmasuk ? ((int) substr($latestmasuk->kode_masuk, 2)) + 1 : 1;

        // Format kode dengan "TM" + nomor urut yang dipad dengan nol agar tetap 7 digit
        $this->kode_masuk = 'TM' . str_pad($nextNumber, 7, '0', STR_PAD_LEFT);
    }

    public function save()
    {
        $this->validate([
            'kode_masuk' => 'required|unique:barang_masuks,kode_masuk',
            'tanggal_masuk' => 'required|date',
            'jumlah_masuk' => 'required|integer|min:1',
            'id_barang' => 'required',
        ]);
        
        $barang = Barang::find($this->id_barang);
        $stok1 = $barang->stok_barang;
        $stok2 = $this->jumlah_masuk;
        // dd($stok1, $stok2);
        $barang->update([
            'stok_barang' => $stok2 + $stok1,
        ]);

        BarangMasuk::create([
            'kode_masuk' => $this->kode_masuk,
            'tanggal_masuk' => $this->tanggal_masuk,
            'jumlah_masuk' => $this->jumlah_masuk,
            'id_barang' => $this->id_barang,
        ]);

        session()->flash('status', 'Data barang masuk berhasil ditambahkan.');
        $this->reset(['tanggal_masuk', 'jumlah_masuk', 'id_barang']);
        $this->generateKodemasuk(); // Generate kode baru setelah menyimpan data
        return redirect()->to('/barang-masuk');
    }
    public function render()
    {
        return view('livewire.transaksi.barang-masuk.entri-masuk')->extends('layouts1.app')->section('content');
    }
}
