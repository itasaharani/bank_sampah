<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Langganan extends Model
{
    protected $table = 'langganan';
    protected $fillable = ['nama', 'jenis_sampah', 'paket_harga', 'masa_berlaku', 'status', 'akhir_langganan','petugas_id'];

    public function petugas()
    {
        return $this->belongsTo('App\ProfilePetugas', 'petugas_id');
    }
}
