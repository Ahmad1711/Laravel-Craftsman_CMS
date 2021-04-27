<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    public function union()
    {
        return $this->belongsTo('App\Union');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function diwan()
    {
        return $this->hasOne('App\Diwan');
    }
    public function members()
    {
        return $this->hasMany('App\Member');
    }
}
