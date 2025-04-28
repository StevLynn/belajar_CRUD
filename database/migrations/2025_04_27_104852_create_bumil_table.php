<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bumil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk')->onDelete('cascade');
            $table->integer('usia_kehamilan');
            $table->integer('TUF');
            $table->integer('jumlah_anak_kandung');
            $table->date('tgl_lahir_ank_terakhir');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan_sebelum_hamil');
            $table->integer('berat_badan_saat_ini'); // Hapus duplikasi kolom ini
            $table->integer('indeks_massa_tubuh');
            $table->integer('kadar_hemoglobin');
            $table->integer('LILA');
            $table->text('menggunakan_alat_kontrasepsi')->nullable();
            $table->text('meerokok_terpapar')->nullable();
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
        Schema::dropIfExists('bumil');
    }
};
