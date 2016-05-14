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

</style>
    </head>
<body>
<div class="container" style="opacity:0.9">
   <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">


     <form method="post" action="/setup/stepThree" class="well form-horizontal" id="contact_form">
         {!! csrf_field() !!}
<fieldset>



<!-- Text input-->

   <div class="form-group">
  <label class="col-md-4 control-label">First Name</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

  <div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
 <div class="form-group">
                        <label class="col-md-4 control-label"> Gender :</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" value="male" /> Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" value="female" /> Female
                                </label>
                                <label>
                                    <input type="radio" name="gender" value="other" /> Other
                                </label>
                            </div>
                        </div>
                    </div>




<!-- Text input-->



<div class="form-group">
  <label class="col-md-4 control-label">Country</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
  <input name="address" placeholder="Country" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->

 <div class="form-group">
  <label class="col-md-4 control-label">City</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="city" placeholder="city" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

  <div class="form-group">
  <label class="col-md-4 control-label">Address</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="address" placeholder="Address" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Select Basic -->

 <div class="form-group">
  <label class="col-md-4 control-label">Birth Place</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="birth_place" placeholder="Birth Place" class="form-control" type="text">
    </div>
  </div>
</div>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Date Of Birth</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
  <input name="date_of_birth" placeholder="Birth Place" class="form-control"  type="text">
    </div>
</div>
</div>

<!-- Text input-->
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>

    <h1 class="col-md-3 col-offset-3">

    <input type="submit" value="Finish" class="btn b1">
         </h1>

</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->


    </body>

@endsection
