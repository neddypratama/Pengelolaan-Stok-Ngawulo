<?php

namespace App\Livewire\Chart;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Livewire\Component;

class KeluarChart extends Component
{
    public $barangTerpilihKeluar = 'all';
    public $chartDataKeluar = [];

    public function mount()
    {
        $this->updateChartDataKeluar();
    }

    public function updateChartDataKeluar()
    {

        if ($this->barangTerpilihKeluar === 'all') {
            $this->chartDataKeluar = BarangKeluar::selectRaw('tanggal_keluar, SUM(jumlah_keluar) as total_keluar')
                ->groupBy('tanggal_keluar')
                ->orderBy('tanggal_keluar', 'asc')
                ->get();// Konversi ke array agar lebih aman
        } else {
            $this->chartDataKeluar = BarangKeluar::where('id_barang', $this->barangTerpilihKeluar)
                ->selectRaw('tanggal_keluar, SUM(jumlah_keluar) as total_keluar')
                ->groupBy('tanggal_keluar')
                ->orderBy('tanggal_keluar', 'asc')
                ->get();
        }
        // dd($this->chartDataKeluar);
        $this->dispatch('updateChartKeluar', $this->chartDataKeluar);
    }

    public function updatedBarangTerpilihKeluar()
    {
        $this->updateChartDataKeluar();
    }

    public function render()
    {
        return view('livewire.chart.keluar-chart', [
            'barangList' => Barang::all(),
        ]);
    }
}
