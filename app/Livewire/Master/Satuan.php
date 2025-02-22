<?php

namespace App\Livewire\Master;

use Livewire\Component;

class Satuan extends Component
{
    public function render()
    {
        return view('livewire.master.satuan')->extends('layouts1.app')->section('content');
    }
}
