<?php
class OrderModel extends DataMapper {

	var $table = "order";

	function getListWithPagging($search_condition)
	{
		$current_page = $search_condition['current_page'];
		$page_number = $search_condition['page_number'];
		$sort_key = $search_condition['sort_key'];
		$sort_order = $search_condition['sort_order'];
		$search_key = $search_condition['search_key'];
		$search_txt = $search_condition['search_txt'];
		$start_date = $search_condition['start_date'];
		$end_date = $search_condition['end_date'];
		
		$orderModel = new OrderModel();
		$total_record = 0;
		$total_page = 0;
		
		if ($page_number && $current_page) {
			$current_page = intval($current_page);
			if ($page_number > 0 && $current_page > 0) {
				$total_record = $this->getCount($search_key, $search_txt, $start_date, $end_date);
				$total_page = ceil($total_record / $page_number);
				if ($current_page <= $total_page) {
					$orderModel->limit($page_number, ($current_page - 1) * $page_number);
				}
			}
		}

		if ($search_key == 'purchaseDate') {
			if ($start_date != '') {
				$orderModel->where('purchaseDate >=', $start_date . ' 00:00:00');
			}
			
			if ($end_date != '') {
				$orderModel->where('purchaseDate <=', $end_date . ' 23:59:59');
			}
		} else {
			if ($search_key == 'amazonOrderId' || $search_key == 'buyerName') {
				$orderModel->like($search_key, $search_txt);
			}
		}
		
		if ($sort_key && $sort_order) {
			$orderModel->order_by($sort_key, $sort_order);
		}

		$order_list = $orderModel->get()->all_to_array();
		$results = array();
		$result['order_list'] = $order_list;
		$result['total_page'] = $total_page;
		$result['current_page'] = $current_page;
		$result['total_record'] = $total_record;
		return $result;
	}
	
	function getCount($search_key, $search_txt, $start_date, $end_date)
	{
		$orderModel = new OrderModel();
		
		if ($search_key == 'purchaseDate') {
			if ($start_date != '') {
				$orderModel->where('purchaseDate >=', $start_date . ' 00:00:00');
			}
			
			if ($end_date != '') {
				$orderModel->where('purchaseDate <=', $end_date . ' 23:59:59');
			}
		} else {
			if ($search_key == 'amazonOrderId' || $search_key == 'buyerName') {
				$orderModel->like($search_key, $search_txt);
			}
		}
		
		$order_list = $orderModel->count();
		return $order_list;
	}

	function getList()
	{
		$order_model = new OrderModel();
		$order_list = $order_model->get();
		return $order_list;
	}

	function countByNotView(){
		$this->where('isView', '0');
		$total_not_view = $this->count();
		return $total_not_view;
	}

}
