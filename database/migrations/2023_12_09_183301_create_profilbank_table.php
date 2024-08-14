<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilbankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profilbank', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_instansi');
            $table->unsignedBigInteger('telepon'); // Menggunakan tipe data INTEGER
            $table->text('alamat');
            $table->unsignedBigInteger('kapasitas_penampungan');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
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
        Schema::dropIfExists('profilbank');
    }
}
