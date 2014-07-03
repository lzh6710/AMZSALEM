<?php
class UserModel extends DataMapper {

	var $table = "user";

	function login($username, $password)
	{
		$userModel = new UserModel();
		$userModel->where('username', $username);
		$userModel->where('password', $password);
		$user = $userModel->get(1);
		return $user;
	}
	
	function find($username)
	{
		$userModel = new UserModel();
		$userModel->where('username', $username);
		$user = $userModel->get(1);
		return $user;
	}
	
	function getList()
	{
		$userModel = new UserModel();
		$user_list = $userModel->get();
		return $user_list;
	}
	
	function delete($username)
	{
		$this->db->where('username', $username);
		$this->db->delete('user');
	}
}
