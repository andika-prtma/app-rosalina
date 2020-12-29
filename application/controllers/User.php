<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){

	}

	public function changePassword(){
		
	}

	public function changeSite(){
		$data['title'] = 'Rosalina | Change Site';

		$user = [
			'email' => $this->session->userdata("email"),
			'auth' 	=> $this->db->auth
		];

		$data['site'] = business_unit($user)->data;

		$this->load->view('home/lte/header', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('user/change-site', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/home-index');
	}

	public function proc_site(){
		$site 	= $this->input->post('site');
		$button = $this->input->post('save');

		if ($button != 'save') {
			redirect('home');
		} else {
			$this->session->set_userdata(['site' => $site]);
			redirect('user/changeSite');
		}
	}

	public function profile(){
		$data['title'] 	= 'Rosalina | User Profile';
		$email 			= $this->session->userdata('email');
		$password 		= $this->session->userdata('password');
		$post = [
			'username' 	=> $email,
			'password' 	=> $password,
			'auth' 		=> $this->db->auth,
		];

		$x = [
			'email' => $email,
			'auth' 	=> $this->db->auth
		];

		$login = cek_login($post);
		$data['user'] = $login->data;
		$data['site'] = business_unit($x)->data;

		$this->load->view('home/lte/header', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('user/user-profile', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/home-index');
	}
}