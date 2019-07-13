
@extends('layouts.system')

@section('system')

@include('popup.academic')


<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal">+</button>

<textarea rows="4" class="form-control" id="result" >

</textarea>
<br>

    <input type="text" class="form-control" id="best1" />

{{--<div id="welcomeDiv"  style="display:none;" class="answer_list" > WELCOME</div>--}}
{{--<input type="button" name="answer" value="Show Div" onclick="showDiv()" />--}}

{{--    <button class="btn btn-danger" onclick="showDiv()">hi</button>--}}
{{--    <input type="text" id="shit" style="display: none">--}}


@endsection


@section('script')


    <script type="text/javascript">

        $('#exampleModal').on('click', '#transferData', function () {
            var value1 = $('#examType1').val().trim();
            var value2 = $('#obtainedMarks1').val();

            var value3 = $('#examType2').val().trim();
            var value4 = $('#obtainedMarks2').val();

            var value5 = $('#examType3').val().trim();
            var value6 = $('#obtainedMarks3').val().trim();

            var value7 = $('#examType4').val().trim();
            var value8 = $('#obtainedMarks4').val().trim();

            var best = Math.max(value2,value4,value6,value8);


            $('#result').val(value1+"  "+value2+'\n'+value3+"  "+value4+'\n'+value5+"  "+value6+"\n"+value7+"  "+value8);


            $('#best1').val(best);

        });

        function showDiv() {
            document.getElementById('tr2').style.display = "";
        }

    </script>

    @endsection



