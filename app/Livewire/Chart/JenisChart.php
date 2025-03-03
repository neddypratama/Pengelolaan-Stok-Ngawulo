<?php

namespace App\Livewire\Chart;

use App\Models\Barang;
use Livewire\Component;

class JenisChart extends Component
{
    public $labelData = [];
    public $jenisBarangData = [];

    public function mount()
    {
        // Ambil data barang
        $barang = Barang::select('jenis_barangs.nama_jenis')
            ->join('jenis_barangs', 'barangs.id_jenis', '=', 'jenis_barangs.id_jenis')
            ->selectRaw('COUNT(*) as jumlah_jenis')
            ->groupBy('jenis_barangs.nama_jenis')
            ->get();

        // Set data untuk Chart.js
        $this->labelData = $barang->pluck('nama_jenis');
        $this->jenisBarangData = $barang->pluck('jumlah_jenis');
    }
    public function render()
    {
        return view('livewire.chart.jenis-chart');
    }
}
