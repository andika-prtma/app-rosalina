<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ga3 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("m_superadmin");
		$this->load->model("m_spd");
		$this->load->model("ga_model");
	}

	public function index(){

		$data['title'] = 'Rosalina Dashboard';
		$this->load->view('home/header', $data);
		$this->load->view('home/sidebar');
		$this->load->view('home/topbar');
		$this->load->view('home/index');
		$this->load->view('home/footer-content');
		$this->load->view('home/footer');
		
	}

	public function all(){
		$data['title'] = 'List SPD';
		$data['spd'] = $this->db->get('tbl_spd')->result();

		$this->load->view('spd/structure/header-list', $data);
		$this->load->view('home/sidebar');
		$this->load->view('home/topbar');
		$this->load->view('ga/list', $data);
		$this->load->view('home/footer-content');
		$this->load->view('spd/structure/footer-list');
	}

	public function driver2(){
		$data['title'] = 'List Driver';
		$data['driver'] = $this->db->get('tbl_mbl_driver');

		$this->load->view('spd/structure/header-list', $data);
		$this->load->view('home/sidebar');
		$this->load->view('home/topbar');
		$this->load->view('ga/driver', $data);
		$this->load->view('home/footer-content');
		$this->load->view('spd/structure/footer-list');	
	}

	public function driver(){
		$data['title'] = 'List Driver';
		$data['driver'] = $this->db->get('tbl_mbl_driver');
		$data['location'] = $this->db->get('tbl_mbl_location');

		$this->load->view('header/home-index', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('ga/lte/driver', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/home-index');
	}

	public function addDriver(){
		$driver = [
			'name' => $this->input->post("name_driver"),
			'contact' => $this->input->post("contact"),
			'status' => $this->input->post("active"),
			'created_at' => time()
		];

		$this->db->insert('tbl_mbl_driver', $driver);
		redirect('ga/driver');
	}

	public function kendaraan2(){
		$data['title'] = 'List Kendaraan';
		$data['mobil'] = $this->m_spd->getCarLocation('tbl_mbl');
		$data['location'] = $this->db->get('tbl_mbl_location');

		$this->load->view('spd/structure/header-list', $data);
		$this->load->view('home/sidebar');
		$this->load->view('home/topbar');
		$this->load->view('ga/kendaraan', $data);
		$this->load->view('home/footer-content');
		$this->load->view('spd/structure/footer-list');	
	}

	public function kendaraan(){
		$data['title'] = 'List Kendaraan';
		$data['mobil'] = $this->m_spd->getCarLocation('tbl_mbl');
		$data['location'] = $this->db->get('tbl_mbl_location');

		$this->load->view('header/home-index', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('ga/lte/kendaraan', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/home-index');
	}

	public function addKendaraan(){
		$mbl = [
			'name_mbl' => $this->input->post('name_mobil'),
			'id_mbl_location' => $this->input->post('location'), 
			'nmr_plat' => $this->input->post('plat'),
			'status' => $this->input->post('active'),
			'created_at' => time()
		];

		$this->db->insert('tbl_mbl', $mbl);
		redirect('ga/kendaraan');
	}

	public function allocationDriver2(){
		$data['title'] = 'Alocation Driver';
		$data['spd'] = $this->db->get('tbl_spd')->result();
		$data['location'] = $this->db->get('tbl_mbl_location');

		$this->load->view('spd/structure/header-list', $data);
		$this->load->view('home/sidebar');
		$this->load->view('home/topbar');
		$this->load->view('ga/allocation', $data);
		$this->load->view('home/footer-content');
		$this->load->view('spd/structure/footer-list');	
	}

	public function alocationDriver(){
		$data['title'] = 'Alocation Driver';
		$data['spd'] = $this->db->get('tbl_spd')->result();
		$data['location'] = $this->db->get('tbl_mbl_location');

		$this->load->view('header/home-index', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('ga/lte/allocation', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/home-index');	
	}

	public function report(){
		$data['get'] = $this->input->get('contoh');
		$data['lagi'] = $this->input->get('lagi');
		$data['spd'] = '';
		$data['spd2'] = '';

		if ($this->input->post("submit") != null) {
			$pisah  = explode('-', $this->input->post('periode'));
			$start  = $pisah[0]; 
			$end  	= $pisah[1];
			$x = $this->cvtDate($pisah[0]);
			$y = $this->cvtDate($pisah[1]);
			$data['jajal']  = $this->cvtDate($start)." xxxxxxxxx ".$this->cvtDate($end);
			$data['test'] 	= $this->ga_model->searchByDate($x, $y);

			$data['spd'] = $this->ga_model->searchByDate($x, $y)->result();
			$data['spd2'] = $this->ga_model->cariData($x, $y);
		}

		$data['title'] = 'SPD Report';
		$data['mobil'] = $this->m_spd->getCarLocation('tbl_mbl');
		$data['location'] = $this->db->get('tbl_mbl_location');
		$data['driver'] = $this->db->get('tbl_mbl_driver');

		$this->load->view('header/ga-report', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('ga/lte/report', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/ga-report');
	}

	function convert($date){
		$date = explode("/", str_replace(" ", "", $date));
		$tgl  = $date[1];
		$bln  = $date[0];
		$thn  = $date[2];
		$tanggal = $thn.'/'.$bln.'/'.$tgl;
		return $tanggal;
	}

	function cvtDate($tgl){
		$tanggal = date('Y/m/d', strtotime($tgl));
		return $tanggal;
	}

	function fillter(){
		if ($site != null) {
		
		}
	}

	function noteQuery(){
		$data['filter'] = $this->db->query("SELECT * FROM tbl_spd WHERE DATE(`departure_date`)>='$x' and DATE(`departure_date`)<='$y' ");
	}

	public function tes(){
		$data['title'] = 'tes';
		$data['mobil'] = $this->m_spd->getCarLocation('tbl_mbl');
		$data['driver'] = $this->db->get('tbl_mbl_driver');
		$this->load->view('header/ga-report', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('ga/lte/report', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/ga-report');
	}
}