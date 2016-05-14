@extends('layouts.app')

@section('content')
<script type="text/javascript">
  var groupId = {{$group->id}},
  questionId = {{$question->id}}
</script>
<div class="jumbotron group-header">
  <h1>
    {{$question->title}}
  </h1>
  <div class="group-settings-gear dropdown">
    <a href="" class="no-anchor-style" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      Settings
      <span class="glyphicon glyphicon-cog"></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
      <li><a href="{{url('/group/'.$group->id.'/article')}}">Edit The Article</a></li>
      <li role="separator" class="divider"></li>
      <li><a href="">Do Sth Else</a></li>
    </ul>
  </div>
</div>
<div class="container">
  <div class="col-md-3 group-members" style="height:100%; background-color: #EEEEEE;">
    Members:
    <hr>
    @foreach($members as $member)
    <div class="">
      {{$member->name}}
    </div>
    @endforeach
  </div>
  <div class="col-md-6 group-stream" style="background-color: white; height:400px;">
    <div class="group-issue-preview">
      {!! $question->question_body !!}
    </div>
    <br>
    <form id="groupAnswerEditorForm" class="group-answer-submission" method="post">
      {!! csrf_field() !!}
      <div name="groupAnswerEditor" id="groupAnswerEditor" rows="10" cols="80" contenteditable="true"></div>
      <br>
      <button name="answer" class="post-ask-button" type="submit">Answer</button>
    </form>
    <br><hr>
    <div class="group-opinions">
      @foreach($answers as $index=>$answer)
      <div class="group-opinion">
        <div class="group-opinion-body">
          {!! $answer->answer !!}
        </div>
        <hr>
        <div class="group-opinion-check">
          <form class="addToLibrary" id="addToLibrary{{$index}}" method="post" data-answer="{{ $answer }}">
            {!! csrf_field() !!}
            <input type="hidden" name="aid" value="{{$answer->id}}">
            <input type="hidden" name="index" value="{{$index}}">
            <a class="library-check no-anchor-style pointer-cursor" data-checked="{{$answer->is_saved}}">
              <span class="glyphicon"></span>
            </a>
          </form>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="col-md-3 group-library" style="height:100%; background-color: #EEEEEE;">
    Library:
    <hr>
    <div class="group-library-opinions">
      @foreach($library_answers as $i => $lib_answer)
      <div data-answerid="{{$lib_answer->id}}" class="group-library-opinion">
        <span class="group-library-opinion-check">
          <span class="glyphicon glyphicon-check"></span>
        </span>
        <span class="group-library-opinion-body">
          <!-- user name: $lib_answer->name -->
          {!! str_limit($lib_answer->answer, 10) !!}
        </span>
      </div>
      @endforeach
    </div>
  </div>
</div>
<script src="{{asset('js/GroupController/group-opinion.js')}}" charset="utf-8"></script>
@endsection
