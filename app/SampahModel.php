<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SampahModel extends Model
{
    //
    protected $table = 'sampah';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama','alamat','jenis','banyak','telepon','driver','harga','poin'
    ];
}
