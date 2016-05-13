@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="t-add">
      <label for="">Add Topic:</label>
      <form action="/topics" method="post">
        {!! csrf_field() !!}
        <input type="text" name="name">
        <button type="submit" name="button">Add Topic</button>
      </form>
    </div>
    <hr>
    <ul class="t-ul">
      @foreach($topics as $key => $topic)
      <li class="t-li">
        <form action="/topics" method="post">
          {!! csrf_field() !!}
          <input type="hidden" name="_method" value="patch">
          <input type="hidden" name="id" value="{{$topic->id}}">
          <input type="text" name="name" value="{{$topic->topic_name}}">
          <button type="submit" name="button">Save</button>
        </form>
        <span>
          {{$topic->topic_name}}
        </span>
      </li>
      <form action="/topics" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" value="{{$topic->id}}">
        <button style="display: inline" type="submit" name="button">
          <span class="glyphicon glyphicon-trash"></span>
        </button>
      </form>
      <br>
      @endforeach
    </ul>
  </div>
  <script type="text/javascript">

  </script>
@endsection
