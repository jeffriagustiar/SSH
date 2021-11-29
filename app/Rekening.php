<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $table = 'rekening';

    protected $fillable =[
        'kode_rekening',
        'nama_rekening',
        'pendapatan',
        'belanja',
        'pembiayaan'
    ];
}
