<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') == 'login') {
			redirect('welcome');
		}
		$this->load->model('data_buat');
		$this->load->library('form_validation');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['data_buat'] = $this->data_buat->get_data()->result();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('akun', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'akun';
		$info['operation'] = 'Input';

		$id_user = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role_id = $this->input->post('role_id');
		// $registrasi =$this->input->post('registrasi');
		// $login =$this->input->post('login');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
		if ($this->form_validation->run() == false) {
			redirect(base_url() . 'akun?pesan=gagal');
		} else {
			$this->load->view('header');

			$records = $this->data_buat->get_records($id_user)->result();
			if (count($records) == 0) {
				$data = array(
					'id_user' => $id_user,
					'nama_user' => $nama_user,
					'username' => $username,
					'password' => md5($password),
					'role_id' => $role_id,
					// 'registrasi'=>$registrasi,
					//'login'=>$login


				);
				$action = $this->data_buat->insert_data($data, 'user');
				$this->load->view('notifications/insert_success', $info);
			} else {
				$this->load->view('notifications/insert_failed', $info);
			}
			$this->load->view('source');

		}
		

	}

	public function edit()
	{
		$info['datatype'] = 'akun';
		$info['operation'] = 'Ubah';

		$id_user = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role_id = $this->input->post('role_id');
		// $registrasi =$this->input->post('registrasi');
		// $login =$this->input->post('login');
			$this->load->view('header');

		$data = array(
			'id_user' => $id_user,
			'nama_user' => $nama_user,
			'username' => $username,
			'password' => md5($password),
			'role_id' => $role_id,
			// 'registrasi'=>$registrasi,
			// 'login'=>$login

		);
		$action = $this->data_buat->update_data($id_user, $data, 'user');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}


		$this->load->view('source');
	}

	public function delete()
	{
		$info['datatype'] = 'akun';

		$id_user = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_buat->delete_data($id_user, 'user');
		if ($action) {
			$this->load->view('notifications/delete_success', $info);
		} else {
			$this->load->view('notifications/delete_failed', $info);
		}

		$this->load->view('source');
	}

	function print()
	{
		$data['data_buat'] = $this->db->query("select * from user")->result();

		$this->load->view('print/akun', $data);
	}

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data['data_buat'] = $this->db->query("select * from user")->result();

		$this->load->view('pdf/akun', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("akun.pdf", array('Attachment' => 0));
	}
}
