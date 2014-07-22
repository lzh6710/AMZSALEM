$( document ).ready(function() {
    $('#login').on('click', function(){
    	do_login();
    });
    
    $('.enterLogin').on('keyup', function(e){
    	if(e.which == 13){
    		do_login();
        }
    });
	
	$('.checker').on('click', function(){
		var is_remember = $(this).find('input[name=remember]').val();
		if (is_remember == 0) {
			$(this).find('input[name=remember]').val(1);
			$(this).find('span').addClass('checked');
		} else {
			$(this).find('input[name=remember]').val(0);
			$(this).find('span').removeClass('checked');
		}
	});
	
	$('.close').on('click', function(){
		$('.alert-danger').addClass('hide');
	});
});


var do_login = function() {
	var username = $.trim($('#username').val());
	var password = $.trim($('#password').val());
	var token = $.trim($('#token').val());
	var remember = $.trim($("#remember").val());
	var param = {
		'username'       : username,
		'password'       : password,
		'remember'       : remember,
		'csrf_test_name' : token
	};
	
	$.ajax({
	  type     : 'POST',
	  url      : 'user/login',
	  dataType : 'json',
	  data     : param,
	  success  : function(response){
		  if (response.st == 0) {
			  if (response.msg) {
				var isString = (jQuery.type(response.msg) === 'string');
				if (!isString) {
					var error_msg = '';
					$.each(response.msg, function(key, value) {
						error_msg += (value + '<br/>');
					});
					$('#errorMessage').html(error_msg);
				  } else {
					$('#errorMessage').html(response.msg);
				  }
				  $('.alert-danger').removeClass('hide');
			  }
		  } else {
			  $('#errorMessage').html('');
			  $('.alert-danger').addClass('hide');
			  document.location.href = response.url;
		  }
	  },
	  error: function() {

      }
	});
}