<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisBarang extends Model
{
    use HasFactory;
    protected $table = 'jenis_barangs';
    protected $primaryKey = 'id_jenis';
    protected $fillable = [
        'nama_jenis',
        'created_at',
        'updated_at',
    ];

}
