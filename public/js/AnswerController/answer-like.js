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

      $('.likeForm').submit(submitLike);
  }

  function submitLike(e)
  {
    e.preventDefault();
    var answerId = $(this.aid).val(),
      index = $(this.index).val(),
      _token = $(this._token).val(),
      instance = $(this).parent(),
      data = {
        _token: _token ,
        answerId : answerId
      };
      console.log(instance);
    $.ajax({
      url: '/question/' + questionId + '/answer/' + answerId + '/like',
      type: 'POST',
      data: data,
      success: function(response){
        if(response.status == 200)
        {
          var likes_count = response.answer.likes_count;
          $($(instance).children()[4]).html(likes_count + " Like/s");
        }
      },
      error: function(error){
        console.log(error);
      }
    });
    return false;
  }
});
