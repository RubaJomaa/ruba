@extends('layouts.app')

@section('content')

<div class="container" style="opacity:0.9">
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <form method="post" action="/setup/stepTwo">
                {!! csrf_field() !!}
                
                Overview : <input type="text" name="overview"><br>
                Skills : <input type="text" name="skills"><br>
                Achievements: <input type="text" name="achievements"><br>
                Work History: <input type="text" name="work_history"><br>
                Education: <input type="text" name="education"><br>
                Languages: <input type="text" name="languages"><br>
   
    <footer><h1 class="col-md-3 col-offset-3"> 
       
    <input type="submit" value="Next Step">
         </h1>
    </footer>
                 </form>
            </div>
</div>
         </div>
        </div>
   
@endsection
