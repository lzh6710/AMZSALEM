<?php 
include_once ('./.config.inc.php'); 

$config = array (
		'ServiceURL' => $serviceUrl,
		'ProxyHost' => null,
		'ProxyPort' => -1,
		'MaxErrorRetry' => 3,
);

// Japan
$serviceUrl = "https://mws.amazonservices.jp";

/************************************************************************
 * Instantiate Implementation of MarketplaceWebService
*
* AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY constants
* are defined in the .config.inc.php located in the same
* directory as this sample
***********************************************************************/
$service = new MarketplaceWebService_Client(
		AWS_ACCESS_KEY_ID,
		AWS_SECRET_ACCESS_KEY,
		$config,
		APPLICATION_NAME,
		APPLICATION_VERSION);

class AmzAdapter {
	function addProduct($product) {
		
	}
}