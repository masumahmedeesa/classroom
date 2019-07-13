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

{{--                        <a href="/enrollCourse/{{$enrolled[0]->cid}}/edit" class="btn btn-outline-warning btn-sm"> Update </a>--}}

                </div>
                <div class="card-body">

                    <table class="table table-striped" style="color: white;">
                        <thead>
                        <tr>
                            <th>
                                Enrolled Student
                            </th>
                            <th> Regular | Dropper </th>
                            <th> Exam type </th>
                            <th> Estimated Marks </th>
                            <th> </th>
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
{{--                                dd({{$enrolls->all()}});--}}
                                <td>
{{--                                    <form action="/performances/POST/{$enrolls->cid}" method="POST">--}}
{{--                                    <form action="{{route('/performances/POST/{$enrolls->cid}')}}" enctype="multipart/form-data" method="POST">--}}
                                    {{Form::open(['action'=>['EnrollController@performed',$enrolls->cid],'method'=>'POST','enctype'=>'multipart/form-data']) }}

{{--                                    <textarea rows="4" class="form-control-sm" id="result" >--}}
{{--                                    </textarea>--}}
                                    <input type="text" name="examType[][{{$enrolls->registration_no}}]" class="form-control-sm" placeholder="TT | Lab | Quiz">
{{--                                    {{Form::text('examType[]',$enrolls->registration_no,['class'=>'form-control-sm','id'=>'examType','placeholder'=>' TT | Lab | Quiz'])}}--}}


                                </td>
                                <td>
                                    <input type="text" name="obtainedMarks[][{{$enrolls->registration_no}}]" class="form-control-sm" placeholder="Obtained Marks">
{{--                                    {{Form::text('obtainedMarks[]','',['class'=>'form-control-sm','id'=>'obtainedMarks','placeholder'=>'Obtained Marks'])}}--}}

                                </td>
                                <td>
{{--                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal">+</button>--}}
                                    <a href="#" class="addRow btn btn-outline-danger btn-sm">+</a>
{{--                                    <a href="#" class="remove btn btn-outline-danger btn-sm">-</a>--}}

                                 </td>
                            </tr>

                            </tbody>

                        @endforeach

                    </table>

                    <button type="submit" class="btn btn-outline-success">Submit</button>
{{--                </form>--}}

{{--                    {{Form::submit('Submit',['class' => 'btn btn-outline-success'])}}--}}

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

        // $('tbody').delegate('.obtainedMarks', function () {
        //    var tr =  $(this).parent().parent();
        //
        // });

        function total() {
            var total = 0;
            $('.obtainedMarks').each(function (i, e) {
                var obtainedMarks = $(this).val() - 0;
                total += obtainedMarks;
            });
            $('.total').html(total);
        }



        $('.addRow').on('click',function () {
            addRow();
        });
        function addRow(){
            var tr = '<tr>' +
                    '<td> </td>'+
                    '<td> </td>'+
                    '<td> <input type="text" name="examType[]" class="form-control-sm" placeholder="TT | Lab | Quiz"> </td>' +
                    '<td> <input type="text" name="obtainedMarks[]" class="form-control-sm" placeholder="Obtained Marks"> </td>' +
                    '<td><a href="#" class="remove btn btn-outline-danger btn-sm">--</a> </td>'+
                    '</tr>';
            $('tbody').append(tr);
        }

        $('.remove').live('click',function () {
            $(this).parent().parent().remove();
        });



        $('#exampleModal').on('click', '#transferDataBest', function () {
            // var i;
            // for(i=1;i<=4;i++){
            //     var value  =$('#examType').val().trim();
            //     //i = $('#obtainedMarks1').val().trim();
            // }
            //var value2=0, value4=0, value6=0, value8=0;

            var value1 = $('#examType1').val().trim();
            var value2 = $('#obtainedMarks1').val();

            var value3 = $('#examType2').val().trim();
            var value4 = $('#obtainedMarks2').val();

            var value5 = $('#examType3').val().trim();
            var value6 = $('#obtainedMarks3').val().trim();

            var value7 = $('#examType4').val().trim();
            var value8 = $('#obtainedMarks4').val().trim();

            var best = Math.max(value2,value4,value6,value8);


            //var result = $count ;
            $('#result').val(value1+"  "+value2+'\n'+value3+"  "+value4+'\n'+value5+"  "+value6+"\n"+value7+"  "+value8);

            //var marks = $count;
            $('#obtainedMarks').val(best);

            //alert(value);
            //$('#exampleModal').modal('hide');

        });

        $('#exampleModal').on('click', '#transferDataAverage', function () {
            // var i;
            // for(i=1;i<=4;i++){
            //     var value  =$('#examType').val().trim();
            //     //i = $('#obtainedMarks1').val().trim();
            // }
            //var value2=0, value4=0, value6=0, value8=0;

            var value1 = $('#examType1').val().trim();
            var value2 = $('#obtainedMarks1').val();

            var value3 = $('#examType2').val().trim();
            var value4 = $('#obtainedMarks2').val();

            var value5 = $('#examType3').val().trim();
            var value6 = $('#obtainedMarks3').val().trim();

            var value7 = $('#examType4').val().trim();
            var value8 = $('#obtainedMarks4').val().trim();


            var average = (Number(value2)+Number(value4)+Number(value6)+Number(value8))/4;
            //var average = sum/4;


            $('#result').val(value1+"  "+value2+'\n'+value3+"  "+value4+'\n'+value5+"  "+value6+"\n"+value7+"  "+value8);


            $('#obtainedMarks').val(average);

            //alert(value);
            //$('#exampleModal').modal('hide');

        });

        $('#exampleModal').on('click', '#transferDataBest2', function () {
            // var i;
            // for(i=1;i<=4;i++){
            //     var value  =$('#examType').val().trim();
            //     //i = $('#obtainedMarks1').val().trim();
            // }
            //var value2=0, value4=0, value6=0, value8=0;

            var value1 = $('#examType1').val().trim();
            var value2 = $('#obtainedMarks1').val();

            var value3 = $('#examType2').val().trim();
            var value4 = $('#obtainedMarks2').val();

            var value5 = $('#examType3').val().trim();
            var value6 = $('#obtainedMarks3').val().trim();

            var value7 = $('#examType4').val().trim();
            var value8 = $('#obtainedMarks4').val().trim();


            // var bestF = Math.max(value2,value4,value6,value8);

            var arry = [value2,value4,value6,value8];
            arry.sort(function (a,b) {
                return b-a;
            });

            var sum=0;
            for(var i=0;i<2;i++){
                sum+=Number(arry[i]);
            }

            var best2= Number(sum)/2;

            $('#result').val(value1+"  "+value2+'\n'+value3+"  "+value4+'\n'+value5+"  "+value6+"\n"+value7+"  "+value8);


            $('#obtainedMarks').val(best2);

            //alert(value);
            //$('#exampleModal').modal('hide');

        });


        $('#exampleModal').on('click', '#transferDataBest3', function () {
            // var i;
            // for(i=1;i<=4;i++){
            //     var value  =$('#examType').val().trim();
            //     //i = $('#obtainedMarks1').val().trim();
            // }
            //var value2=0, value4=0, value6=0, value8=0;

            var value1 = $('#examType1').val().trim();
            var value2 = $('#obtainedMarks1').val();

            var value3 = $('#examType2').val().trim();
            var value4 = $('#obtainedMarks2').val();

            var value5 = $('#examType3').val().trim();
            var value6 = $('#obtainedMarks3').val().trim();

            var value7 = $('#examType4').val().trim();
            var value8 = $('#obtainedMarks4').val().trim();


            var arryy = [value2,value4,value6,value8];
            arryy.sort(function (a,b) {
                return b-a;
            });

            var sumTh=0;
            for(var i=0;i<3;i++){
                sumTh+=Number(arryy[i]);
            }

            var bestThree= Number(sumTh)/3;


            $('#result').val(value1+"  "+value2+'\n'+value3+"  "+value4+'\n'+value5+"  "+value6+"\n"+value7+"  "+value8);


            $('#obtainedMarks').val(bestThree);

            //alert(value);
            //$('#exampleModal').modal('hide');

        });

    </script>


@endsection