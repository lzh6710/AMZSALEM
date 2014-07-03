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
}
