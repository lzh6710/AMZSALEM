$(document).ready(function() {
	
	$('#cancel').off().on('click', function() {
		$('.cancel-bar').addClass('showTop');
		return false;
	});
	
	$('#ship').off().on('click', function() {
		$('#orderForm').attr("action", base_url + "order/shipped");
		$('#orderForm').submit();
		return false;
	});
	
	$('.btn-cancel').off().on('click', function() {
		$('.admin-bar').removeClass('showTop');
	});
	
	$('.cancel-bar .btn-yes').off().on('click', function() {
		if ($('#isAll').is(':checked')) {
			$('.confirm-bar').addClass('showTop');
			$('.cancel-bar').removeClass('showTop');
		} else {
			$('#orderForm').attr("action", base_url + "order/cancel");
			$('#orderForm').submit();
		}
	});
	
	$('.confirm-bar .btn-ok').off().on('click', function() {
		var reason = $('#cancelAllReason').val();
		$('#orderForm #reasonAll').val(reason);
		$('#orderForm').attr("action", base_url + "order/cancel");
		$('#orderForm').submit();
	});
	
	$('.action_span').off().on('click', function() {
		var id = $(this).attr('data');
		if ($('#' + id).is(':visible')) {
			$('#' + id).fadeOut();
			
			if($(this).hasClass('cancel_bt'))
			{
				$(this).text('CANCEL');
			} else {
				$(this).text('SHIP');
			}
		} else {
			$('#' + id).fadeIn();
			$(this).text('CLOSE');
		}
	});
	
	
});


	