<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class profile extends Model
{
    protected $table = 'profile';
    protected $fillable = ['nama_lengkap', 'nik', 'telepon', 'alamat','latitude','longitude'];
    public static function getValidationRules()
    {
        return [
            'nama_lengkap' => 'required',
            'nik' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }

    public function user()
    {
        
            return $this->belongsTo(User::class, 'pengguna_id'); // Gantilah 'foreign_key' dengan nama foreign key yang sesuai.
        
    }
}
