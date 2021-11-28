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
        return $this->belongsTo(User::class,'id','users_id');
    }
}
