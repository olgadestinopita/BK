<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_walas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('role_id') != 3) {
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
	
		$nip = $this->session->userdata('nip');
	
		$jpel=$this->db->query('select count(*) as jpel from bimpel where id_jbimpel="JBP002" and NIP='.$nip)->row()->jpel;
		$jbim=$this->db->query('select count(*) as jbim from bimpel where id_jbimpel="JBP001"and NIP='.$nip)->row()->jbim;
		$data = array(
			'n_siswa' =>count( $this->data_siswa->get_siswa($nip)->result()),
			'n_pelanggaran' => $jpel,
			'n_bimbingan' => $jbim,
			'n_prestasi' => count( $this->data_prestasi->prestasi_nip($nip)->result()),
			'n_guru' => $this->data_guru->count_rows(),
			
			
		);
		// var_dump($data['n_siswa' ]);
		// die;

		$user['nama_user'] = $this->session->userdata('nama_user');
		$nip = $this->session->userdata('nip');
		$data['guru'] = $this->data_guru->get_data_nip($nip)->row();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('dashboard_walas', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}
	public function grafik(){
		$data = $this->data_pelanggaran->get_data_grafik()->result();
		echo json_encode((array)$data);
		
	  }
}
