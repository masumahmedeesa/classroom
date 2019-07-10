@extends('layouts.system')

@section('system')

    <a href="{{route('liveSearch')}}" class="btn btn-secondary btn-sm"> Go Dynamic </a>
        <br>
        <h1 style="color: red;"> Search | Schedule | Simple</h1> <br>

{{--    This is that code, jeta diye ek e div er ekpashe kisu abong onno pase kisu rakha jai.--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6">--}}
{{--                <h1 style="color: red;"> Search | Schedule | Simple</h1> <br>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 text-right">--}}
{{--                <a href="{{route('liveSearch')}}" class="btn btn-outline-warning"> Go Dynamic </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


        <div class="row">
            <div class="col-lg-12">
                <form action="/schedules" method="GET">
                    <div class="input-group">
                        <input type="text" placeholder="Enter Session year" class="form-control" name="search" id="search">
                        <span class="input-group-prepend" style="padding-right: 4px;"></span>
                        <button type="submit" class="btn btn-outline-danger">Search</button>
                    </div>
                </form>
{{--                <br>--}}

{{--                {{Form::label('Session Year','Session Year')}}--}}
{{--                {{Form::text('sessionYear',$courses->sessionYear,['class' => 'form-control', 'placeholder' => '2016'])}}--}}


{{--                <span style="padding-left: 20px;" class="tab-pane"></span>--}}

                <br> <br>

                @if (count($courses) > 0)
                    <table class="table table-striped" style="color: white;">
                        <tr>
                            <th> Session Year </th>
                            <th> Course Name </th>
                            <th> Course Code </th>
                            <th> Teacher Name </th>
                            <th> Credit </th>
                            <th> Class Span</th>
                            @if(Auth::user()->id == 3)
                                <th></th>
                                <th></th>
                            @endif

                        </tr>

                        @foreach($courses as $course)
                            <tr>
                                <td> {{$course->sessionYear}} </td>
                                <td> {{$course->courseName}} </td>
                                <td> {{$course->courseCode}} </td>
                                <td> {{$course->teacherName}} </td>
                                <td> {{$course->credit}} </td>
                                <td> {!! $course->timeSpan !!} </td>
                                @if(Auth::user()->id == 3)
                                <td>
                                    <a href="/courses/{{$course->cid}}/edit" class="btn btn-outline-primary">Update</a> </td>
                                <td>
                                    {{Form::open(['action' => ['CoursesController@destroy',$course->cid], 'method' => 'POST']) }}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-outline-success'])}}
                                    {{ Form::close() }}
                                </td>

                                @endif
                            </tr>
                        @endforeach

                    </table>
                    {{ $courses->links() }}
                @else
                    <br> <br>
                    <p align="center" style="color: teal;"> No Search Data Available </p>

                @endif

            </div>
        </div>



@endsection

