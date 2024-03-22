<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_ortu extends CI_Controller
{

	function __construct()
	{
		
		parent::__construct();
		if ($this->session->userdata('role_id') != 5) {
			redirect('welcome');
		}
		$this->load->helper(array('url'));
		$this->load->library('form_validation');
		$this->load->model('data_ortu');
		$this->load->model('data_siswa');
		$this->load->model('data_prestasi');
		$this->load->model('data_bimbingan');
		$this->load->model('data_pelanggaran');
	
		
	}

	public function index()
	{
		$id_ortu = $this->session->userdata('id_ortu');
	
			$data = array(
			'n_pelanggaran' =>  $this->data_pelanggaran->pelanggaran_ortu_total($id_ortu),
			'n_bimbingan' => count( $this->data_bimbingan->bimbingan_ortu($id_ortu)->result()),
			'n_prestasi' => count( $this->data_prestasi->prestasi_ortu($id_ortu)->result()),
			
			
			
		);
		$user['nama_user'] = $this->session->userdata('nama_user');
		$id_ortu = $this->session->userdata('id_ortu');
		$data['ortu'] = $this->data_ortu->get_data_ortu($id_ortu)->row();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('dashboard_ortu',$data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	
}
