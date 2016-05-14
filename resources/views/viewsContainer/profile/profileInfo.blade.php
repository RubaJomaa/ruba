@extends('layouts.profile-master')

@section('profile-content')
<div class="container">
  <div class="container-fluid">
    <div class="well profile-inner-container col-md-10">
      @if($infos)
      <script type="text/javascript">
      $(document).ready(function(){
        $('input').css({display: 'none'});
        $('button[name=update]').css({display: 'none'});
        $('#cancelEditButton').css({display: 'none'});

        $('#editButton').click(function(){
          $('input').css({display: 'inline-block'});
          $('button[name=update]').css({display: 'inline-block'});
          $('.field').css({display: 'none'});
          $('#cancelEditButton').css({display:'inline-block'});
          $(this).css({display:'none'});
        });

        $('#cancelEditButton').click(function(){
          $('input').css({display: 'none'});
          $('button[name=update]').css({display: 'none'});
          $('.field').css({display: 'inline-block'});
          $('#cancelEditButton').css({display: 'none'});
          $('#editButton').css({display: 'inline-block'});
        });
      })
      </script>
      <form action="/profile/{{$username}}/profile-info" method="post" >
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PATCH">
        <table>
          <tr><td class="f-label">First name</td><td class="f-input"><input type="text" name="first_name" value="{{$infos->first_name}}">  <span class="field"> {{$infos->first_name}}</span></td></tr>
          <tr><td class="f-label">Last name</td><td class="f-input"><input type="text" name="last_name" value="{{$infos->last_name}}" >  <span class="field">{{$infos->last_name}}</span></td></tr>
          <tr><td class="f-label">Gender</td><td style="font-size:18px"><input type="radio" name="gender" value="male" @if($infos->sex=='male')checked="checked" @endif > <span class="field">  @if($infos->sex=='male') male  @endif </span>
          <input type="radio" name="gender" value="female" @if($infos->sex=='female')checked="checked" @endif ><span class="field"> </span> <span class="field"> @if($infos->sex=='female') female  @endif</span>
          <input type="radio" name="gender" value="other" @if($infos->sex=='other' || !$infos->sex )checked="checked" @endif > <span class="field"> @if($infos->sex=='other' || !$infos->sex) other  @endif </span></td></tr>
          <tr><td class="f-label">Date Of Birth</td><td class="f-input"><input type="text"  name="date_of_birth" value="{{$infos->date_of_birth}}" >  <span class="field">{{$infos->date_of_birth}} </span></td></tr>
          <tr><td class="f-label">Country</td><td class="f-input"><input type="text"  name="country" value=" {{$infos->country}} "> <span class="field">{{$infos->country}} </span></td></tr>
          <tr><td class="f-label">City</td><td class="f-input"><input type="text" name="city"value=" {{$infos->city}}"> <span class="field">{{$infos->city}} </span></td></tr>
          <tr><td class="f-label">Address</td><td class="f-input"><input type="text"  name="address" value="{{$infos->address}} "> <span class="field">{{$infos->address}} </span></td></tr>
          <tr><td class="f-label">Birth Place</td><td class="f-input"><input type="text"  name="birth_place" value="{{$infos->birth_place}}"> <span class="field">{{$infos->birth_place}} </span></td></tr>
        </table>
        @if($isMe)
        <button type="submit" class="btn btn-default" name="update">Update</button>
        <button id="editButton" class="btn btn-default" type="button" name="edit">Edit</button>
        <button id="cancelEditButton" class="btn btn-default" type="button" name="cancel">Cancel</button>
        @endif
        @if (count($errors) > 0)
          <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
            </ul>
          </div>
         @endif
      </form>

      @else
      @if($isMe)
      <form action="/profile/{{$username}}/profile-info" method="post" >
        {!! csrf_field() !!}
        <table>
          <tr><td class="f-label">First name </td><td class="f-input"><input type="text" name="first_name" placeholder="ex.ruba" ></td></tr>
          <tr><td class="f-label">Last name </td><td class="f-input"><input type="text" name="last_name" placeholder="ex.jomaa" ></td></tr>
          <tr><td class="f-label">Gender </td><td><input type="radio" name="gender" value="female" >female
          <input type="radio" name="gender" value="male" > male
          <input type="radio" name="gender" value="other" >other</td></tr>
          <tr><td class="f-label">Date Of Birth </td><td class="f-input"><input type="text"name="date_of_birth" placeholder="ex.1/1/1994"></td></tr>
          <tr><td class="f-label">Country </td><td class="f-input"><input type="text" name="country" placeholder="ex.palestine"></td></tr>
          <tr><td class="f-label">City </td><td class="f-input"><input type="text" name="city" placeholder="ex.jenin"></td></tr>
          <tr><td class="f-label">Address </td><td class="f-input"><input type="text"  name="address" placeholder="ex.main street" ></td></tr>
          <tr><td class="f-label">Birth Place </td><td class="f-input"><input type="text" name="birth_place" placeholder="ex.jenin"></td></tr>
        </table>
        <button type="submit" class="btn btn-default" name="button">Store</button>
        @if (count($errors) > 0)
          <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
            </ul>
          </div>
         @endif
      </form>
      @else
      this user have no information
      @endif
      @endif
    </div>
  </div>
</div>

@endsection
