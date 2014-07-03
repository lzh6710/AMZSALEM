$(document).ready(function() {
	$('#deleteBtn').off().on('click', function() {
		$('.admin-bar').addClass('showTop');
		return false;
	});
	
	$('.btn-cancel').off().on('click', function() {
		$('.admin-bar').removeClass('showTop');
	});
	
	$('.btn-ok').off().on('click', function() {
		$('#userForm').attr('action', $('#urlDelete').val());
		$('#userForm').submit();
	});
	
	
});


	