<?php

namespace App\Http\Controllers;

use App\Tblbuild;
use App\Tblcollege;
use App\Tblnationality;
use App\Tblroomtype;
use App\Tblsem;
use App\Tblstudent;
 use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

//use Intervention\Image\Facades\Image;
use Image;
use PDF;
//use Image;
class StudentController extends Controller
{
    public function __construct()
    {
      // $this->middleware('auth');
    }

    public function index(Request $request, Tblstudent $tblstudents)
    {

        $tblstudents2 = StudentController::ApplyFliter($request);
        $countarr = array('acountarr' => $tblstudents2->count());
        //$str='student?k=0'.$request->getQueryString();
        //getrequest is hidden field to indicate submit button pressed

        if ($request->getrequest != null)
            $str = 'student?k=0&_token=' . $request->_token . '&buildidlist=' . $request->buildidlist . '&collegelist=' . $request->collegelist . '&extension=' . $request->extension . '&fname=' . $request->fname . '&mobile=' . $request->mobile . '&nationalityidlist=' . $request->nationalityidlist . '&roomTypelist=' . $request->roomTypelist . '&roomno=' . $request->roomno . '&stdid=' . $request->stdid . '&getrequest=' . $request->getrequest;
        else
            $str = 'student';

        $tblstudents = StudentController::paginate($tblstudents2, $perPage = 50, $page = null, $options = [], $str);
        $tblbuilds = Tblbuild::all();
        $tblcolleges = Tblcollege::all();
        $tblnationalitys = Tblnationality::all();
        $tblroomtypes = Tblroomtype::all();
        $tblsems = Tblsem::all();
        session()->flashInput($request->input());//to keep old value
      // dd($tblstudents);
        return view('Student.viewstudents', compact('tblstudents', 'tblbuilds', 'tblcolleges', 'tblnationalitys', 'tblroomtypes', 'tblsems', 'countarr'));

    }

    public static function ApplyFliter(Request $request)
    {

        //  If you would like to determine if a value is present on the request and is not empty,
        // you may use the filled method:
        //or use 'has('stdid')' to check if it is not empty

        $tblstudents = (new Tblstudent)->newQuery();
       // $tblstudents = Tblstudent::query();
        if ($request->filled('stdid')) { //or use has instead of filled


            $tblstudents->where('stdid', $request->stdid);

        }
        if ($request->filled('fname')) {


            $tblstudents->where('fname', 'like', '%' . $request->fname . '%');

        }

        if ($request->filled('buildidlist')) {


            $tblstudents->where('buildid', $request->buildidlist);

        }
        if ($request->filled('roomtypelist')) {


            $tblstudents->where('roomtypeid', $request->roomtypelist);

        }

        if ($request->filled('collegelist')) {


            $tblstudents->where('collegeid', $request->collegelist);

        }
        if ($request->filled('roomno')) {


            $tblstudents->where('roomno', $request->roomno);

        }


        if ($request->filled('mobile')) {


            $tblstudents->where('mobile', 'like', '%' . $request->mobile . '%');

        }


        if ($request->filled('nationalityidlist')) {


            $tblstudents->where('nationalityid', $request->nationalityidlist);

        }

        if ($request->filled('semlist')) {


            $tblstudents->where('semid', $request->semlist);

        }

        if ($request->filled('extension')) {


            $tblstudents->where('extension', $request->extension);

        }

        $tblstudents->where('buildid', '>', 0)->orderBy('buildid', 'asc')->orderBy('roomno', 'asc');

         return $tblstudents->get();//return collection
        //return $tblstudents->paginate(50);//return collection

        //try to use the followin  method because it is return query and use pagination and simplePaginate

        // $tblstudents= Tblstudent::where('buildid','>', 0)->orderBy('buildid', 'asc')->orderBy('roomno', 'asc')->simplePaginate(200);;
        // becuase 'where' change it query
        //put any true condition  if there is no condition

    }

    //use to paginate collection
    //but if the return is query, do not use it and  use pagination or simplePaginate directly

