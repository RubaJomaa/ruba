@extends('layouts.app')
@section('content')

<div class="home-container container">
  <div class="col-md-12">
    <!-- the following div is shown only to the admin, put it wherever you see suitable-->
    <div class="ask-pane">
      <button class="ask-button" role="button" data-toggle="collapse" href="#postQ" aria-expanded="false" aria-controls="postQ">
        <h4>
          Ask a Question
        </h4>
      </button>
      <form id="postQ" class="collapse form-horizontal well" method="post">
        {!! csrf_field() !!}
        <label>Title</label>
        <input id="newQTitle" type="text" class="form-control" name="title" placeholder="title of your question" ><br>
        <label class="control-label" for="Topic">Topic</label>
        <select name="topic" class="form-control" id="select-2">
          @foreach($topics as $field)
          <option value="{{$field->id}}">{{$field->topic_name}}</option>
          @endforeach
        </select><br>
        <div name="postQEditor" id="postQEditor" rows="10" cols="80" contenteditable="true"></div>
        <button name="singlebutton" class="post-ask-button" type="submit" >Ask</button>
      </form>
    </div>

    <div class="filtration">
      <center>
      <div class="selects">
        <select id="filter" name="filter">
          <option selected = "true" value="0">Your Topics Feed</option>
          <option value="1">All Site Feed</option>
          <option value="2">Your Questions</option>
          <option value="3">Questions You've Interacted With</option><!-- likes ans answers -->
          <option value="4">Questions Of Topic..</option>
        </select>
        <select id="topic_filter" name="topic_id">
          @foreach($topics as $topic)
          <option value="{{$topic->id}}">{{$topic->topic_name}}</option>
          @endforeach
        </select>
      </div>
    </center>
    </div>
    <div id="questionsList">
      You have no questions..
    </div>
  </div>
</div><!--container-->
<!-- scripts -->
<script src="{{asset('js/HomeController/home-common-vars.js')}}" charset="utf-8"></script>
<script src="{{asset('js/HomeController/home-view-logic.js')}}" charset="utf-8"></script>
<script src="{{asset('js/QuestionController/question-common-vars.js')}}" charset="utf-8"></script>
<script src="{{asset('js/QuestionController/question-post.js')}}" charset="utf-8"></script>
<script src="{{asset('js/HomeController/filtration-get.js')}}" charset="utf-8"></script>
@endsection
