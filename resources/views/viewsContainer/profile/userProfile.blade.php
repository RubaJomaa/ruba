@extends('layouts.profile-master')

@section('profile-content')

<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="well profile-inner-container col-md-10">
      <ul class="nav nav-tabs">
        <li class="active"><a class="no-anchor-style pointer-cursor" data-toggle="tab" href="#qs">My Questions</a></li>
        <li><a class="no-anchor-style pointer-cursor" data-toggle="tab" href="#ans_qs">Questions I Answered</a></li>
      </ul>
      <div class="tab-content">
        <div id="qs" class="tab-pane fade in active">
          <h3>My Questions</h3>
          @foreach($questions as $key => $question)
          <div class="qs-item">
            <a class="no-anchor-style pointer-cursor" href="{{URL('/question/'.$question->id )}}"> {!! $question->title !!}</a>
            <hr>
            <p>
              {!! str_limit($question->question_body, 100) !!}
            </p>
          </div>
          @endforeach
        </div>
        <div id="ans_qs" class="tab-pane fade">
          <h3>Questions I Answered</h3>
          @foreach($questions_answered_to as $key => $question)
          <div class="ans_qs_item">
            <a class="no-anchor-style pointer-cursor" href="{{URL('/question/'.$question->id )}}"> {!! $question->title !!}</a>
            <hr>
            <p>
              {!! str_limit($question->question_body, 100) !!}
            </p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
