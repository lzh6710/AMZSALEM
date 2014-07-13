<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once ('.config.inc.php');

class Amazon_api
{
	public $serviceUrl = "https://mws.amazonservices.jp";
	public $service;

	public function __construct()
	{
		$config = array (
				'ServiceURL' => $this->serviceUrl,
				'ProxyHost' => null,
				'ProxyPort' => -1,
				'MaxErrorRetry' => 3
		);

		$this->service = new MarketplaceWebService_Client(
				AWS_ACCESS_KEY_ID,
				AWS_SECRET_ACCESS_KEY,
				$config,
				APPLICATION_NAME,
				APPLICATION_VERSION
		);
	}

	//===================================POST PRODUCT=============================================================
	
	//===================================UPDATE ORDER=============================================================
	function updateOrderStatus($feed) {
		return $this->submitFeed($feed, '_POST_ORDER_ACKNOWLEDGEMENT_DATA_');
	}
	
	function submitProduct($feed) {
		return $this->submitFeed($feed, '_POST_PRODUCT_DATA_');
	}
	
	function submitImage($feed) {
		return $this->submitFeed($feed, '_POST_PRODUCT_IMAGE_DATA_');
	}
	
	function submitPrice($feed) {
		return $this->submitFeed($feed, '_POST_PRODUCT_PRICING_DATA_');
	}
	
	function submitInventory($feed) {
		return $this->submitFeed($feed, '_POST_INVENTORY_AVAILABILITY_DATA_');
	}
	
	function submitFeed($feed, $type) {
		$marketplaceIdArray = array("Id" => array('A1VC38T7YXB528'));

		$feedHandle = @fopen('php://temp', 'rw+');
		fwrite($feedHandle, $feed);
		rewind($feedHandle);
		$request = new MarketplaceWebService_Model_SubmitFeedRequest();
		$request->setMerchant(MERCHANT_ID);
		$request->setMarketplaceIdList($marketplaceIdArray);
		$request->setFeedType($type);
		$request->setContentMd5(base64_encode(md5(stream_get_contents($feedHandle), true)));
		rewind($feedHandle);
		$request->setPurgeAndReplace(false);
		$request->setFeedContent($feedHandle);
		rewind($feedHandle);
			
		return $this->invokeSubmitFeed($this->service, $request);

		@fclose($feedHandle);
	}

	/**
	 * @param MarketplaceWebService_Interface $service instance of MarketplaceWebService_Interface
	 * @param mixed $request MarketplaceWebService_Model_SubmitFeed or array of parameters
	 */
	function invokeSubmitFeed(MarketplaceWebService_Interface $service, $request)
	{
		try {
			$response = $service->submitFeed($request);
			$result = array();

			if ($response->isSetSubmitFeedResult()) {
				$submitFeedResult = $response->getSubmitFeedResult();
				$result['submitFeedResult'] = $submitFeedResult;

				if ($submitFeedResult->isSetFeedSubmissionInfo()) {
					$feedSubmissionInfo = $submitFeedResult->getFeedSubmissionInfo();
					$result['feedSubmissionInfo'] = $feedSubmissionInfo;

					if ($feedSubmissionInfo->isSetFeedSubmissionId())
					{
						$result['FeedSubmissionId'] = $feedSubmissionInfo->getFeedSubmissionId();
					}

					if ($feedSubmissionInfo->isSetFeedType())
					{
						$result['FeedType'] = $feedSubmissionInfo->getFeedType();
					}

					if ($feedSubmissionInfo->isSetSubmittedDate())
					{
						$result['SubmittedDate'] = $feedSubmissionInfo->getSubmittedDate()->format(DATE_FORMAT);
					}

					if ($feedSubmissionInfo->isSetFeedProcessingStatus())
					{
						$result['FeedProcessingStatus'] = $feedSubmissionInfo->getFeedProcessingStatus();
					}

					if ($feedSubmissionInfo->isSetStartedProcessingDate())
					{
						$result['StartedProcessingDate'] = $feedSubmissionInfo->getStartedProcessingDate()->format(DATE_FORMAT);
					}

					if ($feedSubmissionInfo->isSetCompletedProcessingDate())
					{
						$result['CompletedProcessingDate'] = $feedSubmissionInfo->getCompletedProcessingDate()->format(DATE_FORMAT);
					}
				}
			}
			if ($response->isSetResponseMetadata()) {
				$result['getResponseMetadata'] = $response->getResponseMetadata();

				if ($response->getResponseMetadata()->isSetRequestId())
				{
					$result['RequestId'] = $response->getResponseMetadata()->getRequestId();
				}
			}

		} catch (MarketplaceWebService_Exception $ex) {
			echo("Caught Exception: " . $ex->getMessage() . "\n");
			echo("Response Status Code: " . $ex->getStatusCode() . "\n");
			echo("Error Code: " . $ex->getErrorCode() . "\n");
			echo("Error Type: " . $ex->getErrorType() . "\n");
			echo("Request ID: " . $ex->getRequestId() . "\n");
			echo("XML: " . $ex->getXML() . "\n");
		}

		return $result;
	}


