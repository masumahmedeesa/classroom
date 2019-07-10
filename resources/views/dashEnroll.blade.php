@extends('layouts.system')

@section('system')
    <div class="container">

<div class="row justify-content-center">
    <div class="col-md-12">
        <div style="background: #2C2C28 ;">
            <div class="card-header" style="color:darkcyan;">
                <h2> Dashboard | Enrolled Courses | Mine </h2>
            </div>

            <div class="card-body">

                <br>
                @if (count($enrolled) > 0)
                    <table class="table table-striped" style="color: white;">
                        <tr>
                            <th> Session Year </th>
                            <th> Course Name </th>
                            <th> Course Code </th>
                            <th> Teacher Name </th>
                            <th> Credit </th>
                            <th> Time Span</th>

                        </tr>

                        @foreach($enrolled as $enrolls)
                            <tr>
                            <td> {{$enrolls->sessionYear}} </td>
                            <td> {{$enrolls->courseName}} </td>
                            <td> {{$enrolls->courseCode}} </td>
                            <td> {{$enrolls->teacherName}} </td>
                            <td> {{$enrolls->credit}} </td>
                            <td> {!! $enrolls->timeSpan !!} </td>
                            </tr>
                        @endforeach

                    </table>
                    {{ $enrolled->links() }}
                @else
                    <br> <br>
                    <p> You have no Enrolled Courses !  </p>
                @endif

            </div>
        </div>
    </div>
</div>

</div>
@endsection