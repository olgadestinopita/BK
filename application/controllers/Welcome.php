<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('data_user');
		$this->load->library('form_validation');
	}

	function index()
	{
		$role_id=$this->session->userdata('role_id');
		if (($role_id == 1) or ($role_id == 6)) {
			redirect('dashboard');
		} else if ($role_id == 2) {
				redirect('dashboard_guru');
			} else if ($role_id == 3) {
					redirect('dashboard_walas');
				} else if ($role_id == 4) {
						redirect('dashboard_siswa');
					} else if ($role_id == 5) {
						redirect('dashboard_ortu');
					} else if ($role_id == 7) {
						redirect('dashboard_kepsek');
					}
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('source');
	}

	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() != false) {
			$where = array(
				'username' => $username,
				'password' => md5($password)
			);
			$data = $this->data_user->get_records($where);
			$role = $this->data_user->get_records($where)->row();
			$cek = $data->num_rows();
			if ($cek > 0) {
				$session = array(
					'id_user' => $role->id_user,
					'nama_user' => $role->nama_user,
					'username' => $role->username,
					'role_id' => $role->role_id,
					'nip' => $role->nip,
					'nis' => $role->nis,
					'id_ortu' => $role->id_ortu,
					'is_active' => 'login'
				);
				$this->session->set_userdata($session);
				$this->db->update('user',array('is_active' =>1), array('id_user' =>$role->id_user));
				
				if (($role->role_id == 1) or ($role->role_id == 6)) {
					redirect('dashboard');
				 } else if ($role->role_id == 2) {
						redirect('dashboard_guru');
					 } else if ($role->role_id == 3) {
							redirect('dashboard_walas');
						 } else if ($role->role_id == 4) {
								redirect('dashboard_siswa');
							 } else if ($role->role_id == 5){
								redirect('dashboard_ortu');
							} else if ($role->role_id == 7){
								redirect('dashboard_kepsek');
							}
			} else {
				redirect(base_url() . 'welcome?pesan=gagal');
			}
		} else {
			$this->load->view('login');
		}
	}

	function logout()
	{ 
		
		$this->session->sess_destroy();
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('source');
				
	}
}
