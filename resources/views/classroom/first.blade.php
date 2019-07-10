@extends('layouts.special')

@section('special')

    
    

    <div class="jumbortron text-center" style="backgroud: #a8b7c7; ">
        
        <br><br><br><br><br><br><br><br>
        <h1> <b> <big> Virtual Classroom </big> </b> </h1>

        <p> <br> <br>
        <a class="btn btn-primary btn-lg" href="/login" role="button" style="tab-size: 30;"> LOGIN </a> 
        <span style="display:inline-block; width: 15px;"> </span>
        <a class="btn btn-success btn-lg" href="#" role="button"> Register </a>
    </div>

    <button onclick="myFunction()" id="fire">fire</button>
    <button  id="water" style="visibility:hidden">water</button>

    <div class="btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="checkbox" checked autocomplete="off"> Checked
        </label>
    </div>

    <input type="button" class="btn btn-danger" value="Enroll" onclick="return change(this);" />



@endsection




