<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_pelanggaran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('data_jpelanggaran');
		$this->load->model('data_kpelanggaran');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		$jumlah_row = $this->db->count_all_results('jenis_pelanggaran');
		$next_id = 'PEL'. str_pad($jumlah_row + 1, 4, "0",STR_PAD_LEFT);

		$data['next_id'] = $next_id;
		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['data_jpelanggaran'] = $this->data_jpelanggaran->get_data()->result();
		$data['data_kpelanggaran'] = $this->data_kpelanggaran->get_data()->result();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('jenis_pelanggaran', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'jenis_pelanggaran';
		$info['operation'] = 'Input';

		$id_jpel = $this->input->post('id_jpel');
		$jpel = $this->input->post('jpel');
		$id_katpel = $this->input->post('id_katpel');
		$bobot = $this->input->post('bobot');
		$sanksi = $this->input->post('sanksi');
		$this->load->view('header');

		$records = $this->data_jpelanggaran->get_records($id_jpel)->result();
		if (count($records) == 0) {
			$data = array(
				'id_jpel' => $id_jpel,
				'jpel' => $jpel,
				'id_katpel' => $id_katpel,
				'bobot' => $bobot,
				'sanksi' => $sanksi

			);
			$action = $this->data_jpelanggaran->insert_data($data, 'jenis_pelanggaran');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$info['datatype'] = 'jenis_pelanggaran';
		$info['operation'] = 'Ubah';

		$id_jpel = $this->input->post('id_jpel');
		$jpel = $this->input->post('jpel');
		$id_katpel = $this->input->post('id_katpel');
		$bobot = $this->input->post('bobot');
		$sanksi = $this->input->post('sanksi');
		$this->load->view('header');

		$data = array(
			'id_jpel' => $id_jpel,
			'jpel' => $jpel,
			'id_katpel' => $id_katpel,
			'bobot' => $bobot,
			'sanksi' => $sanksi
		);
		$action = $this->data_jpelanggaran->update_data($id_jpel, $data, 'jenis_pelanggaran');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}


		$this->load->view('source');
	}

	public function delete()
	{
		$info['datatype'] = 'jenis_pelanggaran';

		$id_katpel = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_jpelanggaran->delete_data($id_katpel, 'jenis_pelanggaran');
		if ($action) {
			$this->load->view('notifications/delete_success', $info);
		} else {
			$this->load->view('notifications/delete_failed', $info);
		}

		$this->load->view('source');
	}

	function print()
	{
		$data['data_jpelanggaran'] = $this->db->query("select * from jenis_pelanggaran")->result();

		$this->load->view('print/jenis_pelanggaran', $data);
	}

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data['data_jpelanggaran'] = $this->db->query("select * from jenis_pelanggaran")->result();

		$this->load->view('pdf/jenis_pelanggaran', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("jenis_pelanggaran.pdf", array('Attachment' => 0));
	}
}
