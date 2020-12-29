<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index(){

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Rosalina Login';
			$this->load->view('login/login', $data);
			
		} else {
			$this->_login();
		}
	}

	private function _login(){
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');

		$post = [
			'username' 	=> $email,
			'password' 	=> $password,
			'auth' 		=> $this->db->auth,
		];

		$login = cek_login($post);

		if ($login){
			if ($login->status == '404') {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$login->message.'</div>');
				redirect('login');
			} else {
				$bunit = [
					'email' 	=> $email,
					'auth' 		=> $this->db->auth,
				];

				$bu  = business_unit($bunit)->data[0];
				$cek = $this->m_login->getDataByEmail($login->data->username);

					if ($cek->num_rows() > 0) {
						$user = [
							'id_user' 		=> $cek->row()->ID,
							'id_role' 		=> $cek->row()->id_role,
							'name'			=> $cek->row()->first_name.' '.$cek->row()->last_name,
							'email'			=> $cek->row()->email,
							'site'			=> $bu->prefix,
							'business_unit' => $bu->business_unit
						];
						$this->session->set_userdata($user);
						$this->m_login->updateLastLogin($cek->row()->ID);
						
					} else {
						$insert = [
							'email' 		=> $login->data->username,
							'first_name' 	=> $login->data->first_name,
							'last_name' 	=> $login->data->last_name,
							'id_role'		=> 2,
							'last_login' 	=> time(),
							'created_at' 	=> time()
						];

						$id_insert 	= $this->m_login->insertDataUser($insert);
						$user 		= $this->m_login->getDataByID($id_insert)->row();

						$ses = [
							'id_user' 		=> $user->ID,
							'id_role' 		=> $user->id_role,
							'name'			=> $user->first_name.' '.$user->last_name,
							'email'			=> $user->email,
							'site'			=> $bu->prefix,
							'business_unit' => $bu->business_unit
						];

						$this->session->set_userdata($ses);
					}
					redirect('home');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">SSO Server Bermasalah</div>');
			redirect('login');	
		}	
	}

	public function logout(){
		$this->session->unset_userdata(['id_user', 'name', 'email', 'site']);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout!</div>');
		redirect('login');
	}

}
