@extends('layouts.system')

@section('system')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div style="background: #2C2C28 ;">
                    <div class="card-header" style="color:darkcyan;">
                        <h2> Your Performance | Enrolled Courses </h2>
                    </div>

                    <div class="card-body">


                        @if (count($courses) > 0)
                            <table class="table table-striped" style="color: white;">
                                <tr>
                                    <th> Session Year </th>
                                    <th> Course Name </th>
                                    <th> Course Code </th>
                                    <th> Teacher Name </th>
                                    <th> Credit </th>
                                    <th> Exam Type</th>
                                    <th> Obtained Marks</th>

                                </tr>

                                @foreach($courses as $cour)
                                    <tr>
                                        <td> {{$cour->sessionYear}} </td>
                                        <td> {{$cour->courseName}} </td>
                                        <td> {{$cour->courseCode}} </td>
                                        <td> {{$cour->teacherName}} </td>
                                        <td> {{$cour->credit}} </td>
                                        <td> {{$cour->examType}} </td>
                                        <td>{{$cour->obtainedMarks}}</td>
                                    </tr>
                                @endforeach

                            </table>
                            <br>
                            <div class="card-header" style="color:darkcyan;">
                                <h2> Your Attendance | Enrolled Courses </h2>
                            </div> <br>

                            <table class="table table-striped" style="color: white;">
                                <tr>
                                    <th> Session Year </th>
                                    <th> Course Name </th>
                                    <th> Course Code </th>
                                    <th> Total Attendances </th>
                                </tr>
                                @foreach($attendances as $attends)
                                <tr>
                                    <td>
                                        {{$attends->sessionYear}}
                                    </td>
                                    <td>
                                        {{$attends->courseName}}
                                    </td>
                                    <td>
                                        {{$attends->courseCode}}
                                    </td>
                                    <td>
                                        {{$attends->count_row}}
                                    </td>
                                </tr>
                                @endforeach
                            </table>


                        @else
                            <br> <br>
                            <p> You have no Enrolled Courses as well as Data | Sorry !  </p>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection