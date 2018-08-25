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


use Image;
use PDF;
//use Image;
class StudentController extends Controller
{
    const  ArrVlidator=array('stdid'=>'required|max:9|min:9',
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
        'semlist'=>'required');

    public function __construct()
    {
     $this->middleware('auth');
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
    public static function SaveImage($imagefile,$stdid,$semid){
/*
 *
 *
 * top-left (default)
top
top-right
left
center
right
bottom-left
bottom
bottom-right
         $img->insert('imagestd/watermark.png','bottom-right',10,10);
 */

            if(!File::exists( 'imagestd/'.$semid)) {
                File::makeDirectory('imagestd/'.$semid, 0777, true, true);
            }
        // create an image
//        $img = Image::make('public/foo.jpg');
//        $size = $img->filesize();
        $img =Image::make($imagefile);
         $ext=$imagefile->getClientOriginalExtension();
         $ext=strtolower($ext);

//         if($ext!='jpg'&& $ext!='jpeg')
//           dd('not jpg or jpeg');
//             return 'only jpg image type is allowed';

        $size = $img->filesize();//in bytes
        $size=$size/1024;//in kilo bytes
        if($size>512){

            // resize only the width of the image
            $img->resize(500, null,function ($ratio){
            //resize the width to be fit with height
                $ratio->aspectRatio();
            });
          //  $img->save('imagestd/'.$semid.'/'.$stdid.'.jpg');

            // and insert a watermark for example
            $img->insert('imagestd/watermark.png','bottom-right');
             $img->save('imagestd/'.$semid.'/'.$stdid.'.jpg',50);//decreese the size to half
        }
        else
        $img->save( 'imagestd/'.$semid.'/'.$stdid.'.jpg');

        // Image::make($request->file('imagefile'))->resize(300, 200)->save('foo.jpg');

    }
    public static function SetValueToStudent($query,$request){
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

        return $query;
    }

    public function index(Request $request, Tblstudent $tblstudents)
    {

        $tblstudents2 = Tblstudent::ApplyFliter($request);
        $countarr = array('acountarr' => $tblstudents2->count());
        //$str='student?k=0'.$request->getQueryString();
        //getrequest is hidden field to indicate submit button pressed

        if ($request->getrequest != null)
            $str = 'student?k=0&_token=' . $request->_token . '&buildidlist=' . $request->buildidlist . '&collegelist=' . $request->collegelist . '&extension=' . $request->extension . '&fname=' . $request->fname . '&mobile=' . $request->mobile . '&nationalityidlist=' . $request->nationalityidlist . '&roomTypelist=' . $request->roomTypelist . '&roomno=' . $request->roomno . '&stdid=' . $request->stdid . '&getrequest=' . $request->getrequest;
        else
            $str = 'student';

        $tblstudents = Tblstudent::ApplyFliter($request)->paginate(50);
        $tblstudents->withPath($str);

        $tblbuilds = Tblbuild::all();
        $tblcolleges = Tblcollege::all();
        $tblnationalitys = Tblnationality::all();
        $tblroomtypes = Tblroomtype::all();
        $tblsems = Tblsem::all();
        session()->flashInput($request->input());//to keep old value
      // dd($tblstudents);
        return view('Student.viewstudents', compact('tblstudents', 'tblbuilds', 'tblcolleges', 'tblnationalitys', 'tblroomtypes', 'tblsems', 'countarr'));

    }



    public function viewstdjson()
    {
     return view('Student.viewstds',StudentController::LoadDataList());
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

    public function viewstdadmin(){
        return view('Student.viewstdadmin',StudentController::LoadDataList());
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

   //first request to open create page
    public function CreateStudent(Request $request)
    {
        try{

           // session()->flashInput($request->input());//to keep old value


            return view('student.createstudent',  StudentController::LoadDataList());




          }catch(\Exception $ex){
            dd($ex) ;

          //  return view('student.createstudent');
        }
    }

    public function createstudentjson(Request $request)
    {
//      // try{
        $query = new Tblstudent();

//            $query->stdid=$request->stdid ;
//            $query->fname=$request->fname  ;
//            $query->buildid=$request->buildidlist;
//            $query->roomtypeid=$request->roomtypelist;
//            $query->collegeid=$request->collegelist;
//            $query->roomno=$request->roomno;
//            $query->mobile=$request->mobile ;
//            $query->nationalityid=$request->nationalityidlist;
//            $query->semid=$request->semlist;
//            $query->extension= $request->extension;
//            $query->donor= $request->donor;
//            $query->country= $request->country;

            $this->validate($request, StudentController::ArrVlidator);
            $query=StudentController::SetValueToStudent($query,$request);

            if( $request->file('imagefile')) {

            StudentController::SaveImage($request->file('imagefile'),$request->stdid,$request->semlist) ;

            }

          $query->save();

        //Tblstudent::create($query);

        return response()->json( array('d'=>'Created Successfully') , 200);
//        }catch(\Exception $ex){
//            dd($ex);
//            //return response()->json( array('d'=>'Error while Executing Process') , 404);
//            return response()->json( array('d'=>$ex) , 404);
//        }
    }

    public function EditStudent($id){
       $stdobj= Tblstudent::find($id);

       $std=array('std'=>$stdobj);

       $listarr= StudentController::LoadDataList();
        $listarr["std"]=$std;//add new element to array with key std and keep all previous key the same
        //  @foreach($tblbuilds as $building)



        //$dist=compact('listarr','std');//create array with two keys every key point to array
        // , std['std']->stdid
        // foreach $listarr['tblbuilds'] as $building)


         // $k=array('std' => $std, 'arrlist' => $listarr);//the same compact

        return view('Student.EditStudent',$listarr);
    }
    public function EditStudentJson(Request $request)
    {
        $this->validate($request,StudentController::ArrVlidator);
        $query= Tblstudent::find($request->id);



//        $query->stdid=$request->stdid ;
//        $query->fname=$request->fname  ;
//        $query->buildid=$request->buildidlist;
//        $query->roomtypeid=$request->roomtypelist;
//        $query->collegeid=$request->collegelist;
//        $query->roomno=$request->roomno;
//        $query->mobile=$request->mobile ;
//        $query->nationalityid=$request->nationalityidlist;
//        $query->semid=$request->semlist;
//        $query->extension= $request->extension;
//        $query->donor= $request->donor;
//        $query->country= $request->country;

        $query=StudentController::SetValueToStudent($query,$request);
        $query->save();

        if( $request->file('imagefile')) {

            StudentController::SaveImage($request->file('imagefile'),$request->stdid,$request->semlist) ;

        }
        return response()->json( array('d'=>'Created Successfully') , 200);

    }



    public function DelStudentJson(Request $request)
    {
        Tblstudent::destroy($request->id);
        return response()->json( array('d'=>'Deleted Successfully') , 200);
    }



//    public static function custompaginate($items, $perPage = 15, $page = null, $options = ['student'], $requeststring)
//    {
//        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
//        $items = $items instanceof Collection ? $items : Collection::make($items);
//        return (new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options))->withPath($requeststring);
//    }


}



/*

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



 public static function ApplyFliter2(Request $request)
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

 */