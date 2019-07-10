<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Enrollment;
use App\Performed;
use App\Profile;

use Illuminate\Http\Request;
use DB;

class EnrollController extends Controller
{
    private $dataBoss;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $currentUser = auth()->user()->id;
//        echo $currentUser;
//        //$profiles = Profile::find($currentUser);
//        $prof = DB::table('infos')
//            ->Where('user_id',$currentUser)
//            ->get();
//
//        //$prof = Profile::all();
//
//        foreach ($prof as $profiles){
//            $important = $profiles->registration_no;
//        }
//        //echo $important;
////        $enrolled = DB::table('enrolls')
////            ->Where('registration_no',$important)
////            ->get();
//
//        $enrolled = DB ::table('enrolls')
//            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
//            ->select('courseName','courseCode','sessionYear','registration_no')
//            ->paginate(25);
//
////        foreach ($enrolled as $enroll){
////
////        }
//        echo $enrolled;
//
//        return view('enrollCourse.index')->with('enrolled',$enrolled);

        $cid = $this->dataBoss;
        echo $cid;
        echo "eesha\n";
        return view('enrollCourse.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function performed(Request $request,$cid)
    {
        $this->validate($request,[
            'examType' => 'required',
            'obtainedMarks' =>'required'
        ]);




        echo $cid;
        $courses = DB :: table('wholeCourses')
            ->select('sessionYear','courseCode')
            ->Where('cid',$cid)
            ->get();

        foreach ($courses as $cour){
            $year = $cour->sessionYear;
            $code = $cour->courseCode;
        }

//        $enrolled = DB ::table('enrolls')
//            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
//            ->distinct()->select('wholeCourses.courseName','wholeCourses.courseCode','wholeCourses.sessionYear','wholeCourses.teacherName','enrolls.registration_no')
//            ->Where('sessionYear',$year)
//            ->Where('courseCode',$code)
//            ->get();

        $enrolled = DB ::table('enrolls')
            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
            ->distinct()
            ->selectRaw('enrolls.registration_no, wholeCourses.cid')
            ->Where('wholeCourses.sessionYear',$year)
            ->Where('wholeCourses.courseCode',$code)
            ->get();



//            $data = $request->all();
//            $types = $data['examType'];
//            $marks = $data['obtainedMarks'];

        //foreach ()
        //echo $enrolled;
        foreach ($enrolled as $enrolls){


            $perform = new Performed();
            $perform->registration_no = $enrolls->registration_no;
            $perform->courseId = $enrolls->cid;
            //$perform->examType=isset($enrolls[$])
            $perform->examType = $request -> input('examType');
            $perform->obtainedMarks = $request -> input('obtainedMarks');
            $perform->save();

            //$perform->save();
        }



        return redirect()->route('courses.index')->with('success','Performance Created');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cid)
    {

        $this->dataBoss = $cid;

        $courses = DB :: table('wholeCourses')
            ->select('sessionYear','courseCode')
            ->Where('cid',$cid)
            ->get();

        foreach ($courses as $cour){
            $year = $cour->sessionYear;
            $code = $cour->courseCode;
        }

//        $enrolled = DB ::table('enrolls')
//            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
//            ->distinct()->select('wholeCourses.courseName','wholeCourses.courseCode','wholeCourses.sessionYear','wholeCourses.teacherName','enrolls.registration_no')
//            ->Where('sessionYear',$year)
//            ->Where('courseCode',$code)
//            ->get();

        $enrolled = DB ::table('enrolls')
            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
            ->join('infos','infos.user_id','enrolls.user_id')
            ->distinct()
            ->selectRaw('enrolls.registration_no, wholeCourses.courseName, wholeCourses.courseCode, wholeCourses.sessionYear,
             wholeCourses.teacherName, wholeCourses.cid,infos.batch_id,infos.contact_number,infos.photo,infos.designation')
//            ->select('wholeCourses.courseName','wholeCourses.courseCode','wholeCourses.sessionYear','wholeCourses.teacherName','enrolls.registration_no')
            ->Where('wholeCourses.sessionYear',$year)
            ->Where('wholeCourses.courseCode',$code)
            ->get();

        //echo $enrolled;

//        ->select('wholeCourses.courseName','wholeCourses.courseCode','wholeCourses.sessionYear','wholeCourses.teacherName','enrolls.registration_no')
        //echo $enrolle;
        return view('enrollCourse.index')->with('enrolled',$enrolled);

//        $enroll = new Enrollment;
//
//        $course = Courses::find($cid);
//
//        $currentUser = auth()->user()->id;
//        $prof = DB::table('infos')
//            ->Where('user_id',$currentUser)
//            ->get();
//
//        //$prof = Profile::all();
//
//        echo $enroll;
//        $enroll->sessionYear = $course->sessionYear;
//        $enroll->courseCode = $course->courseCode;
//        $enroll->registration_no = $prof->registration_no;
//
//        $enroll->save();
//
//        return redirect('/courses')->with('success','Enrolled!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cid)
    {
        $enrolled = $this->dataBoss;

        //$courses = Courses::find($cid);
        $courses = DB::table('wholeCourses')
                    ->select('teacherName')
                    ->Where('cid',$cid)
                    ->get();

        foreach ($courses as $cours){
            $teach = $cours->teacherName;
        }

        $current = auth()->user()->id;
        $desig = DB::table('infos')
            ->select('designation')
            ->Where('user_id',$current)
            ->get();
        foreach ($desig as $degi){
            $designate = $degi->designation;
        }



        $courses = DB :: table('wholeCourses')
            ->select('sessionYear','courseCode')
            ->Where('cid',$cid)
            ->get();

        foreach ($courses as $cour){
            $year = $cour->sessionYear;
            $code = $cour->courseCode;
        }

//        $enrolled = DB ::table('enrolls')
//            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
//            ->distinct()->select('wholeCourses.courseName','wholeCourses.courseCode','wholeCourses.sessionYear','wholeCourses.teacherName','enrolls.registration_no')
//            ->Where('sessionYear',$year)
//            ->Where('courseCode',$code)
//            ->get();

        $enrolled = DB ::table('enrolls')
            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
            ->join('infos','infos.user_id','enrolls.user_id')
            ->distinct()
            ->selectRaw('enrolls.registration_no, wholeCourses.courseName, wholeCourses.courseCode, wholeCourses.sessionYear,
             wholeCourses.teacherName, wholeCourses.cid,infos.batch_id,infos.contact_number,infos.photo,infos.designation')
//            ->select('wholeCourses.courseName','wholeCourses.courseCode','wholeCourses.sessionYear','wholeCourses.teacherName','enrolls.registration_no')
            ->Where('wholeCourses.sessionYear',$year)
            ->Where('wholeCourses.courseCode',$code)
            ->get();

        //echo $enrolled;

        if(auth()->user()->id == 3 OR ($teach == auth()->user()->name AND $designate == "Teacher"))
            return view('enrollCourse.perform')->with('enrolled',$enrolled);
        else
            return redirect('/enrollCourse')-> with('error','Unauthorized Page');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //public function atte
    public function update(Request $request, $cid)
    {
        $this->validate($request,[
            'examType' => 'required',
            'obtainedMarks' =>'required'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
