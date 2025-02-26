<?php

namespace App\Livewire\Master;

use App\Models\Satuan;
use Livewire\Component;

class EntriSatuan extends Component
{
    public $nama_satuan, $id_satuan;

    public function mount(){
        $this->generateIDSatuan(); // Panggil fungsi untuk generate kode otomatis
    }

    public function generateIDSatuan()
    {
        $latestBarang = Satuan::latest('id_satuan')->first(); // Ambil data terakhir
        $nextNumber = $latestBarang->id_satuan + 1;
        // dd($nextNumber + 1);
        $this->id_satuan = $nextNumber;
    }

    public function save()
    {
        $this->validate([
            'nama_satuan' => 'required|unique:satuans,nama_satuan',
        ]);

        Satuan::create([
            'nama_satuan' => $this->nama_satuan,
        ]);

        session()->flash('status', 'Data satuan berhasil ditambahkan.');
        $this->reset(['nama_satuan']);
        $this->generateIDSatuan();
        // $this->dispatch('satuanAdded');
        return redirect()->to('/satuan');
    }

    public function render()
    {
        return view('livewire.master.satuan.entri-satuan')->extends('layouts1.app')->section('content');
    }
}
