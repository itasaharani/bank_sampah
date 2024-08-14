<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjukanBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajukan_bank', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tanggal')->default(now());
            $table->string('jenis_sampah');
            $table->unsignedBigInteger('pengguna_id')->nullable();
            $table->string('nama_pengguna')->nullable();
            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->string('nama_petugas')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->enum('status', ['menunggu', 'di acc', 'di tolak']);
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
        Schema::dropIfExists('ajukan_bank');
    }
}
