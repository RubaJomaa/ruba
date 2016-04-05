@extends('layouts.app')

@section('content')

<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <script type="javascript">

        </script>

        <form action="/setup/stepOne" method="post">
          {!! csrf_field() !!}
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
                <input type="submit" value="Next Step">

              </h1>
            </footer>
          </form>
        </div>
      </div>
    </div>
  </div>

  @endsection