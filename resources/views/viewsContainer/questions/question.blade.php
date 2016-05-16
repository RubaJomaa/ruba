@extends('layouts.app')
@section('content')
<style>
.b1
{
  background-color: #008CBA;
}
</style>
<script type="text/javascript">
var q_user_id = {{$question->user->id}};
$(document).ready(function(){
  $('#like').css({display: 'inline-block'});
  $('#like').click(function(){
    $('#like').css({display: 'none'});
  });
  $('.like-btn').tooltip();
});
</script>
<div class="home-container container">
  <div class="col-md-12">
    <div class="col-md-12">
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
      </form>
      <hr>
      <div class="col-md-2">
        <a class="qs-user-card no-anchor-style pointer-cursor" href="{{url('/profile/'.$question->user->name)}}">
          <img class="qs-user-img img-circle" src="/images/user.png" width="100"/>
          <span class="qs-user-name">{{ $question->user->name }}</span>
        </a>
      </div>
      <div class="qs-body col-md-9">
        <form id="PutQB" method="post">
          {!! csrf_field() !!}
          <input type="hidden" name="_method" value="patch">
          <span class="q_body_msg"></span>
          <div class="question_body"> {!! $question->question_body !!} </div>
        </form>
      </div>
      <div class="col-md-10 col-md-offset-2 q-actions">
        <script type="text/javascript">
        $(document).ready(function(){
          $('.save-lib').tooltip();
          $('.go-to-create-grp-wizard').tooltip();
          $('.delete-q').tooltip();
        });
        </script>
        <div class="col-md-1">
          <form class="addForm"  method="post">
            {!! csrf_field() !!}
            <button type="submit" name="add" class="save-lib btn btn-default btn-lg" data-toggle="tooltip" title="Save to Library">
              <span class="fa fa-book" aria-hidden="true"></span>
            </button>
          </form>
        </div>
          @if($isMe)
        <div class="col-md-1">
          <button type="button" class="go-to-create-grp-wizard btn btn-default btn-lg" data-toggle="tooltip" title="Create Group Discussion" name="createGroup">
            <a href="{{url('/groups/new/'.$question->id.'/wizard')}}">
              <span class="fa fa-users" aria-hidden="true"></span>
            </a>
          </button>
        </div>
        <div class="col-md-1">
          <form action="/question/{{$question->id}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="delete">
            <button type="submit" name="deleteQ" class="delete-q btn btn-danger btn-lg" data-toggle="tooltip" title="Delete Questions">
              <span class="fa fa-trash" aria-hidden="true"></span>
            </button>
          </form>
        </div>
        @endif
      </div>
      <div class="col-md-12" id="answersList">
        @foreach($question->answers as $index=>$answer)
        <div class="answer-item">
          <a class="q-user-card no-anchor-style pointer-cursor" href="{{url('/profile/'.$answer->user->name)}}">
            <img class="q-user-img img-circle" src="/images/user.png" width="50"/>
            <span class="q-user-name">{{ $answer->user->name }}</span>
          </a>
          <h4 class="ans-body">
            {!! $answer->answer !!}
          </h4>
          <hr>
          <form class="likeForm" id="likeForm{{$index}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="aid" value="{{ $answer->id }}">
            <input type="hidden" name="index" value="{{ $index }}">
            <button id="like" type="submit" name="like" class="like-btn b1 btn btn-default btn-lg" data-toggle="tooltip" title="Like">
              <span class="fa fa-heart" aria-hidden="true"></span>
            </button>
          </form>
          <label class="likes-indicator" for="likeForm{{$index}}"> {!! $answer->likes_count !!} like/s </label>
        </div>
        @endforeach
      </div>
      <form class="col-md-12" id="answerForm" method="post">
        {!! csrf_field() !!}
        <div name="answerEditor" id="answerEditor" rows="10" cols="80" contenteditable="true"></div>
        <button name="answer" class="post-ask-button" type="submit">Answer</button>
      </form>
    </div>
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
<script src="{{asset('js/AnswerController/answer-like.js')}}" charset="utf-8"></script>
<script src="{{asset('js/QuestionController/add-to-library.js')}}" charset="utf-8"></script>
@endsection
