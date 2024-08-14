<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToLanggananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('langganan', function (Blueprint $table) {
            Schema::table('langganan', function (Blueprint $table) {
                $table->date('akhir_langganan')->nullable(); // Menyimpan masa berlaku dalam hari
                $table->unsignedBigInteger('petugas_id')->nullable(); // ID petugas yang bertanggung jawab
                $table->foreign('petugas_id')->references('id')->on('profile_petugas')->onDelete('set null');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('langganan', function (Blueprint $table) {
            Schema::table('langganan', function (Blueprint $table) {
                $table->dropColumn(['akhir_langganan', 'petugas_id']);
            });
        });
    }
}
