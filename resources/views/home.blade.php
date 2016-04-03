@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <!-- this anchor is to redirect to the profile -->
        <a href="{{URL('/profile/'.Auth::user()->name )}}"> {{Auth::user()->name}} </a><br>
        <form class="form-horizontal" action="home" method="post">
          {!! csrf_field() !!}
          <fieldset>
            
            <label for="input-text-1">Title</label>
            <input type="email" class="form-control" id="input-text-1" placeholder="title of your question">
            <div class="form-group">
              <label class="col-md-4 control-label" for="Topic">Topic</label>
              <div class="col-md-4">

                <select class="form-control" id="select-2">
                  @foreach($fields as $field)
                  <option value="{{$field->topic_name}}">{{$field->topic_name}}</option>
                  @endforeach
                </select>

              </div>
            </div>

            <div name="editor1" id="editor1" rows="10" cols="80" contenteditable="true"></div>
            <script>
            CKEDITOR.replace( 'editor1' );
            </script>

            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
              <button id="singlebutton" name="singlebutton" class="btn btn-success">Ask</button>
            </div>
          </div>
        </fieldset>
      </form>


    </div>
  </div-->
</div>
</div>

@endsection
