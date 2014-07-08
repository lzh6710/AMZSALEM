<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * @author NNTrung
	 * @name __construct
	 * @todo
	 * @param
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('parser');
	}

	public function index()
	{
		check_login(false);
		$this->layout->view('home');
	}
	
	public function submitFeed() {
		try{
			$data = array(
				'MerchantIdentifier' => 'M_MWSTEST_49045593',
				'MessageType' => 'OrderFulfillment',
				'MessageID' => 1,
				'OperationType' => 'Update',
				'AmazonOrderID' => '002-3275191-2204215',
				'FulfillmentDate' => '2009-07-22T23:59:59-07:00',
				'CarrierName' => 'Contact Us for Details',
				'ShippingMethod' => 'Standard',
				'AmazonOrderItemCode' => 42197908407194,
				'Quantity' => 1
            );
			$feed = $this->parser->parse('xml/submitFeed_template', $data, TRUE);
			//$result=$this->amazon_api->submitFeed($feed);
			//$result=$this->amazon_api->getFeedSubmissionList();
			$result= $this->amazon_api->getFeedSubmissionResult('1045696523');
        }
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

		print_r($result);
	}
}