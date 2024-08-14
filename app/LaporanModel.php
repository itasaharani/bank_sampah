<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanModel extends Model
{
    //
    protected $table='laporan';
    protected $fillable=[
        'nama','alamat','jenis','banyak','telepon','driver','harga','poin','pembayaran','tpu'
    ];
}
