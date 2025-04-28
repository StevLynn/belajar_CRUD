<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveForeignKeyFromBaduta extends Migration
{
    public function up()
    {
        Schema::table('baduta', function (Blueprint $table) {
            // Menghapus foreign key pada kolom penduduk_ibu_id
            $table->dropForeign(['penduduk_ibu_id']);  // Menghapus foreign key
            
            // Mengubah penduduk_ibu_id menjadi kolom biasa (bukan foreign key)
            $table->unsignedBigInteger('penduduk_ibu_id')->nullable()->change();  // Menjadikan kolom biasa
        });
    }

    public function down()
    {
        Schema::table('baduta', function (Blueprint $table) {
            // Menambahkan kembali foreign key jika migrasi dibatalkan
            $table->foreign('penduduk_ibu_id')->references('id')->on('penduduk')->onDelete('cascade');
        });
    }
}
