<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblroomtype extends Model
{
    public $table="tblroomtypes";
    function tblstudents(){

        return $this->hasMany('App\Tblstudent','roomtypeid');
    }
}
