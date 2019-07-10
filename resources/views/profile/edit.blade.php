
@extends('layouts.system')

@section('system')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div style="background: #2C2C28 ;">
                    {{--                    <a href="/profile" class="btn btn-outline-secondary btn-sm" style="text-align: left;"> Back </a>--}}
                    <div class="card-header" style="color:darkcyan;">
                        <h2> Update | Profile </h2>
                    </div>
                    <div class="card-body">

                        {{ Form::open(['action' => ['ProfileController@update',$profiles->registration_no], 'method' => 'POST','enctype'=>'multipart/form-data']) }}

                        <div class="form-group">
                            <h5 style="color: #6cbb23;"> {{Form::label('contact_number','Contact No')}} </h5>
                            {{Form::text('contact_number',$profiles->contact_number,['class' => 'form-control', 'placeholder' => 'Contact No'])}}
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <h5 style="color: #6cbb23;"> {{Form::label('department','Department')}}</h5>--}}
{{--                            {{Form::text('department','',['class' => 'form-control', 'placeholder' => 'DEPARTMENT'])}}--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <h5 style="color: #6cbb23;"> {{Form::label('batch_id','Session')}} </h5>
                            {{Form::text('batch_id',$profiles->batch_id,['class' => 'form-control', 'placeholder' => 'Session'])}}
                        </div>
                        <div class="form-group">
                            <h5 style="color: #6cbb23;">{{Form::label('blood_group','Blood Group')}} </h5>
                            {{Form::text('blood_group',$profiles->blood_group,['class' => 'form-control', 'placeholder' => 'Blood Group'])}}
                        </div>
                        <div class="form-group">
                            <h5 style="color: #6cbb23;"> {{Form::label('date_of_birth','Date of Birth')}}</h5>
                            {{Form::text('date_of_birth',$profiles->date_of_birth,['class' => 'form-control', 'placeholder' => 'Date of Birth'])}}
                        </div>
                        <div class="form-group">
                            <h5 style="color: #6cbb23;"> {{Form::label('myself','Developing Arena | Tell Something')}} </h5>
                            {{Form::textarea('myself',$profiles->myself,['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Developing Arena | Tell Something'])}}
                        </div>
                        <div>
                            {{Form::file('photo')}}
                        </div>
                        <br>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Submit',['class' => 'btn btn-success'])}}

                        {{ Form::close() }}


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        //alert("hi");
        // showclassinfo();
        // $(function(){
        //     $('#date_of_birth').datepicker({
        //         inline: true,
        //         showOtherMonths: true,
        //         dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        //     });
        // });
        $("#date_of_birth").datepicker({
            changeYear:true,
            changeMonth:true,
            inline:true,

            darkBackground:true,
            dateFormat: 'yy-mm-dd'
        });
    </script>
@endsection