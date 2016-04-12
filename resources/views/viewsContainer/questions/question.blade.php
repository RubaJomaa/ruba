@extends('layouts.app')
@section('content')



     @if($questions)
     @foreach($questions as $question)
     <div class="col-md-12"> <a href="{{URL('/profile/'.Auth::user()->name )}}">{{ $user_of_question }}</a>
         <!--i need to display the user name for user who add the question , and the URL for his profile , instead of the thing that i have done  -->
         <h1> {{ $question->title }} </h1>
         <h3> {!! $question->question_body !!} </h4>
         <h5> {!! $question->taaged_people !!} </h5>
        </div>
        <div name="editor1" id="editor1" rows="10" cols="80" contenteditable="true"></div>
        <script>
        CKEDITOR.replace( 'editor1' );
        </script>

        <div class="col-md-4 col-md-offset-8">
          <button  name="singlebutton" class="btn btn-success" type="submit" >Ask</button>
        </div>
      </div>
    @endforeach
    @endif
@endsection
