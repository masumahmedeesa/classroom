 
@extends('layouts.system')

@section('system')

<h2> Edit Post </h2> <br>

{{ Form::open(['action' => ['PostsController@update',$post->id], 'method' => 'POST','enctype'=>'multipart/form-data']) }}
	<div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$post->title,['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Main Field')}}
        {{Form::textarea('body',$post->body,['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Main Field'])}}
    </div>
    <div>
        {{Form::file('cover_image')}}
    </div>
    <br>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class' => 'btn btn-success'])}}

{{ Form::close() }}
     
<br> <br>
@endsection
