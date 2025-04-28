<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catin extends Model
{
    use HasFactory;

    protected $table = 'catin';

    protected $fillable = [
        'penduduk_id',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'kelurahan',
        'kecamatan',
        'RT',
        'RW',
        'alamat',
        'tinggi_badan',
        'berat_badan',
        'indeks_massa_tubuh',
        'kadar_hemoglobin',
        'LILA',
        'menggunakan_alat_kontrasepsi',
        'catin_wanita_meerokok_terpapar',
        'catin_pria_meerokok_terpapar',
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

    // Relasi
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
