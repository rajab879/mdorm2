<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblsem extends Model
{
    public $table="tblsems";
    function tblstudents(){

        return $this->hasMany('App\Tblstudent','semid');
    }
}
