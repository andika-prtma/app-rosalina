<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("superadmin_model");
		$this->load->model("spd_model");
		cek_status_login();
	}

	public function index2(){
		$data['title'] = 'Rosalina Dashboard';
		
		$this->load->view('home/header', $data);
		$this->load->view('home/sidebar');
		$this->load->view('home/topbar');
		$this->load->view('home/index');
		$this->load->view('home/footer-content');
		$this->load->view('home/footer', $data);
	}

	public function index(){
		$data['title'] 	= 'Rosalina Dashboard';
		$data['spd2'] 	= $this->db->get_where('tbl_spd', ['request_by' => $this->session->userdata('id_user')])->result();
		$data['spd'] 	= $this->spd_model->sss($this->session->userdata('id_user'))->result();
		$data['mobil'] 	= $this->spd_model->getCarLocation('tbl_mbl');
		$data['location'] = $this->db->get('tbl_mbl_location');
		$data['driver'] = $this->db->get('tbl_mbl_driver');
		
		$this->load->view('header/home-index', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('home/lte/index');
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/home-index', $data);
	}
	
}