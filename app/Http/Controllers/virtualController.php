<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class virtualController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','loggin','front2']]);
    }

    public function index()
    {
    	//$title="index Page";
    	//return view('classroom.first',compact('title'));
		//return view('classroom.first')->with('title',$title);
		
		return view('classroom.index');
    }

    public function classhome()
    {
    	$data=array(
    		'titles' => 'Cardinal Number',
    		'services' => ['first','second','third','forth']
    	);
    	return view('classroom.classhome')->with($data);
	}
	

	public function front2()
	{
		return view('classroom.front2');
	}

    public function manageCourse()
    {
        return view('classroom.manageCourse');
    }
}
