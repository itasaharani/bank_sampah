<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('pengajuan', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->dateTime('tanggal')->default(now());
        $table->unsignedBigInteger('pengguna_id');
        $table->string('nama_pengguna');
        $table->string('longitude');
        $table->string('latitude');
        $table->unsignedBigInteger('petugas_id');
        $table->string('nama_petugas');
        $table->string('jenis_sampah');
        $table->enum('status', ['menunggu', 'di acc', 'diproses', 'selesai']);
        $table->timestamps();
    });

   
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::dropIfExists('pengajuan');
}
}