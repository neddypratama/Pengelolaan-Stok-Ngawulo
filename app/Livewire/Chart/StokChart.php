<?php

namespace App\Livewire\Chart;

use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StokChart extends Component
{
    public $stokData = [];

    public function mount()
    {
        // Ambil data stok barang beserta nama satuan
        $this->stokData = DB::table('barangs')
            ->join('satuans', 'barangs.id_satuan', '=', 'satuans.id_satuan')
            ->select('barangs.nama_barang', 'barangs.stok_barang', 'satuans.nama_satuan')
            ->get();
            // dd($this->stokData);
    }

    public function render()
    {
        return view('livewire.chart.stok-chart');
    }
}

