<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    public function associations()
    {
        return $this->hasMany('App\Association');
        /*$this->hasMany('Post::class')*/
    }
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
