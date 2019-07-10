@extends('layouts.system')

@section('system')

<h2 style="color:aquamarine;"> POSTS </h2> <br>

@if(count($posts) > 0)

@foreach($posts as $pp)
<div class="well" >
    <div class="row">
        <div class="col-md-8 col-sm-8" style="height: 30%;">
            <h3> <a href="/posts/{{$pp->id}}"> {{$pp->title}} </a> </h3>
            <h6> Written on {{$pp->created_at}} by {{$pp->user->name}} </h6>
            <br>
            <div style="font-size: 14px;">
                 {!! $pp->body !!}
            </div>


        </div>
        <div class="col-md-4 col-sm-4">
            <img style="height: 80%; width: 60%;" src="/storage/cover_images/{{$pp->cover_image}}" alt="Nope"
        </div>

    </div>
    <!-- <h3> <a href="/posts/{{$pp->id}}"> {{$pp->title}} </a> </h3>
                <small> Written on {{$pp->created_at}} by {{$pp->user->name}} </small> -->

</div>
<br>
@endforeach
{{$posts->links()}}

@else
<p> No post FOUND ! </p>

@endif


@endsection