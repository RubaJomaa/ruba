/*
:doc:
like post controller with ajax
*/

$(document).ready(function()
{
  var answerId = $('input[name=id]').val();
console.log(answerId);

init();

  function init()
  {

      $('#likeForm').submit(submitLike);
  }

  function submitLike(e)
  {
    e.preventDefault();
      var answerId = $('input[name=id]').val();
    _token = $('#likeForm input[name=_token]').val();

    data = {
      _token: _token ,
      answerId : answerId ,
      questionId : questionId
    };
      console.log("hello");
    $.ajax({
      url: '/question/' + questionId + '/answer/' + answerId,
      type: 'POST',
      data: data
    });
        console.log("hello");

    return false;
  }
});
