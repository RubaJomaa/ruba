/*
:doc:
add post controller with ajax
*/

$(document).ready(function()
{

//console.log('hello');

init();

  function init()
  {
      $('.addForm').submit(submitAdd);
  }

  function submitAdd(e)
  {
    e.preventDefault();
      _token = $(this._token).val(),

      data = {
        _token: _token ,
        questionId: questionId
      };


    $.ajax({

      url: '/question/' + questionId + '/library' ,
      type: 'POST',
      data: data,
      success: function(response){
      console.log('success');
      },
      error: function(error){
        console.log(error);
      }
    });

    return false;
  }
});
