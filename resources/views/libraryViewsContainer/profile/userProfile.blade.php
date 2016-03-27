@extends('layouts.app')

@section('content')

<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        Hello {{$username}}
        <br>
        <form action="/profile/{{$username}}/profile-info" method="get">
          <input type="submit" class="button" value=" About User">
        </form>
        <form action="/profile/{{$username}}/portfolio" method="get">
          <input type="submit" class="button" value="User Portfolio">
        </form>
        <form action="/profile/{{$username}}/contact-info" method="get">
          <input type="submit" class="button" value="Contact">
        </form>


      </div>
    </div>
  </div>
</div>

@endsection
