<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AmzProductList extends CI_Controller {

	/**
	 * @author NNTrung
	 * @name __construct
	 * @todo
	 * @param
	 */
	public function __construct()
	{
		parent::__construct();
		check_login(true);
	}
	
	public function index() {
		$userModel = new UserModel();
		$user_list = $userModel->getList();
		
		$data = array();
		$data['user_list'] = $user_list;
		$this->layout->view('amz_product_list', $data);
	}
}