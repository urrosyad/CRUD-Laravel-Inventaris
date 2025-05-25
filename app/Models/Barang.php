<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'tb_barang';

    protected $fillable = [
        'kodeBarang',
        'namaBarang',
        'deskBarang',
        'satuanBarang',
        'jumlahBarang',
        'fotoBarang',
    ];
}


