<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function check_login()
{
	$CI = get_instance();
	if (!$CI->session->userdata('loginInfo')) {
		redirect('login');
	} else {
		return $CI->session->userdata('loginInfo');
	}
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



