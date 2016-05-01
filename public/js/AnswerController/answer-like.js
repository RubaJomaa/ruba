/*
:doc:
like post controller with ajax
*/

$(document).ready(function(){
  var answerId = $('input[name=id]').val();
  init();

  ///
  function init()
  {
    $likeForm.submit(submitLike);
  }

  function submitLike(e)
  {
    e.preventDefault();
      var answerId = $('input[name=id]').val();
    _token = $('#likeForm input[name=_token]').val();

    data = {
      _token: _token
    };

    $.ajax({
      url: '/question/' + questionId + '/answers/' + answerId + '/like',
      type: 'POST' ,
      data: data
    });

    return false;
  }



});
