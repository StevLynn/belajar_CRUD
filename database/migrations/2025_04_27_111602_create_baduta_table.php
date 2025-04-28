<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('baduta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk')->onDelete('cascade'); // ID bayi
            $table->foreignId('penduduk_ibu_id')->constrained('penduduk')->onDelete('cascade'); // ID ibu (relasi ke tabel penduduk)
            $table->integer('usia_kehamilan'); // Usia kehamilan saat bayi dilahirkan
            $table->integer('jumlah_anak_kandung');
            $table->date('tanggal_lahir_anak_terakhir');
            $table->integer('berat_badan'); // Berat badan bayi
            $table->integer('tinggi_badan'); // Tinggi badan bayi
            $table->integer('urutan_anak'); // Urutan anak (misalnya anak ke-1, ke-2, dst)
            $table->integer('umur_kehamilan_saat_lahir'); // Umur kehamilan saat bayi lahir
            $table->text('menggunakan_alat_kontrasepsi')->nullable(); // Alat kontrasepsi yang digunakan ibu
            $table->text('sumber_air_minum')->nullable(); // Sumber air minum ibu
            $table->text('fasilitas_BAB')->nullable(); // Fasilitas BAB ibu
            $table->text('asi_eksklusif')->nullable(); // Menyusui dengan ASI eksklusif
            $table->text('imunisasi_hepatitis_B')->nullable(); // Imunisasi hepatitis B
            $table->text('meerokok_terpapar')->nullable(); // Ibu merokok atau terpapar
            $table->text('mengisi_KKA')->nullable(); // Mengisi KKA (Kartu Kesehatan Anak)
            $table->decimal('longitude', 10, 7); // Koordinat longitude
            $table->decimal('latitude', 10, 7); // Koordinat latitude
            $table->text('kehadiran_posyandu')->nullable(); // Kehadiran di posyandu
            $table->text('penyuluhan_KIE')->nullable(); // Penyuluhan KIE
            $table->text('fasilitas_bantuan_sosial')->nullable(); // Fasilitas bantuan sosial
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('baduta');
    }
};
