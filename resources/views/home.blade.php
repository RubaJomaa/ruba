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

            <!-- Form Name -->
            <legend>ASK HERE</legend>
            <!-- Button Drop Down -->
            <label for="input-text-1">Title</label>
            <input type="email" class="form-control" id="input-text-1" placeholder="title of your question">

            <!-- Button Drop Down -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Topic">Topic</label>
              <div class="col-md-4">

                <select class="form-control" id="select-2">
                  @foreach($fields as $field)
                  <option value="{{$field->field_name}}">{{$field->field_name}}</option>
                  @endforeach
                </select>

              </div>
            </div>


            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="question"></label>
              <div class="col-md-4">
                <textarea class="form-control" id="question" name="question" placeholder="what's your question?"></textarea>
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <i class="glyphicon glyphicon-chevron-up showhide clickable" title="Show Panel content"></i>
              <label class="col-md-4 control-label" for="singlebutton"></label>
              <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-success">Ask</button>
              </div>
            </div>

            <i class="glyphicons glyphicons-heart-empty showhide clickable"></i>
          </fieldset>
        </form>


      </div>
    </div-->
  </div>
</div>

@endsection
