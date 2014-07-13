<?php
class OrderItemModel extends DataMapper {

	var $table = "order_item";

	function getList($orderId)
	{
		$order_item_model = new OrderItemModel();
		$order_item_model->where('amazonOrderId', $orderId);
		$order_item_list = $order_item_model->get();
		return $order_item_list;
	}

}
