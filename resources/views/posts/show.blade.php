@extends('layouts.system')

@section('system')

<a href="/posts" class="btn btn-success"> <b> Go Back </b> </a>
<br> <br>
<h1> {{$post->title}} </h1>


<br>
<div style="font-size:20px;">
    {!! $post->body !!}
</div>
<hr>
<img style="width:100%;" src="/storage/cover_images/{{$post->cover_image}}"/>
<br> <br>
<h5> Written On {{$post->created_at}} by {{$post->user->name}} </h5>
<hr>
<div>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id || Auth::user()->id == 3)
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary"> Edit </a>
    {{Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST', 'class' => 'btn fa-pull-right']) }}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}

    {{ Form::close() }}
        @endif
    @endif
</div>
@endsection