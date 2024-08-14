<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

protected $fillable = [
    'tanggal', 'pengguna_id','nama_pengguna','latitude','longitude', 'petugas_id', 'nama_petugas', 'jenis_sampah', 'status'
];


    public function petugas()
    {
        return $this->belongsTo('App\ProfilePetugas', 'petugas_id');
    }

    public function user()
{
    return $this->belongsTo('App\User');
}
}
