<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library('form_validation');
        $this->load->model('data_kelas');
        $this->load->model('data_walas');
        $this->load->model('data_guru');
		$this->load->model('data_siswa');
	}


	public function index()
	{
		$jumlah_row = $this->db->count_all_results('walas');
		$next_id = 'W'. str_pad($jumlah_row + 1, 4, "0",STR_PAD_LEFT);

		$data['next_id'] = $next_id;
		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['data_walas'] = $this->data_walas->get_data()->result();
		
		$data['data_guru'] = $this->data_guru->get_data()->result();
		$data['data_kelas'] = $this->data_kelas->get_data()->result();
		$data['data_siswa'] = $this->data_siswa->get_data()->result();
		// var_dump($data);
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('walas', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'walas';
		$info['operation'] = 'Input';

		$id_walas = $this->input->post('id_walas');
		$nip = $this->input->post('nip');
		$id_kls=$this->input->post('id_kls');
        $tahun = $this->input->post('tahun');

		$this->load->view('header');

		$records = $this->data_walas->get_records($id_walas)->result();
		if (count($records) == 0) {
			$data = array(
				'id_walas' => $id_walas,
				'nip' => $nip,
				'id_kls' => $id_kls,
                'tahun' => $tahun
			);
			$action = $this->data_walas->insert_data($data, 'walas');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$info['datatype'] = 'walas';
		$info['operation'] = 'Ubah';

		$id_walas = $this->input->post('id_walas');
		$nip = $this->input->post('nip');
		$id_kls = $this->input->post('id_kls');
        $tahun = $this->input->post('tahun');
       
        $this->load->view('header');

		$data = array(
			'id_walas' => $id_walas,
				'nip' => $nip,
				'id_kls' => $id_kls,
                'tahun' => $tahun
		);
		$action = $this->data_walas->update_data($id_walas, $data, 'walas');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}


		$this->load->view('source');
	}

	public function delete()
	{
		$info['datatype'] = 'walas';

		$id_walas = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_walas->delete_data($id_walas, 'walas');
		if ($action) {
			$this->load->view('notifications/delete_success', $info);
		} else {
			$this->load->view('notifications/delete_failed', $info);
		}

		$this->load->view('source');
	}

	public function laporan()
	{
		$user['username'] = $this->session->userdata('username');
		$user['nama_user'] = $this->session->userdata('nama_user');

		$data['data_tahun_ngajar'] = $this->data_walas->get_tahun_ngajar()->result();

		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('laporan/laporan_filter_walas', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function laporan_filter()
	{
		$user['username'] = $this->session->userdata('username');
		$user['nama_user'] = $this->session->userdata('nama_user');

		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');

		$data['dari'] = $dari;
		$data['sampai'] = $sampai;

		$data['data_walas'] = $this->db->query("select * from walas where substring(id_walas, 7, 2) >= '$dari' and substring(nip, 7, 2) <= '$sampai'")->result();

		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('laporan/laporan_walas', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	function print()
	{
		$dari = $this->uri->segment('3');
		$sampai = $this->uri->segment('4');

		$data['dari'] = $dari;
		$data['sampai'] = $sampai;

		$data['data_walas'] = $this->db->query("select * from walas where substring(id_walas, 7, 2) >= '$dari' and substring(id_walas, 7, 2) <= '$sampai'")->result();

		$this->load->view('print/walas', $data);
	}

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$dari = $this->uri->segment('3');
		$sampai = $this->uri->segment('4');

		$data['dari'] = $dari;
		$data['sampai'] = $sampai;

		$data['data_walas'] = $this->db->query("select * from walas where substring(id_walas, 7, 2) >= '$dari' and substring(id_walas, 7, 2) <= '$sampai'")->result();


		$this->load->view('pdf/walas', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("walas.pdf", array('Attachment' => 0));
	}
}
