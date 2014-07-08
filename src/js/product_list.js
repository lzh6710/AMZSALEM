$(document).ready(function() {
	$('#productTable a.edit').off('click').on('click', function() {
		go_to_edit(this);
	});
	
});

var go_to_edit = function(row) {
	var SKU = $(row).find('input[type=hidden]').val();
	$('#SKU').val(SKU);
	$('#editForm').submit();
}
	
	