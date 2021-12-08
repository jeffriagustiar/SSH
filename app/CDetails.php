<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CDetails extends Model
{
    protected $table = 'cdetails';

    protected $fillable =[
        'comp_id',
        'acc_id'
    ];
}
