<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblcollege extends Model
{
    public $table="tblcolleges";
    function tblstudents(){

        return $this->hasMany('App\Tblstudent','collegeid');
    }
}
