@extends('layouts.app')
@section('content')

<div class="container">
  <!-- this anchor is to redirect to the profile -->
  <a href="{{URL('/profile/'.Auth::user()->name )}}"> {{Auth::user()->name}} </a><br>

  <div class="row">
    <div class="col-md-6 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">ASK form</div>

        <form id="postQ" class="form-horizontal" method="post">
          {!! csrf_field() !!}

          <div class="col-md-4"><br>
            <label>Title</label>
            <input id="newQTitle" type="text" class="form-control" name="title" placeholder="title of your question" ><br>
            <label class="control-label" for="Topic">Topic</label>
            <select name="topic" class="form-control" id="select-2">
              @foreach($user_topics as $field)
              <option value="{{$field->id}}">{{$field->topic_name}}</option>
              @endforeach
            </select><br>
            <label>Tag People</label>
            <input type="text" class="form-control"  name="tagged_people" placeholder="ex.person name" autocomplete="on"><br>
            <input type="file" class="form-control"   name="attached_file" >
          </div>

          <!--CKEditor-->
          <div name="postQEditor" id="postQEditor" rows="10" cols="80" contenteditable="true"></div>

          <div class="col-md-4 col-md-offset-8">
            <button  name="singlebutton" class="btn btn-success" type="submit" >Ask</button>
          </div>
        </div>
      </form>

      <div class="filtration well">
        <select id="filter" name="filter">
          <option selected = "true" value="0">Your Topics Feed</option>
          <option value="1">All Site Feed</option>
          <option value="2">You Questions</option>
          <option value="3">Questions You've Interacted With</option><!-- likes ans answers -->
          <option value="4">Questions Of Topic..</option>
        </select>
        <select id="topic_filter" name="topic_filter">
          @foreach($topics as $topic)
          <option value="{{$topic->id}}">{{$topic->topic_name}}</option>
          @endforeach
        </select>
        <br><br>
        <button type="button" name="filterBtn">Filter</button>
      </div>

      @if($questions)
      <div id="questionsList">
        @foreach($questions as $question)
        <div class="col-md-12">
          <hr>
          <a href="{{URL('/profile/'.$question->user->name )}}">{{ $question->user->name }}</a>
          <h1>
            <a href="{{url('/question/'.$question->id)}}">{{ $question->title }}</a>
          </h1>
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </div>
</div>
<!-- css -->
<link rel="stylesheet" href="{{asset('css/home.css')}}" media="screen" title="no title" charset="utf-8">
<!--  -->
<!-- scripts -->
<script src="{{asset('js/HomeController/home-common-vars.js')}}" charset="utf-8"></script>
<script src="{{asset('js/HomeController/home-view-logic.js')}}" charset="utf-8"></script>
<script src="{{asset('js/QuestionController/question-common-vars.js')}}" charset="utf-8"></script>
<script src="{{asset('js/QuestionController/question-post.js')}}" charset="utf-8"></script>
<script src="{{asset('js/HomeController/filtration-get.js')}}" charset="utf-8"></script>
@endsection
