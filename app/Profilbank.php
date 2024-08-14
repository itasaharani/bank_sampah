<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profilbank extends Model
{
    protected $table = 'profilbank';

    protected $fillable = ['nama_instansi', 'telepon', 'alamat', 'kapasitas_penampungan', 'latitude', 'longitude'];

}
