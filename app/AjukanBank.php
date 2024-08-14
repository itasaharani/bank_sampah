<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AjukanBank extends Model
{
    protected $table = 'ajukan_bank';
    protected $fillable = ['pengguna_id', 'nama_pengguna','petugas_id', 'nama_petugas', 'jenis_sampah','bank_id','nama_instansi','status'];

}
