<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaldoModel extends Model
{
    //
    protected $table='saldo';
    protected $fillable=([
        'no_akun','saldo','pembayaran','no_pembayaran'
    ]);
};
