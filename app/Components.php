<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ssh;

class Components extends Model
{
    protected $table = 'components';

    protected $fillable = ['standar_id','komponen_id'];

    public function ssh()
    {
        return $this->belongsTo(Ssh::class,'komponen_id','ssh_id');
    }
}
