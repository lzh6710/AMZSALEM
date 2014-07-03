$(document).ready(function() {
	$(document).off('click').on("click", function() {
		$('.dropdown-menu').fadeOut();
	});
	
	$('.animate-fade-up').animate({ opacity: 1}, 'slow');

	$('.toggle-right-box').off('click').on('click', function() {
		show_left_panel();
	});

	$('.dropdown-toggle').off('click').on('click', function(e) {
		e.stopPropagation();
		$(this).parents('.dropdown').find('.dropdown-menu').fadeIn();
	});
	
	$('.sub-menu').off('click').on('click', function(){
		$(this).find('.sub').slideDown('slow');
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
	} else {
		$('#sidebar').removeClass('hide-left-bar');
		$('#main-content').removeClass('merge-left');
	}
}