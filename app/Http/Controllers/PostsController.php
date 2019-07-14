<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Post;
use DB;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }


    public function index()
    {
        //$posts = Post::orderBy('title','desc')->get();
        //$posts = DB::select('SELECT * FROM posts');

        //$posts = Post::orderBy('title','desc')->take(1)->get();
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')-> with('posts',$posts);
        //return view('posts.index');

    }

    public function create()
    {
        return view('posts.create'); 
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:4999'
        ]);
        //handle the file
        if($request->hasFile('cover_image')){
            //Get the file with Extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName ();
            //Just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //Just Extension
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            //Upload file
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $post = new Post;
        $post->title = $request->input('title');

        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;

        dd($fileNameToStore);

        $post->save();
        
        return redirect('/posts')->with('success','Post Created');

    }


    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }


    public function edit($id)
    {
        $post = Post::find($id);
        //echo $post;
        //Check the accurate user

        if(auth()->user()->id !== $post->user_id AND auth()->user()->id !== 3){
            return redirect('/posts')-> with('error','Unauthorized Page');


        }

        return view('posts.edit')->with('post',$post);

    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

                //handle the file
                if($request->hasFile('cover_image')){
                    //Get the file with Extension
                    $filenameWithExt = $request->file('cover_image')->getClientOriginalName ();
                    //Just filename
                    $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        
                    //Just Extension
                    $fileExt = $request->file('cover_image')->getClientOriginalExtension();
                    //Filename to Store
                    $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
                    //Upload file
                    $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        
                }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        
        return redirect('/posts')->with('success','Post Updated!');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id AND auth()->user()->id !== 3){
            return redirect('/posts')-> with('error','Unauthorized Page');
        }

        if($post->cover_image !== 'noimage.jpg'){
            //Delete the image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success','Post Destroyed');
    }
}
