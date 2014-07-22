<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function check_login($checkAdmin) {
	$CI = get_instance();
	$user_info = $CI->session->userdata('loginInfo');
	if (!$user_info) {
		redirect('login');
	}
	
	if ($checkAdmin) {
		if ($user_info['isAdmin'] == 0) {
			show_404();
		}
	}
	
	return $user_info;
}

function isAjax() {
	return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest");
}

function checkAjax() {
	$CI = get_instance();
	if (!isAjax()) {
		show_404();
	}
}



function array_value($array, $index) {
	if (isset($array[$index])) {
		return $array[$index];
	}
	return null;
}