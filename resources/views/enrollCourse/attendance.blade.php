@extends('layouts.system')

@section('system')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header">
                    @if(count($enrolled)>0)

                        <h4 style="color: #00FFFF;"> {{$enrolled[0]->courseName}} </h4>
                        <h4 style="color: #00FFFF;"> {{$enrolled[0]->courseCode}} </h4>

                        <h4 style="color: #00FFFF;"> {{$enrolled[0]->sessionYear}} </h4>
                        <h4 style="color: #00FFFF;"> {{$enrolled[0]->teacherName}} </h4>
                        @if(Auth::user()->id == 3)
                            <a href="#" class="btn btn-danger btn-sm"> Create Performance </a>
                            <span style="padding-right: 10px;"> </span>
                            <a href="#" class="btn btn-secondary btn-sm"> Take Attendance </a>
                        @endif
                </div>
                <div class="card-body">

                    <table class="table table-striped" style="color: white;">

                        <tr>
                            <th>
                                Enrolled Student
                            </th>
                            <th> Regular | Dropper </th>
                            <th> Contact Number </th>
                            <th> Photo </th>
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
                                    {{$enrolls->contact_number}}
                                </td>
                                <td>
                                    <img src="/storage/photos/{{$enrolls->photo}}" style="width: 100px; height: 96px; float: left; border-radius: 50%; margin-right: 25px;" alt="No image founded">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <h3> No Enrolled Students Available ! </h3>
                    @endif
                </div>
            </div>
        </div>

    </div>



@endsection