<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasper extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'pasca_persalinan';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'penduduk_id',
        'tanggal_persalinan',
        'tempat_persalinan',
        'penolong_persalinan',
        'cara_persalinan',
        'keadaan_bayi',
        'menggunakan_alat_kontrasepsi',
        'meerokok_terpapar',
        'sumber_air_minum',
        'fasilitas_BAB',
        'longitude',
        'latitude',
        'mendapatkan_tablet_tambah_darah',
        'meminum_table_tambah_darah',
        'penyuluhan_KIE',
        'fasilitas_layanan_rujukan',
    ];

    // Relasi dengan model Penduduk
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
