@extends('layouts.system')

@section('system')
    @include('popup.academic')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header">
                    @if(count($enrolled)>0)

                        <h4 style="color: #00FFFF;"> {{$enrolled[0]->courseName}} | {{$enrolled[0]->courseCode}} </h4>
                        <h4 style="color: #00FFFF;"> {{$enrolled[0]->teacherName}} </h4>
                        <h4 style="color: #00FFFF;"> {{$enrolled[0]->sessionYear}} </h4>
                        <h4 style="color: red;"> Attendance | {{\Carbon\Carbon::now()}} | {{\Carbon\Carbon::now()->format('l')}}</h4>

                </div>
                <div class="card-body">

                    <table class="table table-striped" style="color: white;">
                        <thead>
                        <tr>
                            <th>
                                Enrolled Student
                            </th>
                            <th> Regular | Dropper </th>
                            <th> Status | Enumerated Data </th>

                        </tr>
                        </thead>
                        @foreach($enrolled as $enrolls)

                            {{--                            {{dd($enrolls)}}--}}
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

                                    {{Form::open(['action'=>['performDataController@attend',$enrolls->cid],'method'=>'POST','enctype'=>'multipart/form-data']) }}

                                    <input type="text" name="enumData[][{{$enrolls->registration_no}}]" list="ddlist" class="form-control-sm">
                                    <datalist id="ddlist">
                                        <option> yes </option>
                                        <option> no </option>
                                    </datalist>

{{--                                    <div class="holyMother">--}}
{{--                                        <input type="checkbox" onclick="hello()" name="checkB" id="attendBox">--}}
{{--                                    </div>--}}

                                </td>

                            </tr>

                            </tbody>

                        @endforeach

                    </table>

                    <button type="submit" class="btn btn-outline-success">Submit</button>
                    {{ Form::close() }}

                    @else

                        <h3> No Enrolled Students Available ! </h3>
                    @endif
                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')
    <script type="text/javascript">


        $(document).ready(function() {
            //set initial state.
            $('#valueView').val(this.checked);

            $('#attendBox').change(function() {
                if(this.checked) {
                    var returnVal = confirm("Are you sure?");
                    $(this).prop("checked", returnVal);
                }
                $('#valueView').val(this.checked);
            });
        });

    </script>


    @endsection