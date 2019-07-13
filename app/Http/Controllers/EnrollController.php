<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Enrollment;
use App\Performed;
use App\Profile;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class EnrollController extends Controller
{
    public function index()
    {

        //echo $cid;
        //echo "eesha\n";
        return view('enrollCourse.create');
    }

    public function create()
    {
        //
    }

    public function performed(Request $request,$cid)
    {
        $courses = DB :: table('wholeCourses')
            ->select('sessionYear','courseCode')
            ->Where('cid',$cid)
            ->get();

//        foreach ($courses as $cour){
//            $year = $cour->sessionYear;
//            $code = $cour->courseCode;
//        }
        $yr = $courses[0]->sessionYear;
        $code = $courses[0]->courseCode;

        $enrolled = DB ::table('enrolls')
            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
            ->distinct()
            ->selectRaw('enrolls.registration_no, wholeCourses.cid, enrolls.user_id')
            ->Where('wholeCourses.sessionYear',$yr)
            ->Where('wholeCourses.courseCode',$code)
            ->orderBy('enrolls.registration_no','ASC')
            ->get();

        error_reporting(0);

        $ff=0;
        foreach ($enrolled as $enrolls ) {

//            dd($enrolls);
//            if (count($request->examType[0][$enrolls->registration_no]) > 0) {
//                dd($request->examType);
//                foreach ($request->examType[0][$enrolls->registration_no] as $ff => $v) {

                    $data2 = array(
                        'registration_no' => $enrolls->registration_no,
                        'courseId' => $enrolls->cid,
                        'examType' => $request->examType[$ff][$enrolls->registration_no],
                        'obtainedMarks' => $request->obtainedMarks[$ff][$enrolls->registration_no],
                        'created_at' =>Carbon::now()
                    );
                    Performed::insert($data2);
                    $ff++;
                //}


            //}
        }

            //$result = array();

//            $check = DB::table('performance')
//                ->insertGetId(array(
//                    'registration_no' => $enrolls->registration_no,
//                    'courseId' => $enrolls->cid,
//                    'examType' => $text[$enrolls->registration_no],
//                    'obtainedMarks' => $marks[$enrolls->registration_no],
//                    'created_at' => Carbon::now()
//                ));

// upor er ta boss silo ..


        return redirect('/courses')->with('success','Performance Created');
    }

    public function show($cid)
    {


        $courses = DB :: table('wholeCourses')
            ->select('sessionYear','courseCode')
            ->Where('cid',$cid)
            ->get();

//        foreach ($courses as $cour){
//            $yr = $cour->sessionYear;
//            $code = $cour->courseCode;
//        }

        $yr = $courses[0]->sessionYear;
        $code = $courses[0]->courseCode;

        $enrolled = DB ::table('enrolls')
            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
            ->join('infos','infos.user_id','enrolls.user_id')
            ->distinct()
            ->selectRaw('enrolls.registration_no, enrolls.user_id, wholeCourses.courseName, wholeCourses.courseCode, wholeCourses.sessionYear,
             wholeCourses.teacherName, wholeCourses.cid,infos.batch_id,infos.contact_number,infos.photo,infos.designation')
//            ->select('wholeCourses.courseName','wholeCourses.courseCode','wholeCourses.sessionYear','wholeCourses.teacherName','enrolls.registration_no')
            ->Where('wholeCourses.sessionYear',$yr)
            ->Where('wholeCourses.courseCode',$code)
            ->orderBy('enrolls.registration_no','ASC')
            ->get();


        return view('enrollCourse.index')->with('enrolled',$enrolled);

    }

    public function edit($cid)
    {

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

//        foreach ($courses as $cour){
//            $yr = $cour->sessionYear;
//            $code = $cour->courseCode;
//        }
        $yr = $courses[0]->sessionYear;
        $code = $courses[0]->courseCode;

        $enrolled = DB ::table('enrolls')
            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
            ->join('infos','infos.user_id','enrolls.user_id')
            ->distinct()
            ->selectRaw('enrolls.registration_no, enrolls.user_id, wholeCourses.courseName, wholeCourses.courseCode, wholeCourses.sessionYear,
             wholeCourses.teacherName, wholeCourses.cid,infos.batch_id')
//            ->select('wholeCourses.courseName','wholeCourses.courseCode','wholeCourses.sessionYear','wholeCourses.teacherName','enrolls.registration_no')
            ->Where('wholeCourses.sessionYear',$yr)
            ->Where('wholeCourses.courseCode',$code)
            ->orderBy('enrolls.registration_no','ASC')
            ->get();

        //echo $enrolled;

        if(auth()->user()->id == 3 OR ($teach == auth()->user()->name AND $designate == "Teacher"))
            return view('enrollCourse.perform')->with('enrolled',$enrolled);
        else
            return redirect('/courses')-> with('error','Unauthorized Page');
    }


    public function update(Request $request, $cid)
    {
//        $this->validate($request,[
//            'examType' => 'required',
//            'obtainedMarks' =>'required'
//        ]);
    }

    public function destroy($id)
    {
        //
    }
}
