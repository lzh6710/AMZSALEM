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
  
    $service = new MarketplaceWebService_Client(
		AWS_ACCESS_KEY_ID, 
		AWS_SECRET_ACCESS_KEY, 
		$config,
		APPLICATION_NAME,
		APPLICATION_VERSION
	);
  }
	
	
      
       

    
	
	 function PostFeed() {
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


		invokeSubmitFeed($service, $request);

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
				  
					echo ("Service Response\n");
					echo ("=============================================================================\n");

					echo("        SubmitFeedResponse\n");
					if ($response->isSetSubmitFeedResult()) { 
						echo("            SubmitFeedResult\n");
						$submitFeedResult = $response->getSubmitFeedResult();
						if ($submitFeedResult->isSetFeedSubmissionInfo()) { 
							echo("                FeedSubmissionInfo\n");
							$feedSubmissionInfo = $submitFeedResult->getFeedSubmissionInfo();
							if ($feedSubmissionInfo->isSetFeedSubmissionId()) 
							{
								echo("                    FeedSubmissionId\n");
								echo("                        " . $feedSubmissionInfo->getFeedSubmissionId() . "\n");
							}
							if ($feedSubmissionInfo->isSetFeedType()) 
							{
								echo("                    FeedType\n");
								echo("                        " . $feedSubmissionInfo->getFeedType() . "\n");
							}
							if ($feedSubmissionInfo->isSetSubmittedDate()) 
							{
								echo("                    SubmittedDate\n");
								echo("                        " . $feedSubmissionInfo->getSubmittedDate()->format(DATE_FORMAT) . "\n");
							}
							if ($feedSubmissionInfo->isSetFeedProcessingStatus()) 
							{
								echo("                    FeedProcessingStatus\n");
								echo("                        " . $feedSubmissionInfo->getFeedProcessingStatus() . "\n");
							}
							if ($feedSubmissionInfo->isSetStartedProcessingDate()) 
							{
								echo("                    StartedProcessingDate\n");
								echo("                        " . $feedSubmissionInfo->getStartedProcessingDate()->format(DATE_FORMAT) . "\n");
							}
							if ($feedSubmissionInfo->isSetCompletedProcessingDate()) 
							{
								echo("                    CompletedProcessingDate\n");
								echo("                        " . $feedSubmissionInfo->getCompletedProcessingDate()->format(DATE_FORMAT) . "\n");
							}
						} 
					} 
					if ($response->isSetResponseMetadata()) { 
						echo("            ResponseMetadata\n");
						$responseMetadata = $response->getResponseMetadata();
						if ($responseMetadata->isSetRequestId()) 
						{
							echo("                RequestId\n");
							echo("                    " . $responseMetadata->getRequestId() . "\n");
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
	 }
                                     
     
}
?>