<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
	}

	public function index()
	{
		$this->load->helper(array('form'));
		if ($this->session->userdata('loginInfo')) {
			redirect('home');
		} else {
			$user_info = array(
					'username'  => '',
					'password'	=> '',
					'remember'  => 0
			);
			$cookie_name = 'siteAuth';
			// Check if the cookie exists
			if(get_cookie($cookie_name, TRUE)){
				parse_str(get_cookie($cookie_name, TRUE), $a_User);
				// Register the session
				$user_info = array(
						'username'  => $a_User['username'],
						'password'	=> $a_User['password'],
						'remember'  => 1
				);
			}
			$this->load->view('login', $user_info);
		}
	}
}