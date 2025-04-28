<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'kelurahan',
        'kecamatan',
        'RT',
        'RW',
        'alamat',
        'no_hp',
        'kategori',
    ];

    // Relasi
    public function catin()
    {
        return $this->hasOne(Catin::class);
    }

    public function bumil()
    {
        return $this->hasOne(Bumil::class);
    }

    public function baduta()
    {
        return $this->hasOne(Baduta::class);
    }

    public function pascaPersalinan()
    {
        return $this->hasOne(PascaPersalinan::class);
    }
}
