@extends('layouts.app')

@section('content')

<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">

        <!-- this style, removes the ugly default style of the anchor -->
        <style media="screen">
        a {
          color: inherit;
          text-decoration: none !important;
        }
        </style>
        @if(count($questions))
        @foreach($questions as $question)
        <div class="container" style="opacity:0.9">
              <br>
              <a href="{{url('/question/'.$question->id)}}">{{$question->title}}

          </div>
       @endforeach
       @else
        No questions added to this user library yet.
       @endif
      </div>
      <a href="/profile/{{$username}}" > Back </a>
    </div>
  </div>
</div>

@endsection
