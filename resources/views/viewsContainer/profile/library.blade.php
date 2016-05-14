@extends('layouts.profile-master')

@section('profile-content')

<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="well profile-inner-container col-md-10">
        @if(count($questions))
        @foreach($questions as $question)
        <div class="qs-item">
          <a class="no-anchor-style pointer-cursor" href="{{URL('/question/'.$question->id )}}"> {!! $question->title !!}</a>
          <hr>
          <p>
            {!! str_limit($question->question_body, 100) !!}
          </p>
        </div>
       @endforeach
       @else
         No questions added to this user library yet.
       @endif
      </div>
    </div>
</div>

@endsection
