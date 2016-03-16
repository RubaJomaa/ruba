@extends('layouts.app')

@section('content')

<div class="container" style="opacity:0.9">
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
             

        @foreach ($fields as $field)
        <div class="col-md-3">
            <div class="thumbnail">
                <img class="img-rounded" alt="Cinque Terre" width="304" height="236" src="tableImg/{{$field->image_name}}" >
                <h1>
                    <div class="checkbox">
                    <input type="checkbox">{{$field->field_name}}>
                    </div>
                </h1>         
    </div>
</div>
        @endforeach
    </div>
    <footer><h1 class="col-md-3 col-offset-3"> 
       
    <input type="submit" value="Next Step">
         </h1>
    </footer>
</div>
         </div>
        </div>
   
@endsection
