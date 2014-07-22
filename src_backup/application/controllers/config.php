<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends CI_Controller {

	/**
	 * @author NNTrung
	 * @name __construct
	 * @todo
	 * @param
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		check_login(false);
		
		$amzConfig = new AmzConfig();
		$amz_config = $amzConfig->getData();
		$data = array();
		
		foreach ($amz_config as $row)
		{
		   $amzObject[$row->name] = $row->configValue;
		}

		$data['amzConfig'] = $amzObject;
		$this->layout->view('config', $data);
	}
	
	public function update()
	{
		check_login(false);
		$amzConfig = new AmzConfig();
		
		$amzConfig->where('name', 'AWS_ACCESS_KEY_ID');
		$config['configValue'] = trim($this->input->post('AWS_ACCESS_KEY_ID'));
		$amzConfig->update($config);
		
		$amzConfig->where('name', 'AWS_SECRET_ACCESS_KEY');
		$config['configValue'] = trim($this->input->post('AWS_SECRET_ACCESS_KEY'));
		$amzConfig->update($config);
		
		$amzConfig->where('name', 'MARKETPLACE_ID');
		$config['configValue'] = trim($this->input->post('MARKETPLACE_ID'));
		$amzConfig->update($config);
		
		$amzConfig->where('name', 'MERCHANT_ID');
		$config['configValue'] = trim($this->input->post('MERCHANT_ID'));
		$amzConfig->update($config);

		
		redirect('config');
	}
}