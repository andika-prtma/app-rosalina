<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ga extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("m_superadmin");
		$this->load->model("spd_model");
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
		$data['mobil'] = $this->spd_model->getCarLocation('tbl_mbl');
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
		$data['mobil'] = $this->spd_model->getCarLocation('tbl_mbl');
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
		$data['spd2'] = $this->ga_model->dataSPDwithUserName()->result();
		$data['location'] = $this->db->get('tbl_mbl_location');

		$this->load->view('header/home-index', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('ga/lte/allocation', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/home-index');	
	}

	public function setProses(){
		if ($this->input->post('cancel') == '0') {
			redirect('ga/alocationDriver');
		}
		$id = $this->input->post('id_spd');
		$id_place = $this->input->post('id_place');
		$dept_driver = $this->input->post('dept_driver');
		$dept_mobil = $this->input->post('dept_mobil');
		$return_driver = $this->input->post('return_driver');
		$return_mobil =$this->input->post('return_mobil');

		$this->db->set('driver_pickup', $dept_driver);
		$this->db->set('mobil_pickup', $dept_mobil);
		$this->db->set('driver_destination', $return_driver);
		$this->db->set('mobil_destination', $return_mobil);
		$this->db->where('ID', $id_place);
		$this->db->update('tbl_place');
		redirect('ga/alocationDriver');
	}

	public function setDriver($id){
		$data['title'] 			= 'Set Driver';
		//$data['project'] 		= get_data('project')->data;
		//$data['cost_center'] 	= get_data('cost')->data;
		//$data['users'] 		= get_data('users')->data;

		$data['driver'] 		= $this->db->get('tbl_mbl_driver');
		$data['kendaraan'] 		= $this->db->get('tbl_spd_kendaraan');
		$data['mobil'] 			= $this->spd_model->getCarLocation();
		$data['spd']			= $this->ga_model->existingSpd($id)->row();
		$data['swal']			= null;
		if (!$this->session->userdata('site')) {
			$data['swal'] = 'swal';
		}

		$this->load->view('header/spd-create', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('ga/lte/assign_driver', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/spd-create');
	}

	public function report(){
		$data['get'] = $this->input->get('contoh');
		$data['lagi'] = $this->input->get('lagi');
		$data['spd'] = '';
		$data['spd2'] = '';

		if ($this->input->get("submit") != null) {
			$pisah  = explode('-', $this->input->get('periode'));
			$start  = $pisah[0]; 
			$end  	= $pisah[1];
			$x = $this->cvtDate($pisah[0]);
			$y = $this->cvtDate($pisah[1]);
			$data['jajal']  = $this->cvtDate($start)." xxxxxxxxx ".$this->cvtDate($end);
			$data['test'] 	= $this->ga_model->searchByDate($x, $y);

			$data['spd'] = $this->ga_model->searchByDate($x, $y)->result();
			$data['spd2'] = $this->ga_model->cariData2($x, $y);
		}

		$current = current_url();
		$full = $this->get_link();
		$data['url']   = str_replace($current,"",$full);

		$data['title'] = 'SPD Report';
		$data['mobil'] = $this->spd_model->getCarLocation('tbl_mbl');
		$data['location'] = $this->db->get('tbl_mbl_location');
		$data['driver'] = $this->db->get('tbl_mbl_driver');

		$this->load->view('header/ga-report', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('ga/lte/report2', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/ga-report');
	}

	public function get_link(){
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
		    $link = "https"; 
		else
		    $link = "http"; 
		  
		// Here append the common URL characters. 
		$link .= "://"; 
		  
		// Append the host(domain name, ip) to the URL. 
		$link .= $_SERVER['HTTP_HOST']; 
		  
		// Append the requested resource location to the URL 
		$link .= $_SERVER['REQUEST_URI']; 
		      
		// Print the link 
		return $link; 
	}

	public function exportExcel(){
	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();

	    // Settingan awal fil excel
	    $excel->getProperties()->setCreator('My Notes Code')
	                 ->setLastModifiedBy('My Notes Code')
	                 ->setTitle("Data SPD Report")
	                 ->setSubject("Rosalina");

	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SPD REPORT"); // Set kolom A1 dengan tulisan "DATA SISWA"
	    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nomor SPD"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('C3', "For Name"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('D3', "Description"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Project"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('F3', "Departure"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('G3', "Return"); 
	    

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);

	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	    
	 	$pisah  = explode('-', $this->input->get('periode'));
		$start  = $pisah[0]; 
		$end  	= $pisah[1];
		$x = $this->cvtDate($pisah[0]);
		$y = $this->cvtDate($pisah[1]);
	 	$peserta = $this->ga_model->cariData2($x, $y)->result();

		// $peserta = $this->db->get('tbl_spd')->result();

	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
	    foreach($peserta as $data){ // Lakukan looping pada variabel siswa
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      // $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $this->input->get('periode'));
	      // $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, 'ada');
	      // $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, 'ada');
	      // $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, 'ada');
	      // $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, 'ada');
	      // $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, 'ada');

	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nomor_spd);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->first_name);
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->agenda);
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->project);
	      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->departure_date);
	      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->expected_date);
	      
	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }

	    // Set width kolom
	    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
	    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
	    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
	    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(5); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(5); // Set width kolom E	    
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

	    // Set orientasi kertas jadi LANDSCAPE
	    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

	    // Set judul file excel nya
	    $excel->getActiveSheet(0)->setTitle("Data REPORT SPD");
	    $excel->setActiveSheetIndex(0);

	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="REPORT SPD.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');

	    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	    $write->save('php://output');

	}

	public function tester(){
		$data['get'] = $this->input->get('contoh');
		$data['lagi'] = $this->input->get('lagi');
		$data['spd'] = '';
		$data['spd2'] = '';

		if ($this->input->get("submit") != null) {
			$pisah  = explode('-', $this->input->get('periode'));
			$start  = $pisah[0]; 
			$end  	= $pisah[1];
			$x = $this->cvtDate($pisah[0]);
			$y = $this->cvtDate($pisah[1]);
			$data['jajal']  = $this->cvtDate($start)." xxxxxxxxx ".$this->cvtDate($end);
			$data['test'] 	= $this->ga_model->searchByDate($x, $y);

			$data['spd'] = $this->ga_model->searchByDate($x, $y)->result();
			$data['spd2'] = $this->ga_model->cariData2($x, $y);
		}

		$data['title'] = 'SPD Report';
		$data['mobil'] = $this->spd_model->getCarLocation('tbl_mbl');
		$data['location'] = $this->db->get('tbl_mbl_location');
		$data['driver'] = $this->db->get('tbl_mbl_driver');

		$this->load->view('header/ga-report', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('ga/lte/report-excel', $data);
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
		$data['mobil'] = $this->spd_model->getCarLocation('tbl_mbl');
		$data['driver'] = $this->db->get('tbl_mbl_driver');
		$this->load->view('header/ga-report', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('ga/lte/report', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/ga-report');
	}
}