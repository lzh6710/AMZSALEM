$(document).ready(function() {
	$(document).off('click').on("click", function() {
		$('.dropdown-menu').fadeOut();
	});
	
	$('.animate-fade-up').animate({ opacity: 1});

	$('.toggle-right-box').off('click').on('click', function() {
		show_left_panel();
	});

	$('.dropdown-toggle').off('click').on('click', function(e) {
		e.stopPropagation();
		$('.dropdown-menu ').fadeOut();
		var $dropdown_menu = $(this).parents('.dropdown').find('.dropdown-menu');
		if ($dropdown_menu.is(":visible")) {
			$dropdown_menu.fadeOut();
		} else {
			$dropdown_menu.fadeIn();
		}
		
		
	});
	
	$('.sub-menu').off('click').on('click', function(){
		if ($(this).find('a.dcjq-parent').hasClass('active')) {
			$(this).find('a.dcjq-parent').removeClass('active');
			$(this).find('.sub').slideUp();
		} else {
			$(this).find('a.dcjq-parent').addClass('active');
			$(this).find('.sub').slideDown();
		}
	});
	
	$('.checkbox').off('click').on('click', function(){
		var is_checked = $(this).find('input[type=checkbox]').is(':checked');
		if (!is_checked) {
			$(this).find('input[type=checkbox]').prop('checked', true);
			$(this).find('.gui').addClass('checked');
		} else {
			$(this).find('input[type=checkbox]').prop('checked', false);
			$(this).find('.gui').removeClass('checked');
		}
	});
	
	$('.radio').off('click').on('click', function(){
		$(this).parents('.icheck').find('.iradio_minimal').removeClass('checked');
		$(this).find('input[type=radio]').prop('checked', true);
		$(this).find('.gui').addClass('checked');
	});
});

var show_left_panel = function() {
	/*
	 * if (!$('.header').hasClass('merge-header')) {
	 * $('.header').addClass('merge-header');
	 * $('.left-sidebar').addClass('open-left-bar'); } else {
	 * $('.header').removeClass('merge-header');
	 * $('.left-sidebar').removeClass('open-left-bar'); }
	 */

	if (!$('#sidebar').hasClass('hide-left-bar')) {
		$('#sidebar').addClass('hide-left-bar');
		$('#main-content').addClass('merge-left');
		$('.breadcrumb-ct').show();
	} else {
		$('#sidebar').removeClass('hide-left-bar');
		$('#main-content').removeClass('merge-left');
		$('.breadcrumb-ct').hide();
	}
}