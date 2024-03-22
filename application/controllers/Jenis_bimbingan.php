<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_bimbingan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('data_jbimbingan');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		$jumlah_row = $this->db->count_all_results('jenis_bimbingan');
		$next_id = 'JB'. str_pad($jumlah_row + 1, 4, "0",STR_PAD_LEFT);

		$data['next_id'] = $next_id;

		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['data_jbimbingan'] = $this->data_jbimbingan->get_data()->result();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('jenis_bimbingan', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'jenis_bimbingan';
		$info['operation'] = 'Input';

		$id_jbim = $this->input->post('id_jbim');
		$kategori_bimbingan = $this->input->post('kategori_bimbingan');

		$this->load->view('header');

		$records = $this->data_jbimbingan->get_records($id_jbim)->result();
		if (count($records) == 0) {
			$data = array(
				'id_jbim' => $id_jbim,
				'kategori_bimbingan' => $kategori_bimbingan
			);
			$action = $this->data_jbimbingan->insert_data($data, 'jenis_bimbingan');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$info['datatype'] = 'jenis_bimbingan';
		$info['operation'] = 'Ubah';

		$id_jbim = $this->input->post('id_jbim');
		$kategori_bimbingan = $this->input->post('kategori_bimbingan');

		$this->load->view('header');

		$data = array(
			'id_jbim' => $id_jbim,
				'kategori_bimbingan' => $kategori_bimbingan
			);
		$action = $this->data_jbimbingan->update_data($id_jbim, $data, 'jenis_bimbingan');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}


		$this->load->view('source');
	}

	public function delete()
	{
		$info['datatype'] = 'jenis_bimbingan';

		$id_jbim = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_jbimbingan->delete_data($id_jbim, 'jenis_bimbingan');
		if ($action) {
			$this->load->view('notifications/delete_success', $info);
		} else {
			$this->load->view('notifications/delete_failed', $info);
		}

		$this->load->view('source');
	}

	function print()
	{
		$data['data_jbimbingan'] = $this->db->query("select * from jenis_bimbingan")->result();

		$this->load->view('print/bimbingan', $data);
	}

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data['data_bimbingan'] = $this->db->query("select * from jenis_bimbingan")->result();

		$this->load->view('pdf/jenis_bimbingan', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("jenis_bimbingan.pdf", array('Attachment' => 0));
	}
}
