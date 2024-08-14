<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimbangSampah extends Model
{
    protected $table = 'timbang_sampahs';
    protected $fillable = [
        'tanggal',
        'pengguna_id',
        'nama_pengguna',
        'petugas_id',
        'nama_petugas',
        'bank_id',
        'nama_instansi',
        'berat_organik',
        'berat_anorganik',
        'status',
        'gaji',
    ];
}
