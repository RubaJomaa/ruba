@extends('layouts.app')

@section('content')

<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        Hello {{$username}}
        <br>
        <!-- this style, removes the ugly default style of the anchor -->
        <style media="screen">
        a {
          color: inherit;
          text-decoration: none !important;
        }
        </style>
        <button type="button" name="button">
          <a href="{{url('/profile/'.$username.'/profile-info')}}">About</a>
        </button>
        <br>
        <button type="button" name="button">
          <a href="{{url('/profile/'.$username.'/portfolio')}}">Portfolio</a>
        </button>
        <br>
        <button type="button" name="button">
          <a href="{{url('/profile/'.$username.'/contact-info')}}">Contact</a>
        </button>
      </div>
    </div>
  </div>
</div>

@endsection