    public static function paginate($items, $perPage = 15, $page = null, $options = ['student'], $requeststring)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return (new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options))->withPath($requeststring);
    }


    public function viewstdjson()
    {
     return view('Student.viewstds',StudentController::LoadDataList());

    }

    public static function LoadDataList(){

        $tblstudents = (new Tblstudent)->newQuery();

        // $tblstudents = Tblstudent::all();
        $tblbuilds = Tblbuild::all();
        $tblcolleges = Tblcollege::all();
        $tblnationalitys = Tblnationality::all();
        $tblroomtypes = Tblroomtype::all();
        $tblsems = Tblsem::all();
        //session()->flashInput($request->input());//to keep old value

       return compact('tblbuilds', 'tblcolleges', 'tblnationalitys', 'tblroomtypes', 'tblsems', 'countarr');

    }

    public function viewstdsjsonpost(Request $request)
    {
        try{
        $tblstudents = Tblstudent::ApplyFliter($request)->paginate(50);

        return response()->json( array('d'=>$tblstudents) , 200);
        }catch(\Exception $ex){
            return response()->json( array('d'=>'Error while Executing Process') , 404);
        }
    }

    public function DormFilePDF($id){
        if (!is_numeric($id)) {

            return view('home') ;//return error page


        }

        $tblstudents = Tblstudent::GetStudentById($id);

        if($tblstudents==null){
            return view('home') ;//return error page
        }

        $std=array('std'=>$tblstudents);



        $pdf = PDF::loadView('student.dormfilepdf', $std);
         return $pdf->download('invoice.pdf');
      // return view('student.dormfilepdf', $std);

    }

    public function LeaveFilePDF($id){
        if (!is_numeric($id)) {

            return view('home') ;//return error page


        }

        $tblstudents = Tblstudent::GetStudentById($id);

        if($tblstudents==null){
            return view('home') ;//return error page
        }

        $std=array('std'=>$tblstudents);





        $pdf = PDF::loadView('student.leavefilepdf',$std );
         //  $pdf = PDF::loadView('student.leavefilepdf',compact('tblstudents'));
        return $pdf->download('leave.pdf');


      //return view('student.leavefilepdf',compact('tblstudents')) ;

   }

    public function CreateStudent(Request $request)
    {
        try{

//            if ($request->isMethod('post')){
//
//
//
////                $std = new Tblstudent();
////
////                $std = request()->all();;
////
////                $std->save();
//
//                Tblstudent::create($request->all());
//
//                 }
//



            $tblbuilds = Tblbuild::all();
            $tblcolleges = Tblcollege::all();
            $tblnationalitys = Tblnationality::all();
            $tblroomtypes = Tblroomtype::all();
            $tblsems = Tblsem::all();
            session()->flashInput($request->input());//to keep old value


            return view('student.createstudent', compact( 'tblbuilds', 'tblcolleges', 'tblnationalitys', 'tblroomtypes', 'tblsems'));




          }catch(\Exception $ex){
            dd($ex) ;

          //  return view('student.createstudent');
        }
    }

    public function createstudentjson2(Request $request)
    {
        //try{
            $query = new Tblstudent();
            if ($request->filled('stdid')) { //or use has instead of filled


                $query->stdid=$request->stdid ;

            }
            if ($request->filled('fname')) {


                $query->fname=$request->fname  ;

            }

            if ($request->filled('buildidlist')) {

                $query->buildid=$request->buildidlist;


            }

            if ($request->filled('roomtypelist')) {


                $query->roomtypeid=$request->roomtypelist;


            }

            if ($request->filled('collegelist')) {


                $query->collegeid=$request->collegelist;

            }
            if ($request->filled('roomno')) {


                $query->roomno=$request->roomno;

            }


            if ($request->filled('mobile')) {


                $query->mobile=$request->mobile ;

            }


            if ($request->filled('nationalityidlist')) {


                $query->nationalityid=$request->nationalityidlist;

            }

            if ($request->filled('semlist')) {


                $query->semid=$request->semlist;

            }

            if ($request->filled('extension')) {


                $query->extension= $request->extension;

            }

        if ($request->filled('donor')) {


            $query->donor= $request->donor;

        }


        if ($request->filled('country')) {


            $query->country= $request->country;

        }



        dump($query);


             // $std = request()->all();;

        //
          $query->save();
//
            // Tblstudent::create($query);
        $tblbuilds = Tblbuild::all();
        $tblcolleges = Tblcollege::all();
        $tblnationalitys = Tblnationality::all();
        $tblroomtypes = Tblroomtype::all();
        $tblsems = Tblsem::all();
        session()->flashInput($request->input());//to keep old value


        return view('student.createstudent', compact( 'tblbuilds', 'tblcolleges', 'tblnationalitys', 'tblroomtypes', 'tblsems'));


    }


