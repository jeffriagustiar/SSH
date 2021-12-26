<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;

class CDetails extends Model
{
    protected $table = 'cdetails';

    protected $fillable =[
        'comp_id',
        'acc_id'
    ];

    public function acc()
    {
        return $this->belongsTo(Account::class,'acc_id','id');
    }
}
