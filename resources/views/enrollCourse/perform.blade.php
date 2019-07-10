@extends('layouts.system')

@section('system')
@include('popup.academic')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header">
                    @if(count($enrolled)>0)

                        <h4 style="color: #00FFFF;"> {{$enrolled[0]->courseName}} </h4>
                        <h4 style="color: #00FFFF;"> {{$enrolled[0]->courseCode}} </h4>

                        <h4 style="color: #00FFFF;"> {{$enrolled[0]->sessionYear}} </h4>
                        <h4 style="color: #00FFFF;"> {{$enrolled[0]->teacherName}} </h4>

                </div>
                <div class="card-body">

                    <table class="table table-striped" style="color: white;">

                        <tr>
                            <th>
                                Enrolled Student
                            </th>
                            <th> Regular | Dropper </th>
                            <th> Exam type </th>

                            <th> Obtained Marks </th>
                        </tr>
                        @foreach($enrolled as $enrolls)
                            <tr>
                                <td> {{$enrolls->registration_no}} </td>
                                <td>
                                    @if($enrolls->sessionYear == $enrolls->batch_id)
                                        Regular
                                    @else
                                        Dropper
                                    @endif
                                </td>
                                <td>
                                    {{Form::open(['action'=>['EnrollController@performed',$enrolls->cid],'method'=>'POST','enctype'=>'multipart/form-data']) }}

                                    {{Form::text('examType[]','',['class'=>'form-control-sm fa-full-left','placeholder'=>' TT | LAB | Quiz'])}}
                                    <button type="button" class="btn btn-outline-danger btn-sm" id="popId" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>
                                    <span> </span>


                                </td>
                                <td>

                                    {{Form::number('obtainedMarks[]','',['class'=>'form-control-sm','placeholder'=>'Obtained Marks'])}}

                                </td>
                            </tr>
                        @endforeach

                    </table>


                    {{Form::submit('Submit',['class' => 'btn btn-outline-success'])}}

                    {{ Form::close() }}
                    @else
                        <h3> No Enrolled Students Available ! </h3>
                    @endif
                </div>
            </div>
        </div>

    </div>



@endsection