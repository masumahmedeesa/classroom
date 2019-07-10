@extends('layouts.system')

@section('system')
    @include('popup.academic')

    {{--    <a href="#" class="btn btn-danger"> Manage Course </a>--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-12">--}}
{{--            <br>--}}
{{--            <a href="/courses" class="btn btn-info fa-pull-left"> All Courses </a>--}}
{{--            <span style="padding-left: 20px;" class="tab-pane"></span>--}}
{{--            @if(Auth::user()->id == 3)--}}
{{--                <a href="/courses/create" class="btn btn-danger fa-pull-right"> Create Courses </a>--}}
{{--            @endif--}}



            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div style="background: #2C2C28 ;">
                            <div class="card-header" style="color:darkcyan;">
                                <a href="/courses" class="btn btn-danger fa-pull-left"> All Courses </a>

                            </div>
                            <div class="card-body">

                                {{ Form::open(['action' => 'CoursesController@store', 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                                <div class="form-group">
                                    <h5 style="color: #6cbb23;"> {{Form::label('sessionYear','Academic Year | Session Year')}}</h5>
                                    {{Form::text('sessionYear','',['class' => 'form-control', 'placeholder' => 'Academic Year | Session Year'])}}

                                </div>


                                <div class="form-group">
                                    <h5 style="color: #6cbb23;"> {{Form::label('courseCode','Course Code')}} </h5>
                                    {{Form::text('courseCode','',['class' => 'form-control', 'placeholder' => 'Course Code'])}}
                                </div>
                                <div class="form-group">
                                    <h5 style="color: #6cbb23;"> {{Form::label('courseName','Course Name')}}</h5>
                                    {{Form::text('courseName','',['class' => 'form-control', 'placeholder' => 'Course Name'])}}
                                </div>
                                <div class="form-group">
                                    <h5 style="color: #6cbb23;"> {{Form::label('teacherName','Teacher Name')}}</h5>
                                    {{Form::text('teacherName','',['class' => 'form-control', 'placeholder' => 'Teacher Name'])}}
                                </div>
                                <div class="form-group">
                                    <h5 style="color: #6cbb23;"> {{Form::label('credit','Credit')}} </h5>
                                    {{Form::text('credit','',['class' => 'form-control', 'placeholder' => 'Credit'])}}
                                </div>
                                <div class="form-group">
                                    <h5 style="color: #6cbb23;"> {{Form::label('timeSpan','Schedule | Full Details ')}} </h5>
                                    {{Form::textarea('timeSpan','',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Schedule | Full Details'])}}
                                </div>

                                <br>
                                {{Form::submit('Submit',['class' => 'btn btn-outline-success'])}}

                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--        </div>--}}
{{--    </div>--}}















{{--            <form class="form-group" method="POST" action="{{route('courses.store')}}" enctype="multipart/form-data">--}}
{{--                {{ csrf_field() }}--}}
{{--                <table class="table table-striped" style="color: white;">--}}

{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            <div class="col-sm-14">--}}
{{--                                <label for="Academic Year"> Academic Year </label>--}}
{{--                                <div class="input-group">--}}

{{--                                    <input type="text" placeholder="Ex : 2016" class="form-control" name="sessionYear" id="sessionYear">--}}
{{--                                    <div class="input-group-addon">--}}
{{--                                        --}}{{----}}{{--                                <span class="fa fa-plus btn btn-outline-success" id="popId"></span>--}}
{{--                                        <span style="padding-right: 3px;" > </span>--}}
{{--                                        <button type="button" class="btn btn-outline-success" id="popId" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}

{{--                        <td style="color: white;">--}}
{{--                            <div class="col-sm-14">--}}
{{--                                <label for="Academic Year"> Course Name </label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" placeholder="Ex : Algorithm" class="form-control" name="courseName" id="courseName">--}}


{{--                                    <div class="input-group-addon" style="color: white;">--}}
{{--                                        <span style="padding-right: 3px;"> </span>--}}
{{--                                        <button type="button" class="btn btn-outline-success" id="popId" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}

{{--                        <td style="color: white;">--}}
{{--                            <div class="col-sm-14">--}}
{{--                                <label for="Academic Year"> Course Code </label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" placeholder="Ex : CSE250" class="form-control" name="courseCode" id="courseCode">--}}


{{--                                    <div class="input-group-addon" style="color: white;">--}}
{{--                                        <span style="padding-right: 3px;"> </span>--}}
{{--                                        <button type="button" class="btn btn-outline-success" id="popId" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}

{{--                        <td style="color: white;">--}}
{{--                            <div class="col-sm-14">--}}
{{--                                <label for="Academic Year"> Teacher Name </label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" placeholder="Ex : Md. Masum" class="form-control" name="teacherName" id="teacherName">--}}

{{--                                    <div class="input-group-addon" style="color: white;">--}}
{{--                                        <span style="padding-right: 3px;"> </span>--}}
{{--                                        <button type="button" class="btn btn-outline-success" id="popId" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td style="color: white;">--}}

{{--                            <div class="col-sm-14">--}}
{{--                                <label for="time">Credit</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" placeholder="Ex : 3.0" class="form-control" name="credit" id="credit">--}}


{{--                                    --}}{{--                                    <div class="input-group-addon">--}}
{{--                                    --}}{{--                                        <span style="padding-right: 3px;"> </span>--}}
{{--                                    --}}{{--                                        <button type="button" class="btn btn-outline-success" id="popId" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>--}}
{{--                                    --}}{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </td>--}}

{{--                    </tr>--}}

{{--                    <tr>--}}
{{--                    <div>--}}
{{--                        <label for="timeSpan">Schedule</label>--}}
{{--                        <input type="text" id="article-ckeditor" placeholder="Schedule" name="timeSpan">--}}
{{--                    </div>--}}
{{--                        <td style="color: white;">--}}

{{--                            <div class="col-sm-14">--}}
{{--                                <label for="timeSpan">Schedule</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" id="article-ckeditor" class="form-control" placeholder="Schedule" name="timeSpan">--}}
{{--                                    {{Form::label('timeSpan','Schedule')}}--}}
{{--                                    {{Form::textarea('timeSpan','',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Schedule'])}}--}}
{{--                                    {{ Form::close() }}--}}
{{--                                    <input type="text" placeholder="Ex : Saturday" class="form-control" name="day" id="day">--}}


{{--                                    <div class="input-group-addon">--}}
{{--                                        <span style="padding-right: 3px;"> </span>--}}
{{--                                        <button type="button" class="btn btn-outline-success" id="popId" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </td>--}}
{{--                        <td style="color: white;">--}}

{{--                            <div class="col-sm-14">--}}
{{--                                <label for="time">Time Span</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" placeholder="Ex : 2AM to 4AM" class="form-control" name="timeSpan" id="timeSpan">--}}


{{--                                    <div class="input-group-addon">--}}
{{--                                        <span style="padding-right: 3px;"> </span>--}}
{{--                                        <button type="button" class="btn btn-outline-success" id="popId" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </td>--}}


{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--                <div class="panel-footer">--}}
{{--                    <span style="padding-right: 11px;"> </span>--}}
{{--                    <button type="submit" class="btn btn-outline-primary"> Create </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}

    {{--<div class="row">--}}
    {{--    <form class="form-control"  method="POST" action="{{route('postIntoCourses')}}">--}}
    {{--        {{ csrf_field() }}--}}
    {{--        <input type="text" placeholder="Ex : 2AM to 4AM" class="form-control" name="sessionYear" id="sessionYear"> A--}}
    {{--        <br>--}}
    {{--        <input type="text" placeholder="Ex : 2AM to 4AM" class="form-control" name="courseName" id="courseName"> N--}}
    {{--        <br>--}}
    {{--        <input type="text" placeholder="Ex : 2AM to 4AM" class="form-control" name="courseCode" id="courseCode"> C--}}
    {{--        <br>--}}
    {{--        <input type="text" placeholder="Ex : 2AM to 4AM" class="form-control" name="teacherName" id="teacherName"> C--}}
    {{--        <br>--}}
    {{--        <input type="text" placeholder="Ex : 2AM to 4AM" class="form-control" name="credit" id="credit"> Credit--}}
    {{--        <br>--}}
    {{--        <input type="text" placeholder="Ex : 2AM to 4AM" class="form-control" name="day" id="day"> day--}}
    {{--        <br>--}}
    {{--        <input type="text" placeholder="Ex : 2AM to 4AM" class="form-control" name="timeSpan" id="timeSpan"> timeSpan--}}
    {{--        <br>--}}
    {{--        <input type="submit" class="btn btn-outline-success"> Sub--}}
    {{--    </form>--}}
    {{--</div>--}}


@endsection

@section('script')
    <script type="text/javascript">
        //alert("hi");
        // showclassinfo();
        $("#timeId").daypicker({
            changeYear:true,
            changeMonth:true,
            dateFormat: 'yy-mm-dd'
        });


        // $(document).ready(function() {
        //     $("#timeId").datepicker();
        //
        //
        // });

        $("#popId").on('click',function () {
            //alert("hu");
            $("#academic-year-show").modal();
        });
    </script>
@endsection