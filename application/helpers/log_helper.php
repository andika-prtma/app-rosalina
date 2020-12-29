<?php 

function cek_status_login(){
	$ci = get_instance();

	$id = $ci->session->userdata('id_user');
	if (!$id) {
		redirect('login');
	}
}