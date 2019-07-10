@extends('layouts.system')

@section('system')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="background: #2C2C28 ;">
                <div class="card-header" style="color:darkcyan;">
                    <h2> Dashboard | Recent Activities </h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <h4 style="color:darkcyan;"> {{ session('status') }} </h4>
                    </div>
                    @endif
                    <h3>
                        {{Auth::user()->name}} | <b style="color: red;">
                            @if(Auth::user()->id == 3) Admin  @else User @endif</b> <br>

                    </h3> <br>
                    <a href="/posts/create" class="btn btn-success"> Create Post </a>
                        <a href="/dashEnrolls" class="btn btn-outline-info"> Enrolled Courses </a>
                    <br> <br>
                    @if (count($posts) > 0)
                    <table class="table table-striped" style="color: white;">
                        <tr>
                            <th> Title </th>
                            <th></th>

                        </tr>

                        @foreach($posts as $post)
                        <tr>
                            <td > <a href="/posts/{{$post->id}}"> {{$post->title}} </a> </td>
                            <td style="text-align: right;">
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary fa-pull-left"> Edit </a>
                                {{Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST', 'class' => 'btn fa-pull-right']) }}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                {{Form::close() }}
                            </td>

                        </tr>
                        @endforeach

                    </table>
                    @else
                    <br> <br>
                    <p> You have no posts </p>
                    @endif

                </div>
            </div>
        </div>
    </div>


</div>

@endsection