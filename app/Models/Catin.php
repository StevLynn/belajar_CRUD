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
        'alamat',
        'no_hp',
    ];

    // Relasi
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
