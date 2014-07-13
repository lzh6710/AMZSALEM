var current_page = 1;
var sort_key = '';
var sort_order = '';
var search_key = '';

$(document).ready(function() {
	search(false);
	init();
	dynamicInit();
});

var init = function() {
	$('#update-btn').off('click').on('click', function() {
		search(true);
	});
	
	
	$('#dynamic-table_length select').off('change').on('change', function() {
		current_page = 1;
		search(false);
	});
	
	$('.timepicker').datepicker().on('changeDate', function(ev){
		$('#alert').hide();
		if ($(this).attr('date-type') == 'end') {
			$('#endDate').val($(this).data('date'));
		} else {
			$('#startDate').val($(this).data('date'));
		}
		$(this).datepicker('hide');
	});
	
	$('#filter-btn').off('click').on('click', function() {
		$(this).hide();
		$('#action-btn').show();
		$('#action-btn').find('#text').text($('#action-btn').parents('.input-group-btn').find('ul.dropdown-menu li:first').text());
		search_key = $('#action-btn').parents('.input-group-btn').find('ul.dropdown-menu li:first').attr('key');
		$('.search-txt').show();
		$('#submit-btn').show();
	});
	
	$('#order-search ul li').off('click').on('click', function() {
		if ($(this).hasClass('close-btn')){
			$('#action-btn').hide();
			$('#filter-btn').show();
			$('#filter-btn').find('#text').text('Search');
			$('.date-cp').hide();
			$('#submit-btn').hide();
			$('.search-txt').hide();
		} else {
			search_key = $(this).attr('key');
			if ($(this).hasClass('date-btn')) {
				$('.date-cp').show();
				$('.search-txt').hide();
			} else {
				$('.search-txt').show();
				$('.date-cp').hide();
			}
			$('#submit-btn').show();
			$('#action-btn').find('#text').text($(this).text());
		}
		
		$('#startDate').val('');
		$('#endDate').val('');
		$('.search-txt').val('');
		sort_key = '';
		sort_order = '';
		current_page = 1;
		search(false);
	});
	
	$('#submit-btn').off('click').on('click', function() {
		if (search_key == 'purchaseDate') {
			var parts_start =$('#startDate').val().split('-');
			var start_date = new Date(parts_start[2],parts_start[0]-1,parts_start[1]).getTime();
			var parts_end =$('#endDate').val().split('-');
			var end_date = new Date(parts_end[2],parts_end[0]-1,parts_end[1]).getTime();
			if (start_date > end_date) {
				alert('The start date can not be greater then the end date');
				return;
			}
		}
		
		if (search_key == 'amazonOrderId' || search_key == 'buyerName') {
			var search_txt = $.trim($('.search-txt').val());
			if (search_txt == '') {
				alert('Please enter Order Id');
				return;
			}
		}
		search(false);
	});
	
	
}

var dynamicInit = function() {
	
	$('#pagging .control').off('click').on('click', function() {
		if ($(this).hasClass('disabled')) {
			return;
		};
		
		if ($(this).hasClass('prev')) {
			current_page = current_page - 1;
		} else if ($(this).hasClass('next')) {
			current_page = current_page + 1;
		} else {
			current_page = parseInt($(this).attr('page'));
		}
		search(false);
	});
	
	if (sort_order != '') {
		$("#" + sort_key).addClass('sorting_' + sort_order);
		$("#" + sort_key).attr('index', sort_order);
	}
	

	$('.sorting').off('click').on('click', function() {
		if (sort_key != $(this).attr('id')) {
			$('.sorting').removeClass('sorting_asc').removeClass('sorting_desc');
			$('.sorting').attr('index', 0);
			sort_key = '';
			sort_order = '';
		}
		
		var index = $(this).attr('index');
		if (index == 0) {
			$(this).addClass('sorting_asc');
			$(this).attr('index', 'asc');
			sort_order = 'asc';
			sort_key = $(this).attr('id');
		} else if (index == 'asc') {
			$(this).addClass('sorting_desc');
			$(this).attr('index', 'desc');
			sort_order = 'desc';
			sort_key = $(this).attr('id');
		} else {
			$(this).attr('index', 0);
			sort_order = '';
			sort_key = '';
		}

		current_page = 1;
		search(false);
	});
}

var search = function(is_update) {
	var start_date =$('#startDate').val();
	var end_date =$('#endDate').val();
	var token = $.trim($('#token').val());
	var page_number = parseInt($('#dynamic-table_length select').val());
	var search_txt = $.trim($('.search-txt').val());
	var param = {
		'current_page' : parseInt(current_page),
		'page_number' : page_number,
		'sort_key' : sort_key,
		'sort_order' : sort_order,
		'search_key': search_key,
		'search_txt' : search_txt,
		'start_date': start_date,
		'end_date': end_date,
		'is_update': is_update ? '1' : '0'
	};

	$.ajax({
				type : 'POST',
				url : 'order/search',
				dataType : 'json',
				data : {
					'searchCondition' : param,
					'csrf_test_name' : token
				},
				success : function(response) {
					if (response.order_list.length > 0
							&& response.total_page >= 0) {
						var start_index = ((current_page - 1) * page_number) + 1;
						var end_index = ((current_page == response.total_page) ? (start_index + response.order_list.length)
								: (start_index + page_number)) - 1;
						var content = tmplLoader.render('order', {
							order_list : response.order_list,
							total_page : new Array(response.total_page),
							total_record : response.total_record,
							start_index : start_index,
							end_index : end_index,
							current_page : current_page,
							base_url : base_url
						});
						$("#orderListContent").html(content);
						dynamicInit();
					} else {
						$("#orderListContent").html('');
					}
					
					if (response.total_not_view) {
						if (response.total_not_view > 0) {
							$('#bell').text(response.total_not_view).removeClass('hide');
						}
					}

				},
				error : function() {

				}
			});
}
