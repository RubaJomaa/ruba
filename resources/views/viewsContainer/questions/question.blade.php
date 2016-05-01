@extends('layouts.app')
@section('content')
<script type="text/javascript">
  var q_user_id = {{$question->user->id}};
</script>
<div class="col-md-12">
  <a href="{{URL('/profile/'.$question->user->name )}}">{{$question->user->name}}</a><br>

  <!-- checkInteractivityFactor -->
  <form id="CIF" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="topic_id" value="{{$question->topic_id}}">
    <input type="hidden" name="user_id" value="{{$question->user->id}}">
  </form>
  <!--  -->

  <form id="PutQT" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="patch">
    <span class="q_title_msg"></span>
    <h1 class="question_title" contenteditable="true"> {!! $question->title !!} </h1>
    <!-- <input class="question_title" type="text" name="title" value="{{ $question->title }}"> -->
    <!-- <button class="question_titleSave" type="button" name="button">save</button> -->
  </form>
  <hr>
  <form id="PutQB" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="patch">
    <span class="q_body_msg"></span>
    <div class="question_body"> {!! $question->question_body !!} </div>
    <!-- <button class="question_bodySave" type="button" name="saveQuestionBody">save</button> -->
    <!-- <h5> {{ $question->tagged_people }} </h5> -->
  </form>
    @if($isMe)
  <form action="/question/{{$question->id}}" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="delete">
    <button type="submit" name="deleteQ">Delete</button>
  </form>
    @endif
  <hr>
  <form id="answerForm" method="post">
    {!! csrf_field() !!}
    <div name="answerEditor" id="answerEditor" rows="10" cols="80" contenteditable="true"></div>
    <button name="answer" class="btn btn-success" type="submit">Answer</button>
  </form>
  <br><br><br>
  <div id="answersList">
    @foreach($question->answers as $index=>$answer)
    <div class="well">
      <a href="{{URL('/profile/'.$question->user->name)}}">{{ $answer->user->name }}</a>
      <hr>
      {!! $answer->answer !!}
    </div>
    @endforeach
  </div>
</div>
<!-- scripts -->
<!-- these scripts must be in order,  and must be below the content in order for the content to be loaded-->
<script type="text/javascript">
  var questionId = {{$question->id}};
</script>
<script src="{{asset('js/QuestionController/question-common-vars.js')}}" charset="utf-8"></script>
<script src="{{asset('js/QuestionController/question-view-logic.js')}}" charset="utf-8"></script>
<script src="{{asset('js/QuestionController/question-update.js')}}" charset="utf-8"></script>
<script src="{{asset('js/AnswerController/answer-common-vars.js')}}" charset="utf-8"></script>
<script src="{{asset('js/AnswerController/answer-view-logic.js')}}" charset="utf-8"></script>
<script src="{{asset('js/AnswerController/answer-post.js')}}" charset="utf-8"></script>
<script src="{{asset('js/TopicsController/checkInteractivityFactor-post.js')}}" charset="utf-8"></script>
@endsection
