<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'stok_barang',
        'id_satuan',
        'id_jenis',
        'created_at',
        'updated_at',
    ];

    public function satuan(): BelongsTo {
        return $this->belongsTo(Satuan::class, 'id_satuan', 'id_satuan');
    }

    public function jenis(): BelongsTo {
        return $this->belongsTo(JenisBarang::class, 'id_jenis', 'id_jenis');
    }

    protected $listeners = ['barangAdded' => '$refresh'];

    public function barangKeluars()
    {
        return $this->hasMany(BarangKeluar::class, 'id_barang', 'id_barang');
    }

    public function barangMasuks()
    {
        return $this->hasMany(BarangMasuk::class, 'id_barang', 'id_barang');
    }
}
