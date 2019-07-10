@extends('layouts.system')

@section('system')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div style="background: #2C2C28 ;">
                    <div class="card-header" style="color:darkcyan;">
                        <h2> Dashboard | Profile </h2>
                    </div>


{{--                    @if(isset($profs))--}}

{{--                    @endif--}}

            @if(count($profiles)==0)
                            <div class="card-body">

                                <div class="col-md-10 col-md-offset-1">

                                    <img src="/images/default.jpg" style="width: 150px; height: 160px; float: left; border-radius: 50%; margin-right: 25px;" alt="No image founded">

                                    <h2>
                                        {{Auth::user()->name}} | <b style="color: red;">
                                            @if(Auth::user()->id == 3) Admin  @else User  @endif </b> <br>
                                        {{Auth::user()->email}}
                                    </h2>
                                    <h5> Shahjalal university of Science and Technology </h5> <br>
                                    <a href="/profile/create" class="btn btn-danger btn-sm ">Add More Info</a>
{{--                                    <a href="/profile/{{$prof->registration_no}}/edit" class="btn btn-primary btn-sm ">Update</a>--}}

                                </div>


                            </div>

                    @elseif(count($profiles)>0)
                        @foreach($profiles as $prof)
                    <div class="card-body">

                        <div class="col-md-10 col-md-offset-1">

                            <img src="/storage/photos/{{$prof->photo}}" style="width: 150px; height: 160px; float: left; border-radius: 50%; margin-right: 25px;" alt="No image founded">

                            <h2>
                                {{Auth::user()->name}} | <b style="color: red;">
                                    @if(Auth::user()->id == 3) Admin  @else User  @endif </b> <br>
                                {{Auth::user()->email}}
                            </h2>
                            <h5> Shahjalal university of Science and Technology </h5> <br>
                            <a href="/profile/create" class="btn btn-danger btn-sm " style="pointer-events: none;" disabled >Add More Info</a>
                            <a href="/profile/{{$prof->registration_no}}/edit" class="btn btn-primary btn-sm ">Update</a>

                        </div>


                    </div>
            </div>
        </div>
    </div>


        <div class="row justify-content-center">
            <div class="col-md-10">
                <div style="background: #2C2C28 ;">
                    <div class="card-header" style="color:darkcyan;">
                        <h2> Profile | Personal Information </h2>
                    </div>




                    <div class="card-body" style="color: white;">
                        <table class="table table-striped" style="color: white;">


                                <tr>
                                    <td> <h5> I'm a </h5> </td>
                                    <td> <h5> {{$prof -> designation}} </h5> </td>
                                </tr>
                                <tr>
                                    <td> <h5> Registration No </h5> </td>
                                    <td> <h5> {{$prof -> registration_no}} </h5> </td>
                                </tr>
                                <tr>
                                    <td> <h5> Session </h5> </td>
                                    <td> <h5> {{$prof -> batch_id}} </h5> </td>
                                </tr>
                                <tr>
                                    <td> <h5> Contact No </h5> </td>
                                    <td> <h5> {{$prof -> contact_number}} </h5> </td>
                                </tr>
                                <tr>
                                    <td> <h5> Date OF Birth </h5> </td>
                                    <td> <h5> {{$prof -> date_of_birth}} </h5> </td>
                                </tr>
                                <tr>
                                    <td> <h5> Department </h5> </td>
                                    <td> <h5> {{$prof -> department}} </h5> </td>
                                </tr>
                                <tr>
                                    <td> <h5> Blood Group </h5> </td>
                                    <td> <h5> {{$prof -> blood_group}} </h5> </td>
                                </tr>
                                <tr>
                                    <td> <h5> CGPA </h5> </td>
                                    <td> <h5> Not Available </h5> </td>
                                </tr>
                                <tr>
                                    <td> <h5> Developing Arena </h5> </td>
                                    <td> <h5>{!! $prof->myself !!} </h5> </td>
                                </tr>

                            @endforeach
                            @else
                                <tr>
                                    <h3> Nothing is founded !</h3>
                                </tr>
                    @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection