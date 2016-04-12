@extends('layouts.app')
@section('content')

<script type="text/javascript">
$(document).ready(function(){
  $('#ask_form')
  .submit(function(e){
    console.log("1");
    e.preventDefault();
    var data1 = CKEDITOR.instances.editor1.getData();//this code gets the edited content, use it with you share the question
    var _token = $('input[name=_token]').val();
    var title = $('input[name=title]').val();
    var question_body = $(data1).val();
    var topic = $('select[name=topic]').val();
    var tagged_people = $('input[name=tagged_people]').val();
    var data = {
      _token: _token,
      title: title,
      question_body: data1,
      topic: topic,
      tagged_people: tagged_people,
    };
    console.log("2",data);
    $.ajax({
      url: '/postQuestion',
      type: 'POST',
      data: data,
      success: function(data){
        console.log("success", data);
        alert ("your question has been added , hope you will find the best answer soon :) ");
      },
      error: function(data){
        console.log("error", data);
      }
    });
      $('#like').click(function(e){
          
      });
    return false;
  });
});
</script>

<div class="container">
  <!-- this anchor is to redirect to the profile -->
  <a href="{{URL('/profile/'.Auth::user()->name )}}"> {{Auth::user()->name}} </a><br>

  <div class="row">
    <div class="col-md-6 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">ASK form</div>

        <form id="ask_form" class="form-horizontal" method="post">
          {!! csrf_field() !!}

          <div class="col-md-4"><br>
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="title of your question" ><br>
            <label class="control-label" for="Topic">Topic</label>
            <select name="topic" class="form-control" id="select-2">
              @foreach($fields as $field)
              <option value="{{$field->id}}">{{$field->topic_name}}</option>
              @endforeach
            </select><br>
            <label>Tag People</label>
            <input type="text" class="form-control"  name="tagged_people" placeholder="ex.person name" autocomplete="on"><br>
            <input type="file" class="form-control"   name="attached_file" >
          </div>

          <!--CKEditor-->
          <div name="editor1" id="editor1" rows="10" cols="80" contenteditable="true"></div>
          <script>
          CKEDITOR.replace( 'editor1' );
          </script>

          <div class="col-md-4 col-md-offset-8">
            <button  name="singlebutton" class="btn btn-success" type="submit" >Ask</button>
          </div>
        </div>
      </form>

     @if($questions)
     @foreach($questions as $question)
        
     <div class="col-md-12"> <a href="{{URL('/profile/'.Auth::user()->name )}}">{{ $user_of_question }}</a>
         <!--i need to display the user name for user who add the question , and the URL for his profile , instead of the thing that i have done  -->
         <h1> {{ $question->title }} </h1>
         <h4> {!! $question->question_body !!} </h4>
         <a href=""
        </div>
        
    @endforeach
    @endif
    </div>
  </div>
</div>

@endsection
