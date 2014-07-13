$(document).ready(function() {
	$('#productTable a.edit').off('click').on('click', function() {
		go_to_edit(this);
	});
	
	$('#refresh_status').click(function(){
	  $.ajax({
	    url: '/product/refresh_product_status',
	    success: function() {
	      location.reload();
	    }
	  });
	  return false;
	});
	
});

var go_to_edit = function(row) {
	var SKU = $(row).find('input[type=hidden]').val();
	$('#SKU').val(SKU);
	$('#editForm').submit();
}
	
	