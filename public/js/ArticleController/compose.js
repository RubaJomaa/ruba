$(document).ready(function(){
  var article = {};
  $.ajax({
    url: '/article/'+article_id+'/json',
    type: 'get',
    success: function(response){
      article = response.article;
      CKEDITOR.instances.Article.setData(article.body);
    },
    error: function(error){
      console.log(error);
    }
  });

  $('.appendToArticle').click(function(){
    var opinion = $(this).data('opinion');
    CKEDITOR.instances.Article.setData(
      CKEDITOR.instances.Article.getData() + opinion
    );
  });

  $('#saveArticle').submit(function(){
    var articleBody = CKEDITOR.instances.Article.getData();
    $.ajax({
      url: '/article/'+ article_id,
      type: 'post',
      data: {
        body: articleBody,
        _token: $(this._token).val()
      },
      success: function(response){
        console.log(response);
      },
      error: function(error){
        console.log(error);
      }
    });
    return false;
  });

  $('#publishArticle').submit(function(){
    var articleBody = CKEDITOR.instances.Article.getData();
    $.ajax({
      url: '/article/'+ article_id +'/publish',
      type: 'post',
      data: {
        body: articleBody,
        _token: $(this._token).val()
      },
      success: function(response){
        console.log(response);
      },
      error: function(error){
        console.log(error);
      }
    });
    return false;
  });

});
