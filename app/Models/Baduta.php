<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baduta extends Model
{
    use HasFactory;

    protected $table = 'baduta';  // Tabel yang digunakan adalah 'baduta'

    protected $fillable = [
        'penduduk_id',  // ID bayi
        'penduduk_ibu_id',  // ID ibu
        'jumlah_anak_kandung',  // Jumlah anak kandung
        'tanggal_lahir_anak_terakhir',  // Tanggal lahir anak terakhir
        'berat_badan',  // Berat badan bayi
        'tinggi_badan',  // Tinggi badan bayi
        'urutan_anak',  // Urutan anak
        'umur_kehamilan_saat_lahir',  // Umur kehamilan saat lahir
        'menggunakan_alat_kontrasepsi',  // Menggunakan alat kontrasepsi
        'sumber_air_minum',  // Sumber air minum
        'fasilitas_BAB',  // Fasilitas BAB
        'asi_eksklusif',  // ASI eksklusif
        'imunisasi_hepatitis_B',  // Imunisasi Hepatitis B
        'meerokok_terpapar',  // Merokok terpapar
        'mengisi_KKA',  // Mengisi KKA
        'longitude',  // Longitude
        'latitude',  // Latitude
        'kehadiran_posyandu',  // Kehadiran Posyandu
        'penyuluhan_KIE',  // Penyuluhan KIE
        'fasilitas_bantuan_sosial',  // Fasilitas bantuan sosial
    ];

    // Relasi dengan tabel Penduduk untuk bayi
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');  // Menghubungkan ke ID bayi di tabel Penduduk
    }

}
