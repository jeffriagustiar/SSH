<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    protected $fillable = [
        'nama', 'alamat','phone','kelamin','users_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','users_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }
}
