@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
       <style type="text/css">
    body{

        background-size: 100% auto;


}

.b1{
  background-color: #009973;
}
 .l1
 {
   width:850px ;
   height: 20px;
   font-size: 15px;
   background-color: #009973;

 }
.ta8 {
    width: 230px;
    height:60px;
    border:1px solid #3366FF;
    border-left: 4px solid #3366FF;
}
.ta5 {
  border-radius: 10px;
  height: 80px;
  width: 860px;
}
 textarea {
      resize: none;
  }
</style>
</head>
<body>

<div class="container" style="opacity:0.9">
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <form method="post" action="/setup/stepTwo" class="well form-horizontal" id="contact_form">
                <fieldset>
                {!! csrf_field() !!}

               <span class="label l1 col-md-4  ">Overview </span>  <textarea rows="3" class="ta5 center" cols="30" name="overview"></textarea><br>
                <span class="label l1 col-md-4 ">Skills </span> <textarea rows="3" cols="30" class="ta5 center" name="skills"></textarea><br>
                <span class="label l1 col-md-4 ">Achievements</span> <textarea rows="3" cols="30" class="ta5 center" name="achievements"></textarea><br>
                <span class="label l1 col-md-4 "> Work History </span> <textarea rows="3" cols="30" class="ta5 center" name="work_history"></textarea><br>
                <span class="label l1 col-md-4 ">Education </span><textarea rows="3" cols="30" class="ta5 center" name="education"></textarea><br>
                <span class="label l1 col-md-4">Languages </span> <textarea rows="2" cols="30" class="ta5 center" name="languages"></textarea><br>



<div class="form-group">
  <label class="col-md-4 control-label"></label>

    <h1 class="col-md-3 col-offset-3">

    <input type="submit" value="Next Step" class="btn b1">
    <a class="no-anchor-style pointer-cursor" href="{{url('/home')}}">
              Skip 
            </a>
         </h1>

</div>

    </fieldset>
                 </form>
            </div>
</div>
         </div>
        </div>
</body>

@endsection
