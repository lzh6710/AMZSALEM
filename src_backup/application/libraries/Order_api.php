<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once ('.config.inc.php');

class Order_api
{
	public $serviceUrl = "https://mws.amazonservices.jp/Orders";
	public $service;

	public function __construct()
	{
		$config = array (
				'ServiceURL' => $this->serviceUrl,
				'ProxyHost' => null,
				'ProxyPort' => -1,
				'MaxErrorRetry' => 3
		);

		$this->service = new MarketplaceWebServiceOrders_Client(
				AWS_ACCESS_KEY_ID,
				AWS_SECRET_ACCESS_KEY,
				APPLICATION_NAME,
				APPLICATION_VERSION,
				$config
		);
	}


	//===================================GET ITEMS LIST ORDER=============================================================
	function getItemsListOrders($orderId) {
		$request = new MarketplaceWebServiceOrders_Model_ListOrderItemsRequest();
		$request->setSellerId(MERCHANT_ID);
		$request->setAmazonOrderId($orderId);
		return $this->invokeListOrderItems($this->service, $request);
	}

	/**
	 * Get List Order Items Action Sample
	 * Gets competitive pricing and related information for a product identified by
	 * the MarketplaceId and ASIN.
	 *
	 * @param MarketplaceWebServiceOrders_Interface $service instance of MarketplaceWebServiceOrders_Interface
	 * @param mixed $request MarketplaceWebServiceOrders_Model_ListOrderItems or array of parameters
	 */

	function invokeListOrderItems(MarketplaceWebServiceOrders_Interface $service, $request)
	{
		try {
			$response = $service->ListOrderItems($request);

			$dom = new DOMDocument();
			$dom->loadXML($response->toXML());
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;
			return $dom->saveXML();


		} catch (MarketplaceWebServiceOrders_Exception $ex) {
			echo("Caught Exception: " . $ex->getMessage() . "\n");
			echo("Response Status Code: " . $ex->getStatusCode() . "\n");
			echo("Error Code: " . $ex->getErrorCode() . "\n");
			echo("Error Type: " . $ex->getErrorType() . "\n");
			echo("Request ID: " . $ex->getRequestId() . "\n");
			echo("XML: " . $ex->getXML() . "\n");
			echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
		}
	}

	//===================================GET LIST ORDER=============================================================
	function getListOrders($search_condition) {
		$request = new MarketplaceWebServiceOrders_Model_ListOrdersRequest();
		$request->setSellerId(MERCHANT_ID);
		$request->setMarketplaceId(MARKETPLACE_ID);
		
		if ($search_condition['create_before']) {
			$request->getCreatedBefore($search_condition['create_before']);
		}
		
		if ($search_condition['create_after']) {
			$request->setCreatedAfter($search_condition['create_after']);
		}
		
		if ($search_condition['update_before']) {
			$request->setLastUpdatedBefore($search_condition['update_before']);
		}
		
		if ($search_condition['update_after']) {
			$request->setLastUpdatedAfter($search_condition['update_after']);
		}
		
		
		return $this->invokeListOrders($this->service, $request);
	}

	/**
	 * Get List Orders Action Sample
	 * Gets competitive pricing and related information for a product identified by
	 * the MarketplaceId and ASIN.
	 *
	 * @param MarketplaceWebServiceOrders_Interface $service instance of MarketplaceWebServiceOrders_Interface
	 * @param mixed $request MarketplaceWebServiceOrders_Model_ListOrders or array of parameters
	 */

	function invokeListOrders(MarketplaceWebServiceOrders_Interface $service, $request)
	{
		try {
			$response = $service->ListOrders($request);
			$dom = new DOMDocument();
			$dom->loadXML($response->toXML());
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;
			return $dom->saveXML();

		} catch (MarketplaceWebServiceOrders_Exception $ex) {
			echo("Caught Exception: " . $ex->getMessage() . "\n");
			echo("Response Status Code: " . $ex->getStatusCode() . "\n");
			echo("Error Code: " . $ex->getErrorCode() . "\n");
			echo("Error Type: " . $ex->getErrorType() . "\n");
			echo("Request ID: " . $ex->getRequestId() . "\n");
			echo("XML: " . $ex->getXML() . "\n");
			echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
		}
		return null;
	}




}
?>