<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimbangSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timbang_sampahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tanggal');
            $table->unsignedBigInteger('pengguna_id')->nullable();
            $table->string('nama_pengguna')->nullable();
            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->string('nama_petugas')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->BigInteger('berat_organik')->nullable();
            $table->BigInteger('berat_anorganik')->nullable();
            $table->enum('status', [' ','menunggu', 'diterima', 'di tolak']);
            $table->BigInteger('gaji')->nullable();
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
        Schema::dropIfExists('timbang_sampahs');
    }
}
