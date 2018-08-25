<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblnationality extends Model
{
    public $table="tblnationalitys";
    function tblstudents(){

        return $this->hasMany('App\Tblstudent','nationalityid');
    }
}
