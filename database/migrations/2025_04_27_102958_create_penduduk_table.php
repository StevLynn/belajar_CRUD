<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('kelurahan');
            $table->enum('kecamatan', ['Ujung', 'Bacukiki', 'Bacukiki Barat', 'Soreang']);
            $table->string('RT');
            $table->string('RW');
            $table->text('alamat');
            $table->string('no_hp',16);
            $table->enum('kategori', ['CATIN', 'BUMIL', 'BADUTA', 'Pasca Persalinan']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penduduk');
    }

};
