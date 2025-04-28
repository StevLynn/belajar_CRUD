<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('catin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk')->onDelete('cascade'); // ID catin
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // Jenis kelamin catin
            $table->date('tanggal_lahir');
            $table->string('kelurahan');
            $table->enum('kecamatan', ['Ujung', 'Bacukiki', 'Bacukiki Barat', 'Soreang']);
            $table->string('RT');
            $table->string('RW');
            $table->text('alamat');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->integer('indeks_massa_tubuh');
            $table->integer('kadar_hemoglobin');
            $table->integer('LILA');
            $table->text('menggunakan_alat_kontrasepsi')->nullable();
            $table->text('catin_wanita_meerokok_terpapar')->nullable(); // Paparan rokok untuk wanita
            $table->text('catin_pria_meerokok_terpapar')->nullable(); // Paparan rokok untuk pria
            $table->text('sumber_air_minum')->nullable();
            $table->text('fasilitas_BAB')->nullable();
            $table->decimal('longitude', 10, 7); // Menggunakan decimal untuk koordinat
            $table->decimal('latitude', 10, 7); // Menggunakan decimal untuk koordinat
            $table->text('mendapatkan_tablet_tambah_darah')->nullable();
            $table->text('meminum_table_tambah_darah')->nullable();
            $table->text('penyuluhan_KIE')->nullable();
            $table->text('fasilitas_layanan_rujukan')->nullable();
            $table->text('fasilitas_bantuan_sosial')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catin');
    }
};
