<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblshift extends Model
{
    function tbllates(){

        return $this->hasMany('App\Tblshifts',shiftid);
    }

}
