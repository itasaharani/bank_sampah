<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuangMandiri extends Model
{
    protected $table ='buang_mandiri';
    protected $fillable = [
        'nama_lengkap',
        'jenis_sampah',
        'bank_id',
        'nama_instansi',
        'status', // Tambahkan kolom nama_bank
    ];

    public function bank()
    {
        return $this->belongsTo(Profilbank::class, 'id');
    }
}