//    public function createstudentjson(Request $request)
//    {
//        $this->validate($request,[
//                'stdid'=>'required|max:9',
//
//
//            ]
//
//        );
//        if(!File::exists( 'imagestd/'.$request->semlist)) {
//            File::makeDirectory('imagestd/'.$request->semlist, 0777, true, true);
//        }
//
//        Image::make($request->file('imagefile'))->save( 'imagestd/'.$request->semlist.'/'.$request->stdid.'.jpg');
//
//        return response()->json( array('d'=>'Created Successfully') , 200);
//    }

    public function createstudentjson(Request $request)
    {
//      // try{
        $query = new Tblstudent();

        //$request=json_decode( $DataRequest->objArr);//decode string to json


            $query->stdid=$request->stdid ;
            $query->fname=$request->fname  ;
            $query->buildid=$request->buildidlist;
            $query->roomtypeid=$request->roomtypelist;
            $query->collegeid=$request->collegelist;
            $query->roomno=$request->roomno;
            $query->mobile=$request->mobile ;
            $query->nationalityid=$request->nationalityidlist;
            $query->semid=$request->semlist;
            $query->extension= $request->extension;
            $query->donor= $request->donor;
            $query->country= $request->country;

        $this->validate($request,[
                'stdid'=>'required|max:9|min:9',
                'fname'=>'required|min:3|max:50',
                'mobile'=>'required|min:10|max:15',
                'donor'=>'required|min:3|max:50',
                'country'=>'required|min:3|max:50',
                'extension'=>'min:4|max:4',
                'roomno'=>'required|min:3|max:3',
                'roomtypelist'=>'required',
                'buildidlist'=>'required',
                'nationalityidlist'=>'required',
                'collegelist'=>'required',
                'semlist'=>'required'
            ]);

        if( $request->file('imagefile')) {
            if(!File::exists( 'imagestd/'.$request->semlist)) {
                File::makeDirectory('imagestd/'.$request->semlist, 0777, true, true);
            }
           Image::make($request->file('imagefile'))->save( 'imagestd/'.$request->semlist.'/'.$request->stdid.'.jpg');
        }



       // Image::make($request->file('imagefile'))->resize(300, 200)->save('foo.jpg');




          $query->save();

        //Tblstudent::create($query);

        return response()->json( array('d'=>'Created Successfully') , 200);
//        }catch(\Exception $ex){
//            dd($ex);
//            //return response()->json( array('d'=>'Error while Executing Process') , 404);
//            return response()->json( array('d'=>$ex) , 404);
//        }
    }

    public function viewstdadmin(){
        return view('Student.viewstdadmin',StudentController::LoadDataList());
    }

    public function EditStudent($id){
       $stdobj= Tblstudent::find($id);

       $std=array('std'=>$stdobj);

       $listarr= StudentController::LoadDataList();
         //dd($std);
     //$dist=compact('listarr','std');//create array with two keys every key point to array
        // , std['std']->stdid
        // foreach $listarr['tblbuilds'] as $building)




         // $k=array('std' => $std, 'arrlist' => $listarr);//the same compact


         $listarr["std"]=$std;//add new element to array with key std and keep all previous key the same
        //  @foreach($tblbuilds as $building)


        return view('Student.EditStudent',$listarr);
    }


    public function EditStudentJson(Request $request)
    {
        $this->validate($request,[
            'stdid'=>'required|max:9|min:9',
            'fname'=>'required|min:3|max:50',
            'mobile'=>'required|min:10|max:15',
            'donor'=>'required|min:3|max:50',
            'country'=>'required|min:3|max:50',
            'extension'=>'min:4|max:4',
            'roomno'=>'required|min:3|max:3',
            'roomtypelist'=>'required',
            'buildidlist'=>'required',
            'nationalityidlist'=>'required',
            'collegelist'=>'required',
            'semlist'=>'required'
        ]);
        $query= Tblstudent::find($request->id);

        $query->stdid=$request->stdid ;
        $query->fname=$request->fname  ;
        $query->buildid=$request->buildidlist;
        $query->roomtypeid=$request->roomtypelist;
        $query->collegeid=$request->collegelist;
        $query->roomno=$request->roomno;
        $query->mobile=$request->mobile ;
        $query->nationalityid=$request->nationalityidlist;
        $query->semid=$request->semlist;
        $query->extension= $request->extension;
        $query->donor= $request->donor;
        $query->country= $request->country;


        $query->save();
        if( $request->file('imagefile')) {
            if(!File::exists( 'imagestd/'.$request->semlist)) {
                File::makeDirectory('imagestd/'.$request->semlist, 0777, true, true);
            }
            Image::make($request->file('imagefile'))->save( 'imagestd/'.$request->semlist.'/'.$request->stdid.'.jpg');
        }


        return response()->json( array('d'=>'Created Successfully') , 200);

    }
    public function DelStudentJson(Request $request)
    {

        Tblstudent::destroy($request->id);

        return response()->json( array('d'=>'Deleted Successfully') , 200);
    }



}



