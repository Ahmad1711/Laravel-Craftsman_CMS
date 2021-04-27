<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    

    public function union()
    {
        return $this->hasOne('App\Union');
    }


}
