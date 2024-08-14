<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameNamaToPetugasIdInPengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('petugas_id_in_pengajuan', function (Blueprint $table) {
            Schema::table('pengajuan', function (Blueprint $table) {
                $table->renameColumn('nama', 'petugas_id');
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
        Schema::table('petugas_id_in_pengajuan', function (Blueprint $table) {
            //
        });
    }
}
