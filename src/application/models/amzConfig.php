<?php
class AmzConfig extends DataMapper {

	var $table = "amz_config";

	function getData()
	{
		$amzConfig = new AmzConfig();
		$amz_config = $amzConfig->get();
		return $amz_config;
	}
	
	function deleteBy($name) {
		$this->db->where('name', $name);
		$this->db->delete('amz_config'); 
	}
	
}
