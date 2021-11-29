<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;

class Ssh extends Model
{
    protected $table = 'ssh';

    protected $fillable = [
        'kode','uraian','spek','satuan','harga'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class,'kode','kode_rekening');
    }
}
