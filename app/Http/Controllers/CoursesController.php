<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Courses;
use DB;
use Carbon\Carbon;
use App\Enrollment;

class CoursesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $currentUser = auth()->user()->id;
        //$enrolls = Enrollment::all();
        $enrolls = DB::table('enrolls')
            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
            ->select('wholeCourses.sessionYear','wholeCourses.courseCode')
            ->Where('user_id',$currentUser)
            ->get();

        //echo $enrolls;
        $courses = Courses::orderBy('created_at','desc')->paginate(8);
        return view('courses.index')->with('courses',$courses)->with('enrolls',$enrolls);
        //return view('Courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$currentUser = auth()->user()->id;
        //echo $currentUser;
        //$profiles = Profile::find($currentUser);
//        $prof = DB::table('infos')
//            ->Where('user_id',$currentUser)
//            ->get();

        //$prof = Profile::all();

//        foreach ($prof as $profiles){
//            echo $profiles->registration_no;
//        }

        //$enrolls = Enrollment::all();
        //echo $enrolls;


        return view('Courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'sessionYear' => 'required',
            //'courseName' => 'required',
            'courseCode' => 'required',
            'teacherName' => 'required',
            'credit' => 'required',
            'timeSpan' => 'required'
        ]);

        $course = new Courses;

        //$course = Courses::find($courseCode);
        $course->sessionYear = $request->input('sessionYear');
        $course->courseName = $request->input('courseName');
        $course->courseCode = $request->input('courseCode');
        $course->teacherName = $request->input('teacherName');
        $course->credit = $request->input('credit');
        $course->timeSpan = $request->input('timeSpan');



        $course->save();
        return redirect('/courses')->with('success','Course Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cid)
    {
        //$course = Courses::find($courseCode);

    }

    public function schedule(Request $request){

        $search = $request->get('search');

        $day = Carbon::now()->format( 'l' );
        //echo $day;
        if($search!=''){
            $courses = DB::table('wholeCourses')
                ->Where('timeSpan','like','%'.$day.'%')
                ->orWhere('sessionYear','like','%'.$search.'%')
                ->paginate(25);
        }
        else{
            $courses = DB::table('wholeCourses')
                -> Where('timeSpan','like','%'.$day.'%')
                -> orderBy('sessionYear','ASC')
                -> paginate(25);
        }


        //$courses = Courses::all();

        //$courses = DB::select('SELECT * FROM wholeCourses');

        return view('Courses.schedule2')->with('courses',$courses);

    }

    public function enrollment($cid)
    {
        $enroll = new Enrollment;

        //$course = Courses::find($cid);

        $currentUser = auth()->user()->id;

        $prof = DB::table('infos')
            ->Where('user_id',$currentUser)
            ->get();

        //$profiles = Profile::find($currentUser);
        //DB Jhamela korle ami find use krte pari.. that's better


        //$enroll->sessionYear = $course->sessionYear;
        //$enroll->courseCode = $course->courseCode;

        $enroll->ciid = $cid;
        $enroll->user_id = auth()->user()->id;

        foreach ($prof as $profiles){
            $enroll->registration_no = $profiles->registration_no;
        }


        $enroll->save();

        return redirect('/courses')->with('success','Enrolled!');
    }


    public function edit($cid)
    {
        $course = Courses::find($cid);
        //Check the accurate user

        if(auth()->user()->id !== 3){
            return redirect('/courses')-> with('error','Unauthorized Page');
        }
        return view('courses.edit')->with('course',$course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cid)
    {
        $this->validate($request,[

            'sessionYear' => 'required',
            //'courseName' => 'required',
            'courseCode' => 'required',
            'teacherName' => 'required',
            'credit' => 'required',
            'timeSpan' => 'required'
        ]);

        //$course = new Courses;

        $course = Courses::find($cid);
        $course->sessionYear = $request->input('sessionYear');
        $course->courseName = $request->input('courseName');
        $course->courseCode = $request->input('courseCode');
        $course->teacherName = $request->input('teacherName');
        $course->credit = $request->input('credit');
        $course->timeSpan = $request->input('timeSpan');

//        if(auth()->user()->id == 3) {
            $course->save();
            return redirect('/courses')->with('success','Course Updated!');
        //}



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cid)
    {
        $course = Courses::find($cid);

        $enid =DB::table('enrolls')
                    ->select('id')
                    ->Where('ciid',$cid)
                    ->get();

        $enrolls = Enrollment::find($enid[0]->id);

        if(auth()->user()->id !== 3){
            return redirect('/posts')-> with('error','Unauthorized Page');
        }

        if(auth()->user()->id == 3) {
            $course->delete();
            $enrolls->delete();
            return redirect('/courses')->with('success', 'Course Destroyed');
        }
    }
}
