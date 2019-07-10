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
{{--                                if(count($course->--}}
                                {{ Form::open(['action' => ['EnrollController@show',$course->cid], 'method' => 'GET','enctype'=>'multipart/form-data']) }}
                                {{Form::submit('TotalEnrolls',['class'=>'btn btn-secondary btn-sm'])}}
                                {{ Form::close() }}
{{--                                <a href="{{route('enrollCourse.index')}}" class="btn btn-secondary btn-sm">TotalEnrolls </a> </td>--}}


                            <td>
{{--                                @foreach($enrolls as $enrolled)--}}
{{--                                    @if($enrolled->sessionYear !== $course->sessionYear AND $enrolled->courseCode !== $course->courseCode)--}}
                            {{ Form::open(['action' => ['CoursesController@enrollment',$course->cid], 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                            {{Form::submit('Enroll',['class'=>'btn btn-danger btn-sm'])}}
                            {{ Form::close() }}

{{--                                    <button class="btn btn-danger" name="Enroll" style="pointer-events: none" disabled> Enroll </button>--}}
{{--                                @endif--}}
{{--                                @endforeach--}}

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
{{--                                {{Form::open(['action' => ['CourseController@destroy',$course->courseCode], 'method' => 'POST', 'class' => 'btn fa-pull-right']) }}--}}
{{--                                {{Form::hidden('_method','DELETE')}}--}}
{{--                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}--}}

{{--                                {{ Form::close() }}--}}
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


    {{--<br>--}}

    {{--            <table class="table table-striped" style="color: white;">--}}
    {{--                <tr>--}}
    {{--                    <th> Session Year </th>--}}
    {{--                    <th>Course Name </th>--}}
    {{--                    <th> Course Code </th>--}}
    {{--                    <th> Teacher Name </th>--}}
    {{--                    <th> Credit </th>--}}
    {{--                    <th> Day</th>--}}
    {{--                    <th> Time Span</th>--}}

    {{--                </tr>--}}


    {{--                    <tr>--}}
    {{--                        <td>--}}

    {{--                        </td>--}}
    {{--                        <td>--}}
    {{--                            Database Management System--}}
    {{--                        </td>--}}
    {{--                        <td>--}}
    {{--                            CSE346--}}
    {{--                        </td>--}}
    {{--                        <td>--}}
    {{--                            Md Masum--}}
    {{--                        </td>--}}
    {{--                        <td>--}}
    {{--                            Saturday--}}
    {{--                        </td>--}}
    {{--                        <td>--}}
    {{--                            2AM - 3 AM--}}
    {{--                        </td>--}}
    {{--                    </tr>--}}


    {{--            </table>--}}
    {{--        </div>--}}
    {{--    </div>--}}


@endsection

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}

{{--<script type="text/javascript">--}}
{{--    function change( el )--}}
{{--    {--}}
{{--        if ( el.value === "Enroll" ){--}}
{{--            el.value = "Enrolled!";--}}
{{--            el.load();--}}
{{--            el.attr('disabled','true');--}}

{{--            //$('button').attr('disabled',false);--}}
{{--        }--}}

{{--        // else--}}
{{--        //     el.value = "Open Curtain";--}}
{{--    }--}}
{{--</script>--}}