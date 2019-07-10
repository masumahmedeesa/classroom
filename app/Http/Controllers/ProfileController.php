<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use DB;
use App\User;

class ProfileController extends Controller
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

//        $veri = Profile::all();
//        if(auth()->user()->id == $veri->user_id()) {
//            $code = $veri->registration_no;
//            $codeNo = $veri->contact_number;
//        }
        $vv = auth()->user()->id;
        $profiles = DB :: table('infos')
            ->where('user_id',$vv)
            ->get();

        //echo $profiles;
        //$profiles = Profile::orderBy('created_at','desc')->get();
        return view('profile.index')-> with('profiles',$profiles);
        //return view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
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
            'designation' => 'required',
            'registration_no' => 'required',
            'contact_number' => 'required',
            'batch_id' => 'required',
            'department' => 'required',
            'photo' => 'image|nullable|max:4999'
        ]);

        //handle the file
        if($request->hasFile('photo')){
            //Get the file with Extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName ();
            //Just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //Just Extension
            $fileExt = $request->file('photo')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            //Upload file
            $path = $request->file('photo')->storeAs('public/photos',$fileNameToStore);

        }else{
            $fileNameToStore = 'default.jpg';
        }
        $prof = new Profile;
        $prof->designation = $request->input('designation');
        $prof->registration_no = $request->input('registration_no');
        $prof->myself = $request->input('myself');
        $prof->contact_number = $request->input('contact_number');
        $prof->department = $request->input('department');
        $prof->batch_id = $request->input('batch_id');
        $prof->blood_group = $request->input('blood_group');
        $prof->date_of_birth = $request->input('date_of_birth');
        $prof->user_id = auth()->user()->id;
        $prof->photo = $fileNameToStore;

        $prof->save();

        return redirect('/profile')->with('success','Profile Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($registration_no)
    {
//        $vv = auth()->user()->id;
//        $pro = DB :: table('infos')
//            ->where('user_id','like','%'.$vv.'%')
//            ->get();

        //$authenticate = $pro->user_id;
        //echo $pro->user_id;
        //Check the accurate user
        $profiles = Profile::find($registration_no);
        //echo $profiles;
        if(auth()->user()->id !== $profiles->user_id){
            return redirect('/profile')-> with('error','Unauthorized Page');
        }

        return view('profile.edit')->with('profiles',$profiles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $registration_no)
    {
        $this->validate($request,[

            'photo' => 'image|nullable|max:4999'
        ]);
        //handle the file
        if($request->hasFile('photo')){
            //Get the file with Extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName ();
            //Just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //Just Extension
            $fileExt = $request->file('photo')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            //Upload file
            $path = $request->file('photo')->storeAs('public/photos',$fileNameToStore);

        }
        $profiles = Profile::find($registration_no);
        $profiles->myself = $request->input('myself');
        $profiles->contact_number = $request->input('contact_number');
        $profiles->batch_id = $request->input('batch_id');
        $profiles->blood_group = $request->input('blood_group');
        $profiles->date_of_birth = $request->input('date_of_birth');
        //$profiles->user_id = auth()->user()->id;

        if($request->hasFile('photo')){
            $profiles->photo = $fileNameToStore;
        }
        $profiles->save();

        return redirect('/profile')->with('success','Profile Updated!');

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
