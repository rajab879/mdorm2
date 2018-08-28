<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbllate extends Model
{
    public $table="tbllates";
    function tblshifts(){

        return $this->belongsTo(Tblshift::class,'shiftid');
    }

    function tblstudents(){
       // $table->foreign(['semid', 'stdid'])->references(['semid', 'stdid'])->on('tblstudents');

       return $this->belongsTo(Tblstudent::class, 'semid,stdid');
       // return $this->belongsTo(Tblstudent::class, 'semid');
      //  return $this->belongsToMany(static::class, 'Tbllates', 'semid', 'stdid');

    }


//
    function users(){

        //return $this->belongsTo('App\User',userid);
        return $this->belongsTo(User::class, 'userid');
    }

    public static function ApplyFilter(\Illuminate\Http\Request  $request)
    {
        //$query = new Tbllate() ;//then apply paginate without call all()
        $query = Tbllate::query();



//        $query = $query->with(['tblbuilds:id,build,buildchar', 'tblroomtypes:id,roomtype']);
//        $query = $query->with('tblcolleges:id,collegename');

            $query = $query->with('tblshifts');
            $query = $query->with('tblstudents');
            $query = $query->with('users');

       // $query->where('id', '>', 0)->orderBy('id', 'asc');

        return  $query ;

//        if ($request->filled('stdid')) { //or use has instead of filled
//
//
//            $query->where('stdid', $request->stdid);
//
//        }
//        if ($request->filled('fname')) {
//
//
//            $query->where('fname', 'like', '%' . $request->fname . '%');
//
//        }
//
//        if ($request->filled('buildidlist')) {
//
//            $query->where('buildid', $request->buildidlist);
//
//
//        }
//
//        if ($request->filled('roomtypelist')) {
//
//
//            $query->where('roomtypeid', $request->roomtypelist);
//
//
//        }
//
//        if ($request->filled('collegelist')) {
//
//
//            $query->where('collegeid', $request->collegelist);
//
//        }
//        if ($request->filled('roomno')) {
//
//
//            $query->where('roomno', $request->roomno);
//
//        }
//
//
//        if ($request->filled('mobile')) {
//
//
//            $query->where('mobile', 'like', '%' . $request->mobile . '%');
//
//        }
//
//
//        if ($request->filled('nationalityidlist')) {
//
//
//            $query->where('nationalityid', $request->nationalityidlist);
//
//        }
//
//        if ($request->filled('semlist')) {
//
//
//            $query->where('semid', $request->semlist);
//
//        }
//
//        if ($request->filled('extension')) {
//
//
//            $query->where('extension', $request->extension);
//
//        }



    }



}
