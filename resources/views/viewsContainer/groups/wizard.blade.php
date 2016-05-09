@extends('layouts.app')

@section('content')
  <script type="text/javascript">
    var questionId = {{$question->id}};
  </script>
  <h1>Create Your Group</h1>
  <hr>
  <label for="">Title: </label>
  <P>{!! $question->title !!}</p>
  <label for="">Description: </label>
  <div>
    {!! $question->question_body !!}
  </div>
  <label for="">Members: </label>
  <div class="ac">
    <div class="ac-members"></div>
    <form class="ac-form" method="post">
      {!! csrf_field() !!}
      <input class="ac-input">
    </form>
    <div class="ac-output">
      <table></table>
    </div>
  </div>

  <form id="createGroupForm" action="/groups/new/{{$question->id}}/wizard" method="POST">
    {!! csrf_field() !!}
    <div></div>
    <button type="submit" name="createGroup">Create Group</button>
  </form>

  <!-- scripts -->
  <script src="{{asset('js/GroupController/create-group-wizard.js')}}" charset="utf-8"></script>
  @endsection
