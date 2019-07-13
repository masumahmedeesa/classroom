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
                        <h1 style="color: red;"> Performance </h1>

                        <tr>
                            <td style="color: #00FFFF;">
                                Enrolled Student
                            </td>
                            <td style="color: #00FFFF;"> Regular | Dropper </td>
                            <td style="color: #00FFFF;"> Exam type </td>
                            <td style="color: #00FFFF;"> Estimated Marks </td>
                        </tr>

                        @foreach($enrolled as $enrolls)


                            <tbody>
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
                                    {{$enrolls->examType}}
                                </td>
                                <td>
                                    {{$enrolls->obtainedMarks}}
                                </td>
                            </tr>

                            </tbody>

                        @endforeach

                    </table>
                    <br><br>
                    <h1 style="color: red;"> Attendances </h1>
                    <table class="table table-striped">
                        <tr>
                            <td style="color: #00FFFF;">
                                Enrolled Student
                            </td>
                            <td style="color: #00FFFF;"> Total Attendance </td>
                        </tr>
                        @foreach($attendances as $attends)
                        <tr style="color: white;">
                            <td>
                                {{$attends->registration_no}}
                            </td>
                            <td>
                                {{$attends->count_row}}
                            </td>
                        </tr>

                        @endforeach
                    </table>


                    @else

                        <h3> No Data Available ! </h3>
                    @endif
                </div>
            </div>
        </div>

    </div>



@endsection