<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable =[
        'kode_rekening',
        'nama_rekening',
        'pendapatan',
        'belanja',
        'pembiayaan'
    ];
}
