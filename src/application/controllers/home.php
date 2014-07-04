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
		$this->load->library('amazon_api');
	}

	public function index()
	{
		check_login(false);
		
		$this->layout->view('home');
	}
	
	public function SubmitFeed() {
		try{
			$result=$this->amazon_api->SubmitFeed();
        }
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
 
		print_r($result);
	}
}