<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('data_kelas');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['data_kelas'] = $this->data_kelas->get_data()->result();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('kelas', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'kelas';
		$info['operation'] = 'Input';

		$id_kls = $this->input->post('id_kls');
		$kelas = $this->input->post('kelas');

		$this->load->view('header');

		$records = $this->data_kelas->get_records($id_kls)->result();
		if (count($records) == 0) {
			$data = array(
				'id_kls' => $id_kls,
				'kelas' => $kelas
			);
			$action = $this->data_kelas->insert_data($data, 'kelas');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$info['datatype'] = 'kelas';
		$info['operation'] = 'Ubah';

		$id_kls = $this->input->post('id_kls');
		$kelas = $this->input->post('kelas');

		$this->load->view('header');

		$data = array(
			'id_kls' => $id_kls,
			'kelas' => $kelas
		);
		$action = $this->data_kelas->update_data($id_kls, $data, 'kelas');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}


		$this->load->view('source');
	}

	public function delete()
	{
		$info['datatype'] = 'kelas';

		$id_kls = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_kelas->delete_data($id_kls, 'kelas');
		if ($action) {
			$this->load->view('notifications/delete_success', $info);
		} else {
			$this->load->view('notifications/delete_failed', $info);
		}

		$this->load->view('source');
	}

	function print()
	{
		$data['data_kelas'] = $this->db->query("select * from kelas")->result();

		$this->load->view('print/kelas', $data);
	}

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data['data_kelas'] = $this->db->query("select * from kelas")->result();

		$this->load->view('pdf/kelas', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("kelas.pdf", array('Attachment' => 0));
	}
}
