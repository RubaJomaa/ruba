@extends('layouts.app')

@section('content')

<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="col-md-12 col-md-offset-1">
      <div class="panel panel-default">
        Hello in {{$username}}'s profile
        <div class="stats">
          <div id="qs_count" data-toggle="tooltip" title="Number of questions" class="stat-item stat-left">
            {{$questions_count}}
          </div>
          <div id="anss_count" data-toggle="tooltip" title="Number of answers" class="stat-item stat-mid">
            {{$answers_count}}
          </div>
          <div id="likes_count" data-toggle="tooltip" title="Number of likes" class="stat-item stat-right">
            {{$likes_count}}
          </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function(){
          $('#qs_count').tooltip();
          $('#anss_count').tooltip();
          $('#likes_count').tooltip();
        });
        </script>
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
        <br>
        <button type="button" name="button">
          <a href="{{url('/profile/'.$username.'/user_topics')}}">Topics</a>
        </button>

        <br>
        <button type="button" name="button">
          <a href="{{url('/profile/'.$username.'/library')}}">Library</a>
        </button>
      </div>
    </div>
    <div class="col-md-12 well">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#qs">Questions</a></li>
        <li><a data-toggle="tab" href="#ans_qs">Questions I Answered</a></li>
      </ul>
      <div class="tab-content">
        <div id="qs" class="tab-pane fade in active">
          <h3>My Questions</h3>
          @foreach($questions as $key => $question)
          <div class="row">
            {!! $question->title !!}
            <hr>
          </div>
          @endforeach
        </div>
        <div id="ans_qs" class="tab-pane fade">
          <h3>Questions I Answered</h3>
          @foreach($questions_answered_to as $key => $question)
          <div class="row">
            {!! $question->title !!}
            <hr>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
