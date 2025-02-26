<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluars';
    protected $primaryKey = 'id_keluar';
    protected $fillable = [
        'kode_keluar',
        'tanggal_keluar',
        'jumlah_keluar',
        'id_barang',
        'created_at',
        'updated_at',
    ];

    public function barangKeluar(): BelongsTo {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function satuan(): BelongsTo {
        return $this->belongsTo(Satuan::class, 'id_satuan', 'id_satuan');
    }

    protected $listeners = ['keluarAdded' => '$refresh'];

    public function refresh() {
        $this->keluars = BarangKeluar::all();
    }
}
