<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('role_id') != 1 and $this->session->userdata('role_id') != 6) {
				redirect('welcome');
			}
		$this->load->model('data_bimbingan');
		$this->load->model('data_pelanggaran');
		$this->load->model('data_prestasi');
		$this->load->model('data_siswa');
		$this->load->model('data_guru');
		$this->load->helper(array('url'));
	}

	public function index()
	{ 
		$jpel=$this->db->query('select count(*) as jpel from bimpel where id_jbimpel="JBP002"')->row()->jpel;
		$jbim=$this->db->query('select count(*) as jbim from bimpel where id_jbimpel="JBP001"')->row()->jbim;
		$data = array(
			'n_siswa' => $this->data_siswa->count_rows(),
			'n_pelanggaran' => $jpel,
			'n_bimbingan' => $jbim,
			'n_prestasi' => $this->data_prestasi->count_rows(),
			'n_guru' => $this->data_guru->count_rows(),
			
			
		);

		$user['nama_user'] = $this->session->userdata('nama_user');

		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}
	// public function grafik(){
	// 	$data = $this->data_pelanggaran->get_data_grafik()->result();
	// 	echo json_encode((array)$data);
		
	//   }
}
