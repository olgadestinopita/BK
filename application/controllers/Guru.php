<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library('form_validation');
		$this->load->model('data_guru');
		$this->load->model('data_jabatan');
	}

	public function index()
	{
		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['data_guru'] = $this->data_guru->get_data()->result();
		$data['data_jabatan'] = $this->data_jabatan->get_data()->result();
		$data['data_status'] = $this->data_guru->get_status()->result();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('guru', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'guru';
		$info['operation'] = 'Input';

		$nip = $this->input->post('nip');
		$nama_guru = $this->input->post('nama_guru');
		$id_jabatan = $this->input->post('id_jabatan');
		$tgl_lahir_g = $this->input->post('tgl_lahir_g');
		$jekel = $this->input->post('jekel');
		$nohp = $this->input->post('nohp');
		$email_g = $this->input->post('email_g');
		$id_status = $this->input->post('id_status');

		$this->load->view('header');

		$records = $this->data_guru->get_records($nip)->result();
		if (count($records) == 0) {
			$data = array(
				'nip' => $nip,
				'nama_guru' => $nama_guru,
				'id_jabatan' => $id_jabatan,
				'tgl_lahir_g' => $tgl_lahir_g,
				'jekel' => $jekel,
				'nohp' => $nohp,
				'email_g' => $email_g,
				'id_status' => $id_status

			);
			$action = $this->data_guru->insert_data($data, 'guru');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$info['datatype'] = 'guru';
		$info['operation'] = 'Ubah';

		$nip = $this->input->post('nip');
		$nama_guru = $this->input->post('nama_guru');
		$id_jabatan = $this->input->post('id_jabatan');
		$tgl_lahir_g = $this->input->post('tgl_lahir_g');
		$jekel = $this->input->post('jekel');
		$nohp = $this->input->post('nohp');
		$email_g = $this->input->post('email_g');
		$id_status = $this->input->post('id_status');
		$this->load->view('header');

		$data = array(
			'nip' => $nip,
				'nama_guru' => $nama_guru,
				'id_jabatan' => $id_jabatan,
				'tgl_lahir_g' => $tgl_lahir_g,
				'jekel' => $jekel,
				'nohp' => $nohp,
				'email_g' => $email_g,
				'id_status' => $id_status
		);
		$action = $this->data_guru->update_data($nip, $data, 'guru');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}


		$this->load->view('source');
	}

	public function delete()
	{
		$info['datatype'] = 'guru';

		$nip = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_guru->delete_data($nip, 'guru');
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

		$data['data_tahun_lahir'] = $this->data_guru->get_tahun_lahir()->result();

		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('laporan/laporan_filter_guru', $data);
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

		$data['data_guru'] = $this->db->query("select * from guru where substring(nip, 7, 2) >= '$dari' and substring(nip, 7, 2) <= '$sampai'")->result();

		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('laporan/laporan_guru', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	function print()
	{
		$dari = $this->uri->segment('3');
		$sampai = $this->uri->segment('4');

		$data['dari'] = $dari;
		$data['sampai'] = $sampai;

		$data['data_guru'] = $this->db->query("select * from guru where substring(nip, 7, 2) >= '$dari' and substring(nip, 7, 2) <= '$sampai'")->result();

		$this->load->view('print/guru', $data);
	}

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$dari = $this->uri->segment('3');
		$sampai = $this->uri->segment('4');

		$data['dari'] = $dari;
		$data['sampai'] = $sampai;

		$data['data_guru'] = $this->db->query("select * from guru where substring(nip, 7, 2) >= '$dari' and substring(nip, 7, 2) <= '$sampai'")->result();


		$this->load->view('pdf/guru', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("guru.pdf", array('Attachment' => 0));
	}
}
