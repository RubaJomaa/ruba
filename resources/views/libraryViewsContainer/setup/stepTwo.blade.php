@extends('layouts.app')

@section('content')

<div class="container" style="opacity:0.9">
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <form method="post" action="/setup/stepTwo">
                {!! csrf_field() !!}

                Overview : <textarea rows="3" cols="30" name="overview"></textarea><br>
                Skills : <textarea rows="3" cols="30" name="skills"></textarea><br>
                Achievements: <textarea rows="3" cols="30" name="achievements"></textarea><br>
                Work History: <textarea rows="3" cols="30" name="work_history"></textarea><br>
                Education: <textarea rows="3" cols="30" name="education"></textarea><br>
                Languages: <textarea rows="2" cols="30" name="languages"></textarea><br>

    <footer><h1 class="col-md-3 col-offset-3">

    <input type="submit" value="Next Step">
    <a href="/home" type="button" >skip setup </a> 
         </h1>
    </footer>
                 </form>
            </div>
</div>
         </div>
        </div>

@endsection
