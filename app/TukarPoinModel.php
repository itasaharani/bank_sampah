<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TukarPoinModel extends Model
{
    //
    protected $table='tukar_poin';
    protected $fillable=[
        'no_akun','poin','pilihan'
    ];
}
