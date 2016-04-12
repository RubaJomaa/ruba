@extends('layout.app';
@section('content')


<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <script type="javascript">

        </script>

        @if($isMe)
        <button id="editButton" type="button" name="button">edit</button>
        <button id="cancelEditButton" type="button" name="button">cancel</button>
        @endif

        <form action="/profile/{{$username}}/user_topics" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="PATCH">

          @foreach ($fields as $field)
          <div class="col-md-3">
            <div class="panel panel-default">
              <!--img  src="{{asset('tableImg/'.$field->image_name)}}" class="img-rounded" alt="Cinque Terre" width="304" height="236" -->
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <div class="checkbox">
                        <input type="checkbox" name="{{$field->topic_name}}" value="{{$field->id}}">{{ $field->topic_name }}
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            @endforeach

            <footer>
              <h1 class="col-md-3 col-offset-3">
                <input type="submit" value="update">

              </h1>
            </footer>
          </form>
        </div>
      </div>
    </div>

@endsection
