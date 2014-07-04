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
	
	function SubmitFeed() {
		$feed = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<AmazonEnvelope xsi:noNamespaceSchemaLocation="amzn-envelope.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
	<Header>
		<DocumentVersion>1.01</DocumentVersion>
		<MerchantIdentifier>M_MWSTEST_49045593</MerchantIdentifier>
	</Header>
	<MessageType>OrderFulfillment</MessageType>
	<Message>
		<MessageID>1</MessageID>
		<OperationType>Update</OperationType>
		<OrderFulfillment>
			<AmazonOrderID>002-3275191-2204215</AmazonOrderID>
			<FulfillmentDate>2009-07-22T23:59:59-07:00</FulfillmentDate>
			<FulfillmentData>
				<CarrierName>Contact Us for Details</CarrierName>
				<ShippingMethod>Standard</ShippingMethod>
			</FulfillmentData>
			<Item>
				<AmazonOrderItemCode>42197908407194</AmazonOrderItemCode>
				<Quantity>1</Quantity>
			</Item>
		</OrderFulfillment>
	</Message>
</AmazonEnvelope>
EOD;
		$marketplaceIdArray = array("Id" => array('A1VC38T7YXB528'));
		
		$feedHandle = @fopen('php://temp', 'rw+');
			fwrite($feedHandle, $feed);
			rewind($feedHandle);
			$request = new MarketplaceWebService_Model_SubmitFeedRequest();
			$request->setMerchant(MERCHANT_ID);
			$request->setMarketplaceIdList($marketplaceIdArray);
			$request->setFeedType('_POST_PRODUCT_DATA_');
			$request->setContentMd5(base64_encode(md5(stream_get_contents($feedHandle), true)));
			rewind($feedHandle);
			$request->setPurgeAndReplace(false);
			$request->setFeedContent($feedHandle);
			rewind($feedHandle);
			
			return $this->invokeSubmitFeed($this->service, $request);
	
		@fclose($feedHandle);
	}
	
	/**
	 * Submit Feed Action Sample
	 * Uploads a file for processing together with the necessary
	 * metadata to process the file, such as which type of feed it is.
	 * PurgeAndReplace if true means that your existing e.g. inventory is
	 * wiped out and replace with the contents of this feed - use with
	 * caution (the default is false).
	 *   
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
			
			return $result;
		 } catch (MarketplaceWebService_Exception $ex) {
			 echo("Caught Exception: " . $ex->getMessage() . "\n");
			 echo("Response Status Code: " . $ex->getStatusCode() . "\n");
			 echo("Error Code: " . $ex->getErrorCode() . "\n");
			 echo("Error Type: " . $ex->getErrorType() . "\n");
			 echo("Request ID: " . $ex->getRequestId() . "\n");
			 echo("XML: " . $ex->getXML() . "\n");
		 }
	 }
}
?>