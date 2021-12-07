<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Standard;
use App\Components;

class Ssh extends Model
{
    protected $table = 'ssh';

    protected $fillable = [
        'ssh_id','uraian','spek','satuan','harga','users_id','kelompok','pesan'
    ];

    // public function components()
    // {
    //     return $this->belongsTo(Components::class,'ssh_id','komponen_id')
    //                 ->whereNull('komponen_id');
    // }

    // public function account()
    // {
    //     return $this->belongsTo(Account::class,'kode','kode_rekening');
    // }

    // public function standard()
    // {
    //     return $this->BelongsTo(Standard::class,'kode','kode_standar');
    // }

    // public function standard()
    // {
    //     return $this->hasOne(Standard::class,'kode_standar','kode');
    // }
}
