<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diwan extends Model
{
    public function association()
    {
        return $this->belongsTo('App\Association');
    }
}
