<?php

namespace App\Livewire\Chart;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Livewire\Component;

class MasukChart extends Component
{
    public $barangTerpilihMasuk = 'all';
    public $chartDataMasuk = [];

    public function mount()
    {
        $this->updateChartDataMasuk();
    }

    public function updateChartDataMasuk()
    {

        if ($this->barangTerpilihMasuk === 'all') {
            $this->chartDataMasuk = BarangMasuk::selectRaw('tanggal_masuk, SUM(jumlah_masuk) as total_masuk')
                ->groupBy('tanggal_masuk')
                ->orderBy('tanggal_masuk', 'asc')
                ->get();
        } else {
            $this->chartDataMasuk = BarangMasuk::where('id_barang', $this->barangTerpilihMasuk)
                ->selectRaw('tanggal_masuk, SUM(jumlah_masuk) as total_masuk')
                ->groupBy('tanggal_masuk')
                ->orderBy('tanggal_masuk', 'asc')
                ->get();
        }

        $this->dispatch('updateChartMasuk', $this->chartDataMasuk);
    }

    public function updatedBarangTerpilihMasuk()
    {
        $this->updateChartDataMasuk();
    }

    public function render()
    {
        return view('livewire.chart.masuk-chart', [
            'barangList' => Barang::all(), // Mengambil daftar barang dari tabel Barang
        ]);
    }
}
