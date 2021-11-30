<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Standard;

class Ssh extends Model
{
    protected $table = 'ssh';

    protected $fillable = [
        'kode','uraian','spek','satuan','harga'
    ];

    // public function account()
    // {
    //     return $this->belongsTo(Account::class,'kode','kode_rekening');
    // }

    public function standard()
    {
        return $this->BelongsTo(Standard::class,'kode','kode_standar');
    }

    // public function standard()
    // {
    //     return $this->hasOne(Standard::class,'kode_standar','kode');
    // }
}
