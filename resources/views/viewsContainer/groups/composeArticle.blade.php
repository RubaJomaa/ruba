@extends('layouts.app')

@section('content')
<div class="com" style="min-height:1000px; background-image: url({{asset('/images/chalk-board.png')}}); color: white;">
  <section class="container">
    <div class="col-md-3" style="height:100%; background-color: #365947; color: white;">
      <h3>
        Library
      </h3>
      <hr>
      @foreach($library as $key => $opinion)
      <div>
        <span class="group-library-opinion-body">
          {!!$opinion->answer!!}
        </span>
        <span class="appendToArticle pointer-cursor" data-opinion="{!!$opinion->answer!!}" style="float: right;">
          <span class="glyphicon glyphicon-menu-right"></span>
        </span>
        <hr>
      </div>
      @endforeach
    </div>
    <br>
    <div class="col-md-8 col-md-offset-1">
      <form class="col-md-3 col-md-offset-2" id="saveArticle" method="post">
        {!! csrf_field() !!}
        <button type="submit" class="askworld-btn" name="save">Save</button>
      </form>
      <form class="col-md-3 col-md-offset-2" id="publishArticle" method="post">
        {!! csrf_field() !!}
        <button type="submit" class="askworld-btn" name="publish">Publish</button>
      </form>
    </div>
    <br><br><br>
    <div class="col-md-8 col-md-offset-1">
      <div name="Article" id="Article" rows="10" contenteditable="true"></div>
    </div>
  </section>
</div>
  <!-- <script src="{{asset('libs/autogrow.min.js')}}" charset="utf-8"></script> -->
  <script src="{{asset('js/ArticleController/compose.js')}}" charset="utf-8"></script>
  <script type="text/javascript">
    var article_id = {{$article->id}};
    CKEDITOR.replace( 'Article' );
  </script>
@endsection
