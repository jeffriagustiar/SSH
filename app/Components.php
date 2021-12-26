<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ssh;
use App\Sbu;
use App\Hspk;
use App\CDetails;
use App\Standard;

class Components extends Model
{
    protected $table = 'components';

    protected $fillable = ['standar_id','komponen_id','status'];

    public function sandard()
    {
        return $this->belongsTo(Standard::class,'standar_id','id');
    }

    public function ssh()
    {
        return $this->belongsTo(Ssh::class,'komponen_id','ssh_id');
    }

    public function sbu()
    {
        return $this->belongsTo(Sbu::class,'komponen_id','sbu_id');
    }

    public function hspk()
    {
        return $this->belongsTo(Hspk::class,'komponen_id','hspk_id');
    }

    public function cdetail()
    {
        return $this->belongsTo(CDetails::class,'komponen_id','comp_id');
    }
}
