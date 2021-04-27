<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{

    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
