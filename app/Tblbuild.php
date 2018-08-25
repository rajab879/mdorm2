<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblbuild extends Model
{
    public $table="Tblbuilds";
    function tblstudents(){
        //because of id is not primary key for tblstudents ,must put foreignkey
        return $this->hasMany('App\Tblstudent','buildid');
    }

}
