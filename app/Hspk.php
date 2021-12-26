<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Standard;
use App\Components;

class Hspk extends Model
{
    protected $table = 'hspk';

    protected $fillable = [
        'hspk_id','uraian','spek','satuan','harga','users_id','kelompok','pesan',
        'r1','r2','r3','r4','r5','r6','r7','r8','r9','r10'
    ];

    // public function components()
    // {
    //     return $this->belongsTo(Components::class,'ssh_id','komponen_id')
    //                 ->whereNull('komponen_id');
    // }

    public function acc1()
    {
        return $this->belongsTo(Account::class,'r1','id');
    }

    public function acc2()
    {
        return $this->belongsTo(Account::class,'r2','id');
    }

    public function acc3()
    {
        return $this->belongsTo(Account::class,'r3','id');
    }

    public function acc4()
    {
        return $this->belongsTo(Account::class,'r4','id');
    }

    public function acc5()
    {
        return $this->belongsTo(Account::class,'r5','id');
    }

    public function acc6()
    {
        return $this->belongsTo(Account::class,'r6','id');
    }

    public function acc7()
    {
        return $this->belongsTo(Account::class,'r7','id');
    }

    public function acc8()
    {
        return $this->belongsTo(Account::class,'r8','id');
    }

    public function acc9()
    {
        return $this->belongsTo(Account::class,'r9','id');
    }

    public function acc10()
    {
        return $this->belongsTo(Account::class,'r10','id');
    }

    // public function standard()
    // {
    //     return $this->BelongsTo(Standard::class,'kode','kode_standar');
    // }

    // public function standard()
    // {
    //     return $this->hasOne(Standard::class,'kode_standar','kode');
    // }
}
