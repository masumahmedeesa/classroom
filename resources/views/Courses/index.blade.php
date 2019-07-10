@extends('layouts.system')

@section('system')



    <div class="row">
        <div class="col-lg-12">
            <br>
            <a href="/courses" class="btn btn-info fa-pull-left"> All Courses </a>
            <span style="padding-left: 20px;" class="tab-pane"></span>
            @if(Auth::user()->id == 3)
                <a href="/courses/create" class="btn btn-danger fa-pull-right"> Create Courses </a>
            @endif

            <br> <br>

            @if (count($courses) > 0)
                <table class="table table-striped" style="color: white;">
                    <tr>
                        <th> Session Year </th>
                        <th> Course Name </th>
                        <th> Course Code </th>
                        <th> Teacher Name </th>
                        <th> Credit </th>
                        <th> Class Time </th>
                        <th> </th>
                        <th> </th>
                        @if(Auth::user()->id == 3)
                            <th> </th>
                            <th> </th>
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
                            <td>

                                {{ Form::open(['action' => ['EnrollController@show',$course->cid], 'method' => 'GET','enctype'=>'multipart/form-data']) }}
                                {{Form::submit('TotalEnrolls',['class'=>'btn btn-secondary btn-sm'])}}
                                {{ Form::close() }}



                            <td>

                            {{ Form::open(['action' => ['CoursesController@enrollment',$course->cid], 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                            {{Form::submit('Enroll',['class'=>'btn btn-danger btn-sm'])}}
                            {{ Form::close() }}


                            </td>

                            @if(Auth::user()->id == 3)
                                <td>
                                    <a href="/courses/{{$course->cid}}/edit" class="btn btn-outline-primary btn-sm">Update</a>
                                </td>
                                <td>
                                {{Form::open(['action' => ['CoursesController@destroy',$course->cid], 'method' => 'POST']) }}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class' => 'btn btn-outline-success btn-sm'])}}
                                {{ Form::close() }}
                                    </td>

                            @endif
                        </tr>
                    @endforeach

                </table>
                {{ $courses->links() }}
            @else
                <br> <br>
                <p> No Courses Available </p>

            @endif

        </div>
    </div>


@endsection
