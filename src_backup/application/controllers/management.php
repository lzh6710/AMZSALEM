<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Management extends CI_Controller {

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
		$this->layout->view('user_management', $data);
	}
	
	public function add() {
		$data = array();
		$data['is_edit'] = false;
		$userModel = new UserModel();
		$userRoleModel = new UserRoleModel();
			
		if (!$this->input->post()) {
			$userModel->isActive = 1;
			$userModel->isAdmin = 0;
	
			$data['user'] = $userModel;
			$data['userRole'] = $userRoleModel;
			$this->layout->view('user_form', $data);
		} else {
			$this->validation($data, $userModel, $userRoleModel, false);
		}
	}
	
	public function edit() {
		if ($this->input->post('username')) {
			$data = array();
			$data['is_edit'] = true;
			$userModel = new UserModel();
			$userRoleModel = new UserRoleModel();

			if ($this->input->post('fromList')) {
				$username = $this->input->post('username');
				$user = $userModel->find($username);
				$userRoles = $userRoleModel->findList($username);
				foreach ($userRoles as $key => $role) {
					$roleid = $role->roleid;
					$userRoleModel->$roleid = 1;
				}
				unset($user->password);
				$data['userRole'] = $userRoleModel;
				$data['user'] = $user;
				$this->layout->view('user_form', $data);
			} else {
				$this->validation($data, $userModel, $userRoleModel, true);
			}
		} else {
			redirect('management/add');
		}
	}
	
	public function delete() {
		if ($this->input->post('username')) {
			$username = $this->input->post('username');
			$userModel = new UserModel();
			$userModel->delete($username);
			$userRoleModel = new UserRoleModel();
			$userRoleModel->deleteBy($username);
		}
		redirect('management');
	}
	
	private function validation($data, $userModel, $userRoleModel, $is_update) {
		$roles = unserialize(ROLES);
		$this->load->library('form_validation');
		
		$password = $this->input->post('password');
		$passconf = $this->input->post('passconf');
		
		$update_password = false;
		if ($this->input->post('password') || $this->input->post('passconf')) {
			$update_password = true;
		}
		
		if (($is_update && $update_password) ||  !$is_update) {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]'); 
			$this->form_validation->set_rules('passconf', 'Password Confirm', 'trim|required');
		}
		
		$this->form_validation->set_rules('username', 'Username', 'callback_username_check['.$is_update.']|trim|required|min_length[1]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('isActive', 'Status', 'trim|required|numeric|min_length[1]|max_length[1]');
		$this->form_validation->set_rules('isAdmin', 'Role', 'trim|required|numeric|min_length[1]|max_length[1]');
		
		$userModel->name = trim($this->input->post('name'));
		$userModel->username = trim($this->input->post('username'));
		$userModel->password = trim($this->input->post('password'));
		$userModel->passconf = trim($this->input->post('passconf'));
		$userModel->email = trim($this->input->post('email'));
		$userModel->phone = trim($this->input->post('phone'));
		$userModel->address = trim($this->input->post('address'));
		$userModel->isActive = trim($this->input->post('isActive'));
		$userModel->isAdmin = trim($this->input->post('isAdmin'));
		
		$roles = unserialize(ROLES);
		if($this->form_validation->run() == false) {
			$data['user'] = $userModel;
			if ($this->input->post('role')) {
				foreach ($this->input->post('role') as $key => $value) {
					if (in_array($value, $roles)) {
						$userRoleModel->$value = 1;
					}
				}
			}
			
			$data['userRole'] = $userRoleModel;
			$this->layout->view('user_form', $data);
		} else {
			if ($is_update) {
				$user = array();
				$userModel->where('username', $userModel->username);
				$user['name'] = trim($this->input->post('name'));
				$user['email'] = trim($this->input->post('email'));
				if ($update_password) {
					$user['password'] = md5(trim($this->input->post('password')));
				}
				$user['phone'] = trim($this->input->post('phone'));
				$user['address'] = trim($this->input->post('address'));
				$user['isActive'] = trim($this->input->post('isActive'));
				$user['isAdmin'] = trim($this->input->post('isAdmin'));
				$userModel->update($user);
			} else {
				$userModel->password = md5($userModel->password);
				$userModel->save();
			}
			
			if ($is_update) {
				$userRoleModel->deleteBy($userModel->username);
			}
			if ($this->input->post('role')) {
				foreach ($this->input->post('role') as $key => $value) {
					if (in_array($value, $roles)) {
						$userRoleModel = new UserRoleModel();
						$userRoleModel->username = $userModel->username;
						$userRoleModel->roleid = $value;
						$userRoleModel->save();
					}
				}
			}
			redirect('management');
		}
	}
	
	function username_check($username, $is_update){
		if ($is_update) {
			return true;
		}
		
		$userModel = new UserModel();
		$user = $userModel->find($username);
		if ($user->result_count() == 1) {
			$this->form_validation->set_message('username_check', 'The %s is exist');
			return false;
		} else {
			return true;
		}
	}
}