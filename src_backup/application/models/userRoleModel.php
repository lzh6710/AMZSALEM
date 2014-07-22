<?php
class UserRoleModel extends DataMapper {
	var $table = "user_role";
	
	function findList($username)
	{
		$userRoleModel = new UserRoleModel();
		$userRoleModel->where('username', $username);
		$userRoles = $userRoleModel->get();
		return $userRoles;
	}
	
	function deleteBy($username) {
		$this->db->where('username', $username);
		$this->db->delete('user_role'); 
	}
}
