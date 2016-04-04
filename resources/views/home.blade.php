@extends('layouts.app')

@section('content')


<script type="text/javascript" src="{{asset('js/jquery-2.2.2.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){

  $('#ask').click(function(e){
    e.preventDefault();
    var _token=$('input[name=_token]').val();
    var title2=$('input[name=title]').val();
    var question_body=$('textarea[name=question_body]').val();
    var data=new FormData();
    data.append('_token',_token);
    data.append('title2',title2);
    data.append('uestion_body',uestion_body);
  });

    $.ajax({
      url: 'postQuestion',
      type: 'POST',
      data:data,
      success: function(data){
        alert('your question has been sent');

      }
  //  });
  });
});
</script>


<div class="container">
  <!-- this anchor is to redirect to the profile -->
  <a href="{{URL('/profile/'.Auth::user()->name )}}"> {{Auth::user()->name}} </a><br>

  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Ask Here</div>

        <form class="form-horizontal" action="postQuestion" method="post">
          {!! csrf_field() !!}

          <div class="col-md-4">
            <label>Title</label>
            <input typy="text" class="form-control" name="title" placeholder="title of your question" >

            <label class="col-md-4 control-label" for="Topic">Topic</label>


            <select class="form-control" id="select-2">
              @foreach($fields as $field)
              <option value="{{$field->topic_name}}">{{$field->topic_name}}</option>
              @endforeach
            </select>
          </div>

          <!--CKEditor-->
          <!--div name="editor1" id="editor1" rows="10" cols="80" contenteditable="true"></div>
          <script>
          CKEDITOR.replace( 'editor1' );
        </script-->

        <!--added form -->
        <textarea rows="10" cols="80" name="question_body" placeholder="what's your question?"></textarea>
        <div class="col-md-4">
          <button id="singlebutton" name="singlebutton" class="btn btn-success" type="submit" id="ask">Ask</button>
        </div>
      </div>
    </form>
           <!--form method="post" action="question">
<div class="control-group">
  <div class="controls">
  <input type="text" name="title" placeholder="title">
  </div>
</div>
<div class="control-group">
  <div class="controls">
<textarea name="question_body" placeholder="write your question" rows="8" cols="50">
</div>
<input type="submit" class="btn primary-btn" id="ask" value="ask">Ask

  </div>
<form-->
</div>
</div>
</div>

@endsection
