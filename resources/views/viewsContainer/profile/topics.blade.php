@extends('layouts.app')
@section('content')


<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        @if($isMe)
        <form action="/profile/{{Auth::user()->name}}/user_topics/add" method="post">
          {!! csrf_field() !!}
          <select name="topic">
            @foreach($new_topics as $field)
            <option value="{{$field->id}}">{{$field->topic_name}}</option>
            @endforeach
          </select>
          <button type="submit" name="addUserTopic">Add Topic</button>
        </form>
        @endif

        @foreach ($user_topics as $fields)
        <form action="/profile/{{Auth::user()->name}}/user_topics/delete" method="post">
          {!! csrf_field() !!}
          <input type="hidden" name="_method" value="delete">
          <div class="col-md-3">
            <div class="panel panel-default">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <div class="checkbox">
                        @if($isMe)
                        <button type="submit" name="delete" value="{{$fields->id}}">X</button>
                        @endif
                        {{ $fields->topic_name }}
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  @endsection