	//===================================GET LIST PRODUCT=============================================================

	function getFeedSubmissionListById($ids) {
		$parameters = array (
				'Merchant' => MERCHANT_ID
		);
	
		$request = new MarketplaceWebService_Model_GetFeedSubmissionListRequest($parameters);
		$idList = new MarketplaceWebService_Model_IdList();
		$idList->setId($ids);
		$request->setFeedSubmissionIdList($idList);
		return $this->invokeGetFeedSubmissionList($this->service, $request);
	}

	function getFeedSubmissionList() {
		$parameters = array (
				'Merchant' => MERCHANT_ID,
				'FeedProcessingStatusList' => array ('Status' => array ('_DONE_')),
		);

		$request = new MarketplaceWebService_Model_GetFeedSubmissionListRequest($parameters);
		return $this->invokeGetFeedSubmissionList($this->service, $request);
	}

	/**
	 *
	 * @param MarketplaceWebService_Interface $service instance of MarketplaceWebService_Interface
	 * @param mixed $request MarketplaceWebService_Model_GetFeedSubmissionList or array of parameters
	 */
	function invokeGetFeedSubmissionList(MarketplaceWebService_Interface $service, $request)
	{
		$result = array();
		try {
			$response = $service->getFeedSubmissionList($request);
			
			if ($response->isSetGetFeedSubmissionListResult()) {
				$getFeedSubmissionListResult = $response->getGetFeedSubmissionListResult();
				if ($getFeedSubmissionListResult->isSetNextToken())
				{
					$result['NextToken'] =  $getFeedSubmissionListResult->getNextToken();
				}

				if ($getFeedSubmissionListResult->isSetHasNext())
				{
					$result['HasNext'] =  $getFeedSubmissionListResult->getHasNext();
				}

				$result['feedSubmissionInfoList'] =  array();
				$feedSubmissionInfoList = $getFeedSubmissionListResult->getFeedSubmissionInfoList();
				foreach ($feedSubmissionInfoList as $key => $feedSubmissionInfo) {
					if ($feedSubmissionInfo->isSetFeedSubmissionId())
					{
						$result['feedSubmissionInfoList'][$key]['FeedSubmissionId'] = $feedSubmissionInfo->getFeedSubmissionId();
					}
					if ($feedSubmissionInfo->isSetFeedType())
					{
						$result['feedSubmissionInfoList'][$key]['FeedType'] = $feedSubmissionInfo->getFeedType();
					}
					if ($feedSubmissionInfo->isSetSubmittedDate())
					{
						$result['feedSubmissionInfoList'][$key]['SubmittedDate'] = $feedSubmissionInfo->getSubmittedDate()->format(DATE_FORMAT);
					}
					if ($feedSubmissionInfo->isSetFeedProcessingStatus())
					{
						$result['feedSubmissionInfoList'][$key]['FeedProcessingStatus'] = $feedSubmissionInfo->getFeedProcessingStatus();
					}
					if ($feedSubmissionInfo->isSetStartedProcessingDate())
					{
						$result['feedSubmissionInfoList'][$key]['StartedProcessingDate'] = $feedSubmissionInfo->getStartedProcessingDate()->format(DATE_FORMAT);
					}
					if ($feedSubmissionInfo->isSetCompletedProcessingDate())
					{
						$result['feedSubmissionInfoList'][$key]['CompletedProcessingDate'] = $feedSubmissionInfo->getCompletedProcessingDate()->format(DATE_FORMAT);
					}
				}
			}
			if ($response->isSetResponseMetadata()) {
				$responseMetadata = $response->getResponseMetadata();
				if ($responseMetadata->isSetRequestId())
				{
					$result['RequestId'] = $responseMetadata->getRequestId();
				}
			}

		} catch (MarketplaceWebService_Exception $ex) {
			echo("Caught Exception: " . $ex->getMessage() . "<br>");
			echo("Response Status Code: " . $ex->getStatusCode() . "<br>");
			echo("Error Code: " . $ex->getErrorCode() . "<br>");
			echo("Error Type: " . $ex->getErrorType() . "<br>");
			echo("Request ID: " . $ex->getRequestId() . "<br>");
			echo("XML: " . $ex->getXML() . "<br>");
		}

		return $result;
	}


