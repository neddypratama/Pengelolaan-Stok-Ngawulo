<?php

namespace App\Livewire\Chart;

use App\Models\Barang;
use Livewire\Component;

class SatuanChart extends Component
{
    public $labelData = [];
    public $satuanBarangData = [];
    public function mount()
    {
        // Ambil data barang
        $barang = Barang::select('satuans.nama_satuan')
            ->join('satuans', 'barangs.id_satuan', '=', 'satuans.id_satuan')
            ->selectRaw('COUNT(*) as jumlah_satuan')
            ->groupBy('satuans.nama_satuan')
            ->get();

        // Set data untuk Chart.js
        $this->labelData = $barang->pluck('nama_satuan');
        $this->satuanBarangData = $barang->pluck('jumlah_satuan');
    }
    public function render()
    {
        return view('livewire.chart.satuan-chart');
    }
}
