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
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
