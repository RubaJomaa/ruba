$(document).ready(function(){
  var inputVal = '';
  $('.ac-output').hide();

  $('.ac-form').submit(acFormSubmission);

  $('.ac-input').keyup(keyUpEventHandler);

  $('.ac-output').on('click', 'tr', onSuggestionClicked);

  ///

  $('.ac').blur(function(){
    $('.ac-output').slideUp();
  });

  $('.ac-members').on('click', '.ac-member', function(){
    $(this).remove();
    $('.ac-form').submit();
  });

  ////

  function acFormSubmission()
  {
    $.ajax({
      url: '/users/namesstartwith/' + inputVal,
      type: 'POST',
      data: {
        _token: $('.ac-form input[name=_token]').val()
      },
      success: function(response){
        $('.ac-output table').empty();
        response.users.forEach(function(user){
          if(user.id != user_id)//don't suggest yourself
            $('.ac-output table').append('<tr data-name="'+user.name+'" data-id="'+ user.id +'"><td>' + user.name + '</td></tr>');
        });
        $('.ac-output').slideToggle();
      },
      error: function(error){
        console.log(error);
      }
    });
    return false;
  }

  function keyUpEventHandler(e)
  {
    inputVal = $(this).val();
    if(!inputVal)
      return;
    if(inputVal.length >= 2)//when two letters are input, check for users
      $('.ac-form').submit();
  }

  function onSuggestionClicked()
  {
    var user = {
      id: $(this).data('id'),
      name: $(this).data('name')
    };
    $('.ac-members').append('<span data-id="'+user.id+'" class="ac-member">'+user.name+'</span>');
    $('#createGroupForm div').append('<input type="hidden" name="member'+user.id+'" value="'+user.id+'">');
    $(this).remove();
  }

});
