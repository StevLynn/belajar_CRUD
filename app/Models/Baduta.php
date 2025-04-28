<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baduta extends Model
{
    use HasFactory;

    protected $table = 'baduta';

    protected $fillable = [
        'penduduk_id',
        'penduduk_ibu_id',
        'usia_kehamilan',
        'jumlah_anak_kandung',
        'tanggal_lahir_anak_terakhir',
        'berat_badan',
        'tinggi_badan',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }

    public function ibu()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_ibu_id');
    }
}
