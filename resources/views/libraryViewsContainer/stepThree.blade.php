@extends('layouts.app')

@section('content')
<div class="container" style="opacity:0.9">
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <form method="post" action="/setup/stepThree">
                {!! csrf_field() !!}

                First Name : <input type="text" name="first_name"><br>
                Last Name :  <input type="text" name="last_name"><br>
                Gender :
                            <input type="radio" name="gender" value="male"> Male<br>
                            <input type="radio" name="gender" value="female"> Female<br>
                            <input type="radio" name="gender" value="other"> Other <br>
                Date Of Birth : <input type="" name="date_of_birth"><br>
                Country : <input type="text" name="country"><br>
                City : <input type="text" name="city"><br>
                address: <input type="text" name="address"><br>
                Birth Place: <input type="text" name="birth_place"><br>

    <footer><h1 class="col-md-3 col-offset-3">

    <input type="submit" value="Finish">
         </h1>
    </footer>
                 </form>
            </div>
</div>
         </div>
        </div>

@endsection
