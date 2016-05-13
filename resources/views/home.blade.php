@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <!-- the following div is shown only to the admin, put it wherever you see suitable-->
      @if(Auth::user()->is_admin)
      <div class="">
        <a href="{{url('/topics')}}">Show & Edit Topics</a>
      </div>
    @endif
      <div class="panel panel-default">
        <div class="panel-heading">ASK form</div>
        <form id="postQ" class="form-horizontal" method="post">
          {!! csrf_field() !!}
          <div class="col-md-4"><br>
            <label>Title</label>
            <input id="newQTitle" type="text" class="form-control" name="title" placeholder="title of your question" ><br>
            <label class="control-label" for="Topic">Topic</label>
            <select name="topic" class="form-control" id="select-2">
              @foreach($topics as $field)
              <option value="{{$field->id}}">{{$field->topic_name}}</option>
              @endforeach
            </select><br>

          </div>

          <!--CKEditor-->
          <div name="postQEditor" id="postQEditor" rows="10" cols="80" contenteditable="true"></div>

          <div class="col-md-4 col-md-offset-11">
            <button  name="singlebutton" class="btn btn-success" type="submit" >Ask</button>
          </div>
        </div>
      </form>

      <!--div class="filtration well"-->
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
      <!--/div-->
      <div id="questionsList">
        You have no questions..
      </div>

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
