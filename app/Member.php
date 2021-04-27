<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function association()
    {
        return $this->belongsTo('App\Association');
    }

    public function fees()
    {
        return $this->hasMany('App\Fee');
    }
}
