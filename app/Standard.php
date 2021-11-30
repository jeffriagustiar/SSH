<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $fillable = [
        'kode_standar',
        'nama_standar',
        'tipe',
        'kelompok'
    ];
}
