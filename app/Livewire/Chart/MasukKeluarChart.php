<?php

namespace App\Livewire\Chart;

use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Livewire\Component;

class MasukKeluarChart extends Component
{
    public $labelData = []; // Tanggal transaksi
    public $barangMasukData = []; // Data barang masuk
    public $barangKeluarData = []; // Data barang keluar
    public $barangMasukNama = []; // Nama barang masuk
    public $barangKeluarNama = []; // Nama barang keluar

    public function mount()
    {
        // Ambil data barang masuk berdasarkan tanggal dan nama barang
        $barangMasuk = BarangMasuk::join('barangs', 'barang_masuks.id_barang', '=', 'barangs.id_barang')
            ->selectRaw('DATE(barang_masuks.tanggal_masuk) as tanggal, barangs.nama_barang, SUM(barang_masuks.jumlah_masuk) as total_masuk')
            ->groupBy('tanggal', 'barangs.nama_barang')
            ->orderBy('tanggal')
            ->get();

        // Ambil data barang keluar berdasarkan tanggal dan nama barang
        $barangKeluar = BarangKeluar::join('barangs', 'barang_keluars.id_barang', '=', 'barangs.id_barang')
            ->selectRaw('DATE(barang_keluars.tanggal_keluar) as tanggal, barangs.nama_barang, SUM(barang_keluars.jumlah_keluar) as total_keluar')
            ->groupBy('tanggal', 'barangs.nama_barang')
            ->orderBy('tanggal')
            ->get();

        // Menggabungkan semua tanggal dari kedua tabel
        $tanggalSemua = $barangMasuk->pluck('tanggal')->merge($barangKeluar->pluck('tanggal'))->unique()->sort();

        // Mapping data ke tanggal yang sama
        foreach ($tanggalSemua as $tanggal) {
            $this->labelData[] = date('d M Y', strtotime($tanggal)); // Format tanggal menjadi "01 Jan 2024"

            // Data barang masuk
            $barangMasukPerTanggal = $barangMasuk->where('tanggal', $tanggal);
            $this->barangMasukData[] = $barangMasukPerTanggal->sum('total_masuk');
            $this->barangMasukNama[] = $barangMasukPerTanggal->pluck('nama_barang')->implode(', ');

            // Data barang keluar
            $barangKeluarPerTanggal = $barangKeluar->where('tanggal', $tanggal);
            $this->barangKeluarData[] = $barangKeluarPerTanggal->sum('total_keluar');
            $this->barangKeluarNama[] = $barangKeluarPerTanggal->pluck('nama_barang')->implode(', ');
        }
    }

    public function render()
    {
        return view('livewire.chart.masuk-keluar-chart');
    }
}
