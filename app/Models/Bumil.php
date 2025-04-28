<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bumil extends Model
{
    use HasFactory;

    protected $table = 'bumil';

    protected $fillable = [
        'penduduk_id',
        'usia_kehamilan',
        'TUF',
        'jumlah_anak_kandung',
        'tgl_lahir_ank_terakhir',
        'tinggi_badan',
        'berat_badan_sebelum_hamil',
        'berat_badan_saat_ini',
        'indeks_massa_tubuh',
        'kadar_hemoglobin',
        'LILA',
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
        'fasilitas_bantuan_sosial',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
