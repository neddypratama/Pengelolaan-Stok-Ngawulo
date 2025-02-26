<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuks';
    protected $primaryKey = 'id_masuk';
    protected $fillable = [
        'kode_masuk',
        'tanggal_masuk',
        'jumlah_masuk',
        'id_barang',
        'created_at',
        'updated_at',
    ];

    public function barangMasuk(): BelongsTo {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function satuan(): BelongsTo {
        return $this->belongsTo(Satuan::class, 'id_satuan', 'id_satuan');
    }

    protected $listeners = ['masukAdded' => '$refresh'];

    public function refresh() {
        $this->masuks = BarangMasuk::all();
    }
}
