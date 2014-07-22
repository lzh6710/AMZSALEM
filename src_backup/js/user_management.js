$(document).ready(function() {
	$('#userTable a.edit').off('click').on('click', function() {
		go_to_edit(this);
	});
});

var go_to_edit = function(row) {
	var username = $(row).find('input[type=hidden]').val();
	$('#username').val(username);
	$('#editForm').submit();
}
	
	