<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilePetugas extends Model
{
    protected $table = 'profile_petugas';
    protected $fillable = ['nama_lengkap', 'nik', 'telepon', 'alamat','latitude','longitude'];
    public function ajukanBanks()
    {
        return $this->hasMany(AjukanBank::class, 'petugas_id');
    }
}


