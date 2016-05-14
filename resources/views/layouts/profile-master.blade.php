@extends('layouts.app')

@section('content')
<div class="profile-container container">
  <div class="col-md-3 right-profile-sidebar">
    <div class="user-card">
      <a class="no-anchor-style pointer-cursor" href="{{url('/profile/'.$username)}}">
        <img class="user-img img-circle" src="{{asset('/images/user.png')}}" alt="" width="180"/>
        <p class="user-name">{{$username}}</p>
      </a>
    </div>
    <hr>
    <div class="stats">
      <div id="qs_count" data-toggle="tooltip" title="Number of questions" class="stat-item stat-left">
        {{$questions_count}}
      </div>
      <div id="anss_count" data-toggle="tooltip" title="Number of answers" class="stat-item stat-mid">
        {{$answers_count}}
      </div>
      <div id="likes_count" data-toggle="tooltip" title="Number of likes" class="stat-item stat-right">
        {{$likes_count}}
      </div>
      <script type="text/javascript">
      $(document).ready(function(){
        $('#qs_count').tooltip();
        $('#anss_count').tooltip();
        $('#likes_count').tooltip();
      });
      </script>
    </div>
    <div class="profile-nav">
      <?php
        $items = [
          'About' => 'profile-info',
          'Portfolio' => 'portfolio',
          'Contact' => 'contact-info',
        ];
        if($username == Auth::user()->name)
        {
          $items['Topics'] = 'user_topics';
          $items['Library'] = 'library';
        }
       ?>
       <a class="no-anchor-style pointer-cursor" href="{{url('/profile/'.$username)}}">
         <div class="profile-nav-item
         @if(Request::is('*profile/'.$username)) profile-nav-item-active @endif">
             <p>
               Activity
             </p>
         </div>
       </a>
      @foreach($items as $key=>$item)
      <a class="no-anchor-style pointer-cursor" href="{{url('/profile/'.$username.'/'.$item)}}">
        <div class="profile-nav-item @if(Request::is('*'.$item.'*'))profile-nav-item-active @endif">
            <p>
              {{$key}}
            </p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  <div class="col-md-8">
    @yield('profile-content')
  </div>
</div>
@endsection
