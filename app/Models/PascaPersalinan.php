<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PascaPersalinan extends Model
{
    use HasFactory;

    protected $table = 'pasca_persalinan';

    protected $fillable = [
        'penduduk_id',
        'tanggal_persalinan',
        'tempat_persalinan',
        'penolong_persalinan',
        'cara_persalinan',
        'keadaan_bayi',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
