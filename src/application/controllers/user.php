<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
	
	public function management() {
		check_login();
		$this->layout->view('user_management');
	}

	public function logout() {
		$this->session->unset_userdata('loginInfo');
		$this->session->sess_destroy();
		redirect('login');
	}

	public function login()
	{
		checkAjax();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('remember', 'max_length[1]');

		if ($this->form_validation->run() == FALSE)
		{
			echo json_encode(array('st' => 0, 'msg' => $this->form_validation->error_array()));
		}
		else
		{
			$username  = $this->input->post('username');
			$password  = $this->input->post('password');
			$remember  = $this->input->post('remember');

			$userModel = new UserModel();
			$user = $userModel->login($username, $password);
			if ($user->result_count() == 0) {
				echo json_encode(array('st' => 0, 'msg' => 'Invalid username or password'));
			} else {
				$array = array(
						'username'   => $user->username,
						'name'       => $user->name,
						'email'      => $user->email,
						'phone'      => $user->phone,
						'address'    => $user->address,
						'isAdmin'    => $user->isAdmin,
						'isLoggedIn' => true
				);

				$cookie_name = 'siteAuth';
				if ($remember == 1) {
					delete_cookie($cookie_name); // Unset cookie of user
					$cookie_value = 'username='.$username.'&password='.$password;
					$cookie_time  = 3600*24*30; // 30 days.
					// set cookie
					$cookie = array(
							'name'   => $cookie_name,
							'value'  => $cookie_value,
							'expire' => time() + $cookie_time,
							'domain' => '',
							'path'   => '/',
							'prefix' => '',
					);
					set_cookie($cookie);
				} else {
					delete_cookie($cookie_name);
				}

				$this->session->set_userdata('loginInfo', $array);
				$url = site_url("home");
				echo json_encode(array('st' => 1, 'msg' => 'Successfully', 'url' => $url));
			}
		}
	}

}