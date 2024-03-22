<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_pelanggaran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('data_kpelanggaran');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		$jumlah_row = $this->db->count_all_results('kategori_pelanggaran');
		$next_id = 'KP'. str_pad($jumlah_row + 1, 2, "0",STR_PAD_LEFT);

		$data['next_id'] = $next_id;
		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['data_kpelanggaran'] = $this->data_kpelanggaran->get_data()->result();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('kategori_pelanggaran', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'kategori_pelanggaran';
		$info['operation'] = 'Input';

		$id_katpel = $this->input->post('id_katpel');
		$kategori = $this->input->post('kategori');

		$this->load->view('header');

		$records = $this->data_kpelanggaran->get_records($id_katpel)->result();
		if (count($records) == 0) {
			$data = array(
				'id_katpel' => $id_katpel,
				'kategori' => $kategori
			);
			$action = $this->data_kpelanggaran->insert_data($data, 'kategori_pelanggaran');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$info['datatype'] = 'kategori_pelanggaran';
		$info['operation'] = 'Ubah';

		$id_katpel = $this->input->post('id_katpel');
		$kategori = $this->input->post('kategori');
		$this->load->view('header');

		$data = array(
			'id_katpel' => $id_katpel,
				'kategori' => $kategori
			);
		$action = $this->data_kpelanggaran->update_data($id_katpel, $data, 'kategori_pelanggaran');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}


		$this->load->view('source');
	}

	public function delete()
	{
		$info['datatype'] = 'kategori_pelanggaran';

		$id_katpel = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_kpelanggaran->delete_data($id_katpel, 'kategori_pelanggaran');
		if ($action) {
			$this->load->view('notifications/delete_success', $info);
		} else {
			$this->load->view('notifications/delete_failed', $info);
		}

		$this->load->view('source');
	}

	function print()
	{
		$data['data_kpelanggaran'] = $this->db->query("select * from kategori_pelanggaran")->result();

		$this->load->view('print/kategori_pelanggaran', $data);
	}

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data['data_kpelanggaran'] = $this->db->query("select * from kategori_pelanggaran")->result();

		$this->load->view('pdf/kategori_pelanggaran', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("kategori_pelanggaran.pdf", array('Attachment' => 0));
	}
}
