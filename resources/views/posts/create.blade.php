
@extends('layouts.system')

@section('system')

<h2> Create Post </h2> <br>

{{ Form::open(['action' => 'PostsController@store', 'method' => 'POST','enctype'=>'multipart/form-data']) }}
	<div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Main Field')}}
        {{Form::textarea('body','',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Main Field'])}}
    </div>
    <div>
        {{Form::file('cover_image')}}
    </div>
    <br>
    {{Form::submit('Submit',['class' => 'btn btn-success'])}}
    
{{ Form::close() }}
     
<br> <br>
@endsection
