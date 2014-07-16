<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	/**
	 * @author NNTrung
	 * @name __construct
	 * @todo
	 * @param
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('parser');
		check_login(false);
	}

	public function index()
	{
		$data = array();
		$update_id = $this->session->flashdata('update_id');
		if ($update_id) {
			$data['update_id'] = $update_id ;
		}
		$this->layout->view('order_list', $data);
	}

	public function shipped() {
		$id = $this->input->post('orderId');
		$orderItemModel = new OrderItemModel();
		$order_item_list = $orderItemModel->where('amazonOrderId', $id)->get()->all_to_array();

		$orderModel = new OrderModel();
		$order = $orderModel->where('amazonOrderId', $id)->get();

		$feed =  $this->parser->parse('xml/order_shipped', array(
				'MerchantIdentifier' => 'A2T7KN13JZ9T6W',
				'AmazonOrderID' => $id,
				'Orders' => $order_item_list), TRUE);

		try {
			$result = $this->amazon_api->shipped($feed);
			$this->session->set_flashdata('update_id', $id);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		redirect('order');
	}

	public function cancel() {
		$id = $this->input->post('orderId');

		$orderItemModel = new OrderItemModel();
		$order_item_list = $orderItemModel->where('amazonOrderId', $id)->get()->all_to_array();
		$feed =  $this->parser->parse('xml/order_template', array(
				'MerchantIdentifier' => 'A2T7KN13JZ9T6W',
				'AmazonOrderID' => $id,
				'Orders' => $order_item_list), TRUE);

		try {
			$result = $this->amazon_api->updateOrderStatus($feed);
			$this->session->set_flashdata('update_id', $id);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		redirect('order');
	}

	public function search() {
		checkAjax();
		$search_condition = $this->input->post('searchCondition');

		if ($search_condition['is_update'] == '1') {
			$this->getOrderFromAmazon();
		}

		$orderModel = new OrderModel();
		$result = $orderModel->getListWithPagging($search_condition);

		if ($search_condition['is_update'] == '1') {
			$result['total_not_view'] = $orderModel->countByNotView();
		}

		echo json_encode($result);
	}

	public function view($id) {
		$orderItemModel = new OrderItemModel();
		$order_item_list = $orderItemModel->getList($id);

		$xmlString = $this->order_api->getItemsListOrders($id);
		$xml = new SimpleXMLElement($xmlString);
		$amazon_order_id = $xml->ListOrderItemsResult->OrderItems->AmazonOrderId;
		foreach ($xml->ListOrderItemsResult->OrderItems->OrderItem as $order_item) {
			$is_new = true;
			foreach ($order_item_list as $my_order_item) {
				if ($my_order_item->orderItemId == $order_item->OrderItemId) {
					$is_new = false;
					$order_item_info = array();
					$orderItemModel->where('orderItemId',(string) $order_item->OrderItemId);
					$order_item_info['title'] = (string) $order_item->Title;
					$order_item_info['quantityOrdered'] = (string) $order_item->QuantityOrdered;
					$order_item_info['quantityShipped'] = (string) $order_item->QuantityShipped;
					$order_item_info['itemPriceCurrencyCode'] = (string) $order_item->ItemPriceCurrencyCode;
					$order_item_info['itemPriceAmount'] = (string) $order_item->ItemPriceAmount;
					$order_item_info['shippingPriceCurrencyCode'] = (string) $order_item->ShippingPriceCurrencyCode->name;
					$order_item_info['shippingPriceAmount'] = (string) $order_item->ShippingPriceAmount;
					$order_item_info['giftWrapPriceCurrencyCode'] = (string) $order_item->GiftWrapPriceCurrencyCode;
					$order_item_info['giftWrapPriceAmount'] = (string) $order_item->GiftWrapPriceAmount;
					$order_item_info['itemTaxCurrencyCode'] = (string) $order_item->ItemTaxCurrencyCode;
					$order_item_info['itemTaxAmount'] = (string) $order_item->ItemTaxAmount;
					$order_item_info['shippingTaxCurrencyCode'] = (string) $order_item->ShippingTaxCurrencyCode;
					$order_item_info['shippingTaxAmount'] = (string) $order_item->ShippingTaxAmount;
					$order_item_info['giftWrapTaxCurrencyCode'] = (string) $order_item->GiftWrapTaxCurrencyCode;
					$order_item_info['giftWrapTaxAmount'] = (string) $order_item->GiftWrapTaxAmount;
					$order_item_info['shippingDiscountCurrencyCode'] = (string) $order_item->ShippingDiscountCurrencyCode;
					$order_item_info['shippingDiscountAmount'] = (string) $order_item->ShippingDiscountAmount;
					$order_item_info['promotionDiscountCurrencyCode'] = (string) $order_item->PromotionDiscountCurrencyCode;
					$order_item_info['promotionDiscountAmount'] = (string) $order_item->PromotionDiscountAmount;
					$order_item_info['PromotionIds'] = (string) $order_item->PromotionIds;
					$order_item_info['conditionId'] = (string) $order_item->ConditionId;
					$order_item_info['conditionSubtypeId'] = (string) $order_item->ConditionSubtypeId;
					$order_item_info['ASIN'] = (string) $order_item->ASIN;
					$order_item_info['SellerSKU'] = (string) $order_item->SellerSKU;
					$orderItemModel->update($order_item_info);
					break;
				}
			}

			if ($is_new) {
				$orderItemModel = new OrderItemModel();
				$orderItemModel->amazonOrderId = (string) $id;
				$orderItemModel->orderItemId = (string) $order_item->OrderItemId;
				$orderItemModel->title = (string) $order_item->Title;
				$orderItemModel->quantityOrdered = (string) $order_item->QuantityOrdered;
				$orderItemModel->quantityShipped = (string) $order_item->QuantityShipped;
				$orderItemModel->itemPriceCurrencyCode = (string) $order_item->ItemPriceCurrencyCode;
				$orderItemModel->itemPriceAmount = (string) $order_item->ItemPriceAmount;
				$orderItemModel->shippingPriceCurrencyCode = (string) $order_item->ShippingPriceCurrencyCode->name;
				$orderItemModel->shippingPriceAmount = (string) $order_item->ShippingPriceAmount;
				$orderItemModel->giftWrapPriceCurrencyCode = (string) $order_item->GiftWrapPriceCurrencyCode;
				$orderItemModel->giftWrapPriceAmount = (string) $order_item->GiftWrapPriceAmount;
				$orderItemModel->itemTaxCurrencyCode = (string) $order_item->ItemTaxCurrencyCode;
				$orderItemModel->itemTaxAmount = (string) $order_item->ItemTaxAmount;
				$orderItemModel->shippingTaxCurrencyCode = (string) $order_item->ShippingTaxCurrencyCode;
				$orderItemModel->shippingTaxAmount = (string) $order_item->ShippingTaxAmount;
				$orderItemModel->giftWrapTaxCurrencyCode = (string) $order_item->GiftWrapTaxCurrencyCode;
				$orderItemModel->giftWrapTaxAmount = (string) $order_item->GiftWrapTaxAmount;
				$orderItemModel->shippingDiscountCurrencyCode = (string) $order_item->ShippingDiscountCurrencyCode;
				$orderItemModel->shippingDiscountAmount = (string) $order_item->ShippingDiscountAmount;
				$orderItemModel->promotionDiscountCurrencyCode = (string) $order_item->PromotionDiscountCurrencyCode;
				$orderItemModel->promotionDiscountAmount = (string) $order_item->PromotionDiscountAmount;
				$orderItemModel->PromotionIds = (string) $order_item->PromotionIds;
				$orderItemModel->conditionId = (string) $order_item->ConditionId;
				$orderItemModel->conditionSubtypeId = (string) $order_item->ConditionSubtypeId;
				$orderItemModel->ASIN = (string) $order_item->ASIN;
				$orderItemModel->SellerSKU = (string) $order_item->SellerSKU;
				$orderItemModel->save();
			}
		}

		$order_item_list = $orderItemModel->getList($id);
		$orderModel = new OrderModel();
		$order = $orderModel->where('amazonOrderId', $id)->get();
		$data = array();
		$data['order_item_list'] = $order_item_list;
		$data['order'] = $order;
		$this->layout->view('order_item', $data);

	}

	public function getOrderFromAmazon() {
		$orderModel = new OrderModel();
		$order_list = $orderModel->getList();

		$xmlString = $this->order_api->getListOrders();
		$xml = new SimpleXMLElement($xmlString);
		foreach ($xml->ListOrdersResult->Orders->Order as $amz_order) {
			$is_new = true;
			foreach ($order_list as $my_order) {
				if ($my_order->amazonOrderId == $amz_order->AmazonOrderId) {
					$is_new = false;
					$order_info = array();
					$orderModel->where('amazonOrderId', (string) $amz_order->AmazonOrderId);
					$order_info['purchaseDate'] = (string) $amz_order->PurchaseDate;
					$order_info['lastUpdateDate'] = (string) $amz_order->LastUpdateDate;
					$order_info['orderStatus'] = (string) $amz_order->OrderStatus;
					$order_info['fulfillmentChannel'] = (string) $amz_order->FulfillmentChannel;
					$order_info['salesChannel'] = (string) $amz_order->SalesChannel;
					$order_info['shipServiceLevel'] = (string) $amz_order->ShipServiceLevel;
					$order_info['shippingAddressName'] = (string) $amz_order->ShippingAddress->name;
					$order_info['shippingAddressAddressLine1'] = (string) $amz_order->ShippingAddress->AddressLine1;
					$order_info['shippingAddressAddressLine2'] = (string) $amz_order->ShippingAddress->AddressLine2 || "";
					$order_info['shippingAddressStateOrRegion'] = (string) $amz_order->ShippingAddress->StateOrRegion;
					$order_info['shippingAddressPostalCode'] = (string) $amz_order->ShippingAddress->PostalCode;
					$order_info['shippingAddressCountryCode'] = (string) $amz_order->ShippingAddress->CountryCode;
					$order_info['shippingAddressPhone'] = (string) $amz_order->ShippingAddress->Phone;
					$order_info['orderTotalCurrencyCode'] = (string) $amz_order->OrderTotal->CurrencyCode;
					$order_info['orderTotalAmount'] = (string) $amz_order->OrderTotal->Amount;
					$order_info['numberOfItemsShipped'] = (string) $amz_order->NumberOfItemsShipped;
					$order_info['numberOfItemsUnshipped'] = (string) $amz_order->NumberOfItemsUnshipped;
					$order_info['paymentExecutionDetail'] = (string) $amz_order->PaymentExecutionDetail;
					$order_info['paymentMethod'] = (string) $amz_order->PaymentMethod;
					$order_info['marketplaceId'] = (string) $amz_order->MarketplaceId;
					$order_info['buyerEmail'] = (string) $amz_order->BuyerEmail;
					$order_info['buyerName'] = (string) $amz_order->BuyerName;
					$order_info['shipmentServiceLevelCategory'] = (string) $amz_order->ShipmentServiceLevelCategory;
					$order_info['shippedByAmazonTFM'] = (string) $amz_order->ShippedByAmazonTFM;
					$order_info['orderType'] = (string) $amz_order->OrderType;
					$order_info['earliestShipDate'] = (string) $amz_order->EarliestShipDate;
					$order_info['latestShipDate'] = (string) $amz_order->LatestShipDate;
					$order_info['earliestDeliveryDate'] = (string) $amz_order->EarliestDeliveryDate;
					$order_info['latestDeliveryDate'] = (string) $amz_order->LatestDeliveryDate;
					$orderModel->update($order_info);
					break;
				}
			}

			if ($is_new) {
				$orderModel = new OrderModel();
				$orderModel->amazonOrderId = (string) $amz_order->AmazonOrderId;
				$orderModel->purchaseDate = (string) $amz_order->PurchaseDate;
				$orderModel->lastUpdateDate = (string) $amz_order->LastUpdateDate;
				$orderModel->orderStatus = (string) $amz_order->OrderStatus;
				$orderModel->fulfillmentChannel = (string) $amz_order->FulfillmentChannel;
				$orderModel->salesChannel = (string) $amz_order->SalesChannel;
				$orderModel->shipServiceLevel = (string) $amz_order->ShipServiceLevel;
				$orderModel->shippingAddressName = (string) $amz_order->ShippingAddress->name;
				$orderModel->shippingAddressAddressLine1 = (string) $amz_order->ShippingAddress->AddressLine1;
				$orderModel->shippingAddressAddressLine2 = (string) $amz_order->ShippingAddress->AddressLine2 || "";
				$orderModel->shippingAddressStateOrRegion = (string) $amz_order->ShippingAddress->StateOrRegion;
				$orderModel->shippingAddressPostalCode = (string) $amz_order->ShippingAddress->PostalCode;
				$orderModel->shippingAddressCountryCode = (string) $amz_order->ShippingAddress->CountryCode;
				$orderModel->shippingAddressPhone = (string) $amz_order->ShippingAddress->Phone;
				$orderModel->orderTotalCurrencyCode = (string) $amz_order->OrderTotal->CurrencyCode;
				$orderModel->orderTotalAmount = (string) $amz_order->OrderTotal->Amount;
				$orderModel->numberOfItemsShipped = (string) $amz_order->NumberOfItemsShipped;
				$orderModel->numberOfItemsUnshipped = (string) $amz_order->NumberOfItemsUnshipped;
				$orderModel->paymentExecutionDetail = (string) $amz_order->PaymentExecutionDetail;
				$orderModel->paymentMethod = (string) $amz_order->PaymentMethod;
				$orderModel->marketplaceId = (string) $amz_order->MarketplaceId;
				$orderModel->buyerEmail = (string) $amz_order->BuyerEmail;
				$orderModel->buyerName = (string) $amz_order->BuyerName;
				$orderModel->shipmentServiceLevelCategory = (string) $amz_order->ShipmentServiceLevelCategory;
				$orderModel->shippedByAmazonTFM = (string) $amz_order->ShippedByAmazonTFM;
				$orderModel->orderType = (string) $amz_order->OrderType;
				$orderModel->earliestShipDate = (string) $amz_order->EarliestShipDate;
				$orderModel->latestShipDate = (string) $amz_order->LatestShipDate;
				$orderModel->earliestDeliveryDate = (string) $amz_order->EarliestDeliveryDate;
				$orderModel->latestDeliveryDate = (string) $amz_order->LatestDeliveryDate;
				$orderModel->save();
			}

		}
	}
}

