<?php

namespace App\Http\Controllers;

use App\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\Courses;
use App\Profile;
use App\Performed;
use App\Enrollment;

class performDataController extends Controller
{

    public function index()
    {

        $currentUser = auth()->user()->id;
        //echo $currentUser;

        $regi = DB::table('infos')
            ->selectRaw('infos.registration_no')
            ->Where('infos.user_id',$currentUser)
            ->get();

        //echo $regi[0]->registration_no;

        $courses = DB::table('enrolls')
            ->join('performance','performance.courseId','enrolls.ciid')
            ->join('wholeCourses','wholeCourses.cid','performance.courseId')
            ->distinct()
            ->selectRaw('wholeCourses.courseCode,wholeCourses.sessionYear,wholeCourses.courseName,
            wholeCourses.teacherName,wholeCourses.credit,performance.examType,performance.obtainedMarks')
            ->Where('enrolls.user_id',$currentUser)
            ->Where('performance.registration_no',$regi[0]->registration_no)
            ->get();

        //echo $courses;

        $attendances = DB::table('attendance')
            ->join('wholeCourses','wholeCourses.cid','attendance.courseId')
            ->select(DB::raw("COUNT(*) as count_row"))
            ->selectRaw('courseCode,courseName,sessionYear')
            ->Where('registration_no',$regi[0]->registration_no)
//            ->orderBy('registration_no','ASC')
            ->groupBy(DB::raw("courseCode,courseName,sessionYear"))
            ->get();

        //echo $attendances;
        return view('enrollCourse.yourPerformance')->with('courses',$courses)->with('attendances',$attendances);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($cid)
    {

        $courses = DB :: table('wholeCourses')
            ->select('sessionYear','courseCode')
            ->Where('cid',$cid)
            ->get();

        $yr = $courses[0]->sessionYear;
        $code = $courses[0]->courseCode;
        $courseID =$cid;

        //echo $year, $code;

        $enrolled = DB ::table('enrolls')
            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
            ->join('infos','infos.user_id','enrolls.user_id')
            ->join('performance','performance.registration_no','enrolls.registration_no')

            ->distinct()
            ->selectRaw('enrolls.registration_no, wholeCourses.courseName, wholeCourses.courseCode, wholeCourses.sessionYear,
             wholeCourses.teacherName, wholeCourses.cid,infos.batch_id, performance.examType, performance.obtainedMarks')
//            ->select('wholeCourses.courseName','wholeCourses.courseCode','wholeCourses.sessionYear','wholeCourses.teacherName','enrolls.registration_no')
            ->Where('wholeCourses.sessionYear',$yr)
            ->Where('wholeCourses.courseCode',$code)
            ->Where('performance.courseId',$courseID)
            ->orderBy('enrolls.registration_no','ASC')
            ->get();

        $hey= "yes";
        $attendances = DB::table('attendance')
            ->select(DB::raw("COUNT(*) as count_row"))
            ->selectRaw('registration_no')
            ->Where('courseId',$courseID)
            ->Where('status',$hey)
            ->orderBy('registration_no','ASC')
            ->groupBy(DB::raw("registration_no"))
            ->get();

        return view('enrollCourse.performDatabase')->with('enrolled',$enrolled)->with('attendances',$attendances);
    }

    public function attend(Request $request, $cid)
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

            $data2 = array(
                'registration_no' => $enrolls->registration_no,
                'courseId' => $enrolls->cid,
                'status' => $request->enumData[$ff][$enrolls->registration_no],
                'created_at' =>Carbon::now()
            );
            Attendance::insert($data2);
            $ff++;
            //}


            //}
        }

        return redirect('/courses')->with("success","Successfully Done, Thank you");
    }

    public function edit($cid)
    {

        $courses = DB :: table('wholeCourses')
            ->select('sessionYear','courseCode')
            ->Where('cid',$cid)
            ->get();

        $yr = $courses[0]->sessionYear;
        $code = $courses[0]->courseCode;

        $enrolled = DB ::table('enrolls')
            ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
            ->join('infos','infos.user_id','enrolls.user_id')
            ->distinct()
            ->selectRaw('enrolls.registration_no, enrolls.user_id, wholeCourses.courseName, wholeCourses.courseCode, wholeCourses.sessionYear,
             wholeCourses.teacherName, wholeCourses.cid,infos.batch_id')
            ->Where('wholeCourses.sessionYear',$yr)
            ->Where('wholeCourses.courseCode',$code)
            ->orderBy('enrolls.registration_no','ASC')
            ->get();

        return view('enrollCourse.attendance')->with('enrolled',$enrolled);
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
