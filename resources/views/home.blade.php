@extends('layouts.app')

@section('content')
<!-- consider putting this script in the public folder in some js folder -->
<!--script type="text/javascript" src="{{asset('js/jquery-2.2.2.js')}}" > </script-->
<script type="text/javascript">
$(document).ready(function(){




  // we select the form that will be submitted
  // and use the submit event to detect a submission

  $('#ask_form')
  .submit(function(e){
    console.log("1");
    e.preventDefault();

    var data1 = CKEDITOR.instances.editor1.getData();//this code gets the edited content, use it with you share the question
    //console.log(data1);
    //$('#content').append(data1);

    var _token = $('input[name=_token]').val();
    var title = $('input[name=title]').val();
    var question_body = $(data1).val();
    var topic = $('select[name=topic]').val();
    var tagged_people = $('input[name=tagged_people]').val();


    //we assign an object to the data variable
    //this object consist of the data you want, like the title, token, body, user_id .. etc
    var data = {
      _token: _token,
      title: title,
      question_body: data1,
      topic: topic,
      tagged_people: tagged_people,

    };
    console.log("2",data);
    /*
    don't use new FormData
    it requires using blade form, which sucks :3
    */
    // var data = new FormData();
    // data.append('_token',_token);
    // data.append('title2',title2);
    // data.append('question_body',question_body);


    /*
    the url, is the action in the form, notice that i've removed the action from the form.
    The data below, accepts an object of data you want, just as we have defined it above
    Any AJAX request, has two callbacks [success, error].
    you may have some processing if it is successful or failure
    A callback is a function that's called after some operation finishes
    */
    /*
    make sure that the below ajax request is within the submit event handler
    You were putting it outside the handler, which is irrational
    */
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


    //we return false, in order to prevent the normal submission of the form from hapenning
    //because the normal submission of the form makes the page reload or redirect
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
        <!-- we remove the action attribute from the form -->
        <!-- we give the form an id, and use it in the script above -->
        <form id="ask_form" class="form-horizontal" method="post">
          {!! csrf_field() !!}

          <div class="col-md-4"><br>
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="title of your question" ><br>
            <label class="control-label" for="Topic">Topic</label>
            <select name="topic" class="form-control" id="select-2">
              @foreach($fields as $field)
              <!-- why do you pass the name while you can pass the id? -->
              <!-- if you pass the name in the value below, in the controller you would search for the id -->
              <!-- shorten the solution, and pass the id ()$field->->id)-->
              <option value="{{$field->id}}">{{$field->topic_name}}</option>
              @endforeach
            </select><br>
            <label>Tag People</label>
            <input type="text" class="form-control"  name="tagged_people" placeholder="ex.person name" autocomplete="on"><br>
            <input type="file" class="form-control"   name="attached_file" >
          </div>

          <!--label class="control_label" for="question_body">Question</label-->
          <!--CKEditor-->
          <div name="editor1" id="editor1" rows="10" cols="80" contenteditable="true"></div>
          <script>
          CKEDITOR.replace( 'editor1' );
          </script>
          <!--div class="content" name="question_body"></div-->

          <!--textarea rows="10" cols="80" name="question_body" placeholder="what's your question?"></textarea-->

          <div class="col-md-4 col-md-offset-8">
            <button  name="singlebutton" class="btn btn-success" type="submit" >Ask</button>
          </div>
        </div>
      </form>
      <!هوون بعطي اروووور حتى وانا شايتهم ,, احذفهم ببطل يعطي ايرور -->
      <!--
          //   @if($questions)
            <get questions form >
            @foreach($questions as $question)
            <div class="col-md-6 col-md-offset-6" contenteditable="false">
              {{$question->title}}
            </div>
        //    @endforeach
  //    @endif
      -->

    </div>
  </div>
</div>

@endsection
