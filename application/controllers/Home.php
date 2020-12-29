<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("m_superadmin");
		$this->load->model("m_spd");
		cek_status_login();
	}

	public function index(){
		$data['title'] 		= 'Rosalina Dashboard';
		$data['spd2'] 		= $this->db->get_where('tbl_spd', ['request_by' => $this->session->userdata('id_user')])->result();
		$data['spd'] 		= $this->m_spd->sss($this->session->userdata('id_user'))->result();
		$data['mobil'] 		= $this->m_spd->getCarLocation('tbl_mbl');
		$data['location'] 	= $this->db->get('tbl_mbl_location');
		$data['driver'] 	= $this->db->get('tbl_mbl_driver');

		$data['submitSPD']	= $this->m_spd->getSpdByStatus(1);
		$data['draftSPD']	= $this->m_spd->getSpdByStatus(0);
		
		$this->load->view('header/home-index', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('home/lte/index');
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/home-index', $data);
	}
	
}