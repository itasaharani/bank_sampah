<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLangganansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/timestamp_create_langganans_table.php

    public function up()
    {
        Schema::create('langganan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('jenis_sampah');
            $table->string('paket_harga');
            $table->string('masa_berlaku');
            $table->string('status')->default('pending'); // default status is pending
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
        Schema::dropIfExists('langganan');
    }
}
