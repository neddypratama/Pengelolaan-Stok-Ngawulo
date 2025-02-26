<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Satuan extends Model
{
    use HasFactory;
    protected $table = 'satuans';
    protected $primaryKey = 'id_satuan';
    protected $fillable = [
        'nama_satuan',
        'created_at',
        'updated_at',
    ];

    protected $listeners = ['satuanAdded' => '$refresh'];

    public function refresh() {
        $this->satuans = Satuan::all();
    }

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_satuan', 'id_satuan');
    }
}
