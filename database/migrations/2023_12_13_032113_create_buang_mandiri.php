<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuangMandiri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buang_mandiri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tanggal')->default(now());
            $table->string('nama_lengkap');
            $table->string('jenis_sampah');
            $table->unsignedBigInteger('bank_id');
            $table->string('nama_instansi'); 
            $table->enum('status', ['menunggu', 'di acc', 'di tolak']);// Tambahkan kolom nama_bank
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('profilbank')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buang_mandiri');
    }
}
