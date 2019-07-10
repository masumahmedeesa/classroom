<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Enrollment;
use App\Profile;
use App\Courses;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard')->with('posts',$user->posts);
    }

    public function dashEnroll(){

        $currentUser = auth()->user()->id;
        //echo $currentUser;
        //$profiles = Profile::find($currentUser);
        $prof = DB::table('infos')
            ->Where('user_id',$currentUser)
            ->get();

        //$prof = Profile::all();

        foreach ($prof as $profiles){
            $important = $profiles->registration_no;
        }
        //echo $important;
//        $enrolled = DB::table('enrolls')
//            ->Where('registration_no',$important)
//            ->get();

        $enrolled = DB ::table('enrolls')
                ->join('wholeCourses','wholeCourses.cid','enrolls.ciid')
                ->select('wholeCourses.*')
                ->Where('registration_no',$important)
                ->orderBy('wholeCourses.sessionYear','ASC')
                ->paginate(25);
//        foreach ($enrolled as $enroll){
//
//        }
        //echo $enrolled;

        return view('dashEnroll')->with('enrolled',$enrolled);
    }
}
