<?php

namespace App\Livewire\Master;

use Livewire\Component;

class JenisBarang extends Component
{
    public function render()
    {
        return view('livewire.master.jenis-barang')->extends('layouts1.app')->section('content');
    }
}