	//=========================================GET PRODUCT=======================================================

	function getFeedSubmissionResult($feedSubmissionId) {
		$fileHandle = fopen('php://memory', 'rw+');
		$parameters = array (
				'Merchant' => MERCHANT_ID,
				'FeedSubmissionId' => $feedSubmissionId
		);
		
		$request = new MarketplaceWebService_Model_GetFeedSubmissionResultRequest($parameters);
		$request->setFeedSubmissionResult($fileHandle);
		
		$result = $this->invokeGetFeedSubmissionResult($this->service, $request);
		rewind($fileHandle);
		$responseStr = stream_get_contents($fileHandle);
		$responseXML = new SimpleXMLElement($responseStr);
		return $responseXML;
	}

	/**
	 *
	 * @param MarketplaceWebService_Interface $service instance of MarketplaceWebService_Interface
	 * @param mixed $request MarketplaceWebService_Model_GetFeedSubmissionResult or array of parameters
	 */
	function invokeGetFeedSubmissionResult(MarketplaceWebService_Interface $service, $request)
	{
		
		$result = array();
		try {
			$response = $service->getFeedSubmissionResult($request);
			if ($response->isSetGetFeedSubmissionResultResult()) {
				$getFeedSubmissionResultResult = $response->getGetFeedSubmissionResultResult();
				if ($getFeedSubmissionResultResult->isSetContentMd5()) {
					$result['ContentMd5'] = $getFeedSubmissionResultResult->getContentMd5();
				}
			}
			if ($response->isSetResponseMetadata()) {
				$responseMetadata = $response->getResponseMetadata();
				$result['ResponseMetadata'] = $responseMetadata;
				if ($responseMetadata->isSetRequestId())
				{
					$result['RequestId'] = $responseMetadata->getRequestId();
				}
			}

		} catch (MarketplaceWebService_Exception $ex) {
			echo("Caught Exception: " . $ex->getMessage() . "\n");
			echo("Response Status Code: " . $ex->getStatusCode() . "\n");
			echo("Error Code: " . $ex->getErrorCode() . "\n");
			echo("Error Type: " . $ex->getErrorType() . "\n");
			echo("Request ID: " . $ex->getRequestId() . "\n");
			echo("XML: " . $ex->getXML() . "\n");
		}
		
		return $result;
	}
}
?>