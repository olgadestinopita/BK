<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('data_prestasi');
		$this->load->model('data_kprestasi');
		$this->load->model('data_kelas');
		$this->load->model('data_siswa');
		$this->load->model('data_walas');
		$this->load->model('data_guru');
		$this->load->library('form_validation');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		$role_id=$this->session->userdata('role_id');
		$nis=$this->session->userdata('nis');
		$id_ortu=$this->session->userdata('id_ortu');
        $nip=$this->session->userdata('nip');
        $data['role_id']=$role_id;
        $data['nip']=$nip;
		$data['nis']=$nis;
		$data['id_ortu']=$id_ortu;
        if ($role_id == 3)  {
		$data['data_prestasi'] = $this->data_prestasi->prestasi_nip($nip)->result();
	    } else if ($role_id == 4) {	
		$data['data_prestasi'] = $this->data_prestasi->prestasi_nis($nis)->result();
	        } else if ($role_id == 5) {	
		$data['data_prestasi'] = $this->data_prestasi->prestasi_ortu($id_ortu)->result();
	      } else{
        $data['data_prestasi'] = $this->data_prestasi->get_data()->result();
			}
		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['data_kprestasi'] = $this->data_kprestasi->get_data()->result();
		$data['data_siswa'] = $this->data_siswa->get_data()->result();
		$data['data_kelas'] = $this->data_kelas->get_data()->result();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('prestasi', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'prestasi';
		$info['operation'] = 'Input';

		$id_prestasi = $this->input->post('id_prestasi');
		$nis = $this->input->post('nis');
		$id_katpres = $this->input->post('id_katpres');
		$keterangan = $this->input->post('keterangan');
		$tahun_p = $this->input->post('tahun_p');
		$this->load->view('header');

		$records = $this->data_prestasi->get_records($id_prestasi)->result();
		if (count($records) == 0) {
			$data = array(
				'id_prestasi' => $id_prestasi,
				'nis' => $nis,
				'id_katpres' => $id_katpres,
				'keterangan' => $keterangan,
				'tahun_p' => $tahun_p
			);
			$action = $this->data_prestasi->insert_data($data, 'prestasi');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$info['datatype'] = 'prestasi';
		$info['operation'] = 'Ubah';

		$id_prestasi = $this->input->post('id_prestasi');
		$nis = $this->input->post('nis');
		$id_katpres = $this->input->post('id_katpres');
		$keterangan = $this->input->post('keterangan');
		$tahun_p = $this->input->post('tahun_p');

		$this->load->view('header');

		$data = array(
			'id_prestasi' => $id_prestasi,
			'nis' => $nis,
			'id_katpres' => $id_katpres,
			'keterangan' => $keterangan,
			'tahun_p' => $tahun_p
		);
		$action = $this->data_prestasi->update_data($id_prestasi, $data, 'prestasi');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}


		$this->load->view('source');
	}
	public function daftar_siswa($id_kls)
	{

		$data = $this->data_siswa->get_data_kelas($id_kls)->result();
		echo json_encode((array)$data);
	}
	public function delete()
	{
		$info['datatype'] = 'prestasi';

		$id_prestasi = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_prestasi->delete_data($id_prestasi, 'prestasi');
		if ($action) {
			$this->load->view('notifications/delete_success', $info);
		} else {
			$this->load->view('notifications/delete_failed', $info);
		}

		$this->load->view('source');
	}
	public function laporan()
    {
        $user['nama_user'] = $this->session->userdata('nama_user');

        $data['data_kelas'] = $this->data_prestasi->get_kelas_prestasi()->result();

        $this->load->view('header');
        $this->load->view('navigation', $user);
        $this->load->view('laporan/laporan_filter_prestasi', $data);
        $this->load->view('footer');
        $this->load->view('source');
    }

    public function laporan_filter()
    {
        $user['nama_user'] = $this->session->userdata('nama_user');
        $data['data_kelas'] = $this->data_prestasi->get_kelas_prestasi()->result();

        $kelas = $this->input->post('id_kls');

        $data['kelas'] = $kelas;

        if ($kelas === 'all') {
            $data['data_prestasi'] = $this->data_prestasi->get_data()->result();
        } else {
            $data['data_prestasi'] = $this->data_prestasi->get_data_filter($kelas)->result();
        }

        $this->load->view('header');
        $this->load->view('navigation', $user);
        $this->load->view('laporan/laporan_prestasi', $data);
        $this->load->view('footer');
        $this->load->view('source');
    }
	public function prestasi_siswa($nis)
		{
			$info['datatype'] = 'prestasi';
			$user['nama_user'] = $this->session->userdata('nama_user');
			$data['siswa']=$this->data_siswa->get_siswa_nis($nis);
			$data['data_prestasi']=$this->data_prestasi->get_prestasi_nis($nis)->result();
			$this->load->view('header');
			$this->load->view('navigation', $user);
			$this->load->view('prestasi_siswa',$data);
			$this->load->view('footer');
			$this->load->view('source');
	
		}
	public function print_siswa($nis)
		{
			$data['siswa']=$this->data_siswa->get_siswa_nis($nis);
			$data['data_prestasi']=$this->data_prestasi->get_prestasi_nis($nis)->result();
			$data['kepala_sekolah']=$this->db->where('id_jabatan',1)->get('guru')->row();
			
			$this->load->view('print/prestasi_persiswa',$data);
			
		}
	function print()
	{
        $kelas = $this->uri->segment('3');

        $data['kelas'] = $kelas;
        
        if ($kelas === 'all') {
            $data['data_prestasi'] = $this->data_prestasi->get_data()->result();
        } else{
            $data['kelas'] =$this->data_kelas->get_prestasi_lap($kelas);
            $data['data_prestasi'] = $this->data_prestasi->get_data_filter($kelas)->result();}

        $this->load->view('print/prestasi', $data);
    }

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data['data_prestasi'] = $this->db->query("select * from prestasi")->result();

		$this->load->view('pdf/prestasi', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("prestasi.pdf", array('Attachment' => 0));
	}
}