/*
 * attributes: array:17 [▼
      "id" => 1
      "Col001" => 1.0
      "fname" => "طاهر احمدوف"
      "stdid" => "U00040075"
      "collegeid" => 7
      "roomno" => 101
      "roomtypeid" => 5
      "buildid" => 1
      "extension" => 239
      "mobile" => "563731903"
      "donor" => "خاص"
      "country" => "روسيا"
      "nationalityid" => 19
      "snote" => null
      "semid" => 38
      "created_at" => null
      "updated_at" => null
 *Extending a bit Alexey's perfect answer :

Dispatch::all() => Returns a Collection

Dispatch::all()->where() => Returns a Collection

Dispatch::where() => Returns a Query

Dispatch::where()->get() => Returns a Collection

Dispatch::where()->get()->where() => Returns a Collection

You can only invoke "paginate" on a Query, not on a Collection.

And yes, it is totally confusing to have a where function for both Queries and Collections,
working as close as they do, but it is what it is.
 *
 * // public function paginate($items, $perPage = 15, $page = null, $options = [])

      //  if ($request->isMethod('post')){

      //      $tblstudents2=  StudentController ::ApplyFliter($request);
       //
      //  }
       // else
        //$tblstudents= Tblstudent::where('buildid','>', 0)->paginate(200);;//paginate use number paging while simplePaginate Next Previous
     //  $tblstudents= Tblstudent::where('buildid','>', 0)->orderBy('buildid', 'asc')->orderBy('roomno', 'asc')->simplePaginate(200);;
        //put any true condition to use pagination
        //pagination work with query not colletion




 *   // $students=Tblstudent::find(149);

        // $students = Tblstudent::where('stdid', '20615209')->firstOrFail();

          //$students = Tblsem::where('id','>', 3)->get() ;
         // $tblbuilds=Tblbuild::find(1);

        //$ar=Array('studentsarr'=>$students);
         //dd($ar);
        //return view('Student.viewstudents',$ar);



 *
 * //            $ar= new Comment();
//            $ar->comment=$request->input('body');
//            $ar->article_id= $id;
//            $ar->save();
            // return redirect("view");
           // $priorityID = $request->get('jobPriority');
            //$tblstudents = Tblstudent::where('stdid', $request->stdid)->where('buildid',  $request->buildidlist)->get();
            //dd($students);
          //  If you would like to determine if a value is present on the request and is not empty, you may use the filled method:

            //$tblstudents = (new Tblstudent)->newQuery();
             $tblstudents = $tblstudents->newQuery();
            if ($request->filled('stdid'))  { //or use has instead of filled



                // Search for a user based on their name.

             $tblstudents->where('stdid', $request->stdid);
               // $tblstudents = Tblstudent::where('stdid', $request->stdid);
               // $tblstudents->get();
               // dd($tblstudents);
            }
            if ($request->filled('buildidlist'))  {



                // Search for a user based on their name.

                $tblstudents->where('buildid', $request->input('buildidlist'));
                //$tblstudents = Tblstudent::where('buildid', $request->buildidlist) ;
            }
            $tblstudents=$tblstudents->get();
           // dd($tblstudents);
 */