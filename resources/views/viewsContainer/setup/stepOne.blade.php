@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
     <style type="text/css">
    body{

        background-size: 100% auto;


}
table {
    background-color: #FFFFFF;

}

.b1{
  background-color: #009973;
}
 
tr,td,th{
  background-color: #FFFFFF;

}
.redBackground{
background-color:red;
}


div.highlight {


    background-color: #009973;
    font-color:#ffd700;
     font-variant:small-caps;
   }

div.available {

    background-color: #A8A69C;
}
</style>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">

        <form action="/setup/stepOne" method="post">
          {!! csrf_field() !!}
          @foreach ($fields as $field)
             <div class="col-lg-3 col-sm-4 col-xs-6">
    <table class="table" >
      <tbody>
              <tr>
                <td>

                      <div class="checkbox">
                        <input type="checkbox" name="{{$field->topic_name}}" value="{{$field->id}}">{{ $field->topic_name }}
                      </div>
                      </td>
       </tr>
   </tbody>
   </table>
   </div>
        @endforeach




<div class="form-group">
  <label class="col-md-4 control-label"></label>

    <h1 class="col-md-3 col-offset-3">

    <input type="submit" value="Next Step" class="btn b1">
         </h1>

</div>

                </form>
</div>
            </div>
         </div>
         </div>
        </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="checkbox"]').click(function()
    {

        if($(this).is(":checked")){
          //$("p").css("color", "red");
         // $(this).parent().addClass("redBackground");

          $(this).parent().toggleClass("highlight");

        }
        else if($(this).is(":not(:checked)"))
        {
         //$("p").css("color", "black");
        // $(this).parent().removeClass("redBackground");
         $(this).parent().removeClass("highlight");


        }
    });
});
</script>



        </body>

@endsection
