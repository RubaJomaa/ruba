$(document).ready(function(){

  init();
  $('#CIF').submit();

  function init()
  {
    $('#CIF').submit(function(e){
      e.preventDefault();
      var _token = $('#CIF input[name=_token]').val(),
      topic_id = $('#CIF input[name=topic_id]').val(),
      user_id = $('#CIF input[name=user_id]').val(),
      data = {
        _token: _token,
        topic_id: topic_id,
        user_id: user_id
      };

      $.ajax({
        url: '/checkInteractivityFactor',
        type: 'POST',
        data: data,
        success: function(response){
          console.log(response);
        },
        error: function(error){
          console.log(error);
        }
      });
      return false;

    });
  }

});
