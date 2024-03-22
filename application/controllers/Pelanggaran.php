	<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Pelanggaran extends CI_Controller
	{

		function __construct()
		{
			
			parent::__construct();
			
			$this->load->model('data_pelanggaran');
			$this->load->model('data_siswa');
			$this->load->model('data_kelas');
			$this->load->model('data_guru');
			$this->load->model('data_walas');
			$this->load->model('data_jpelanggaran');
			$this->load->model('data_kpelanggaran');
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
        if ($role_id == 3) {
		$data['data_pelanggaran'] = $this->data_pelanggaran->get_pelanggaran($nip)->result();
	    } else if ($role_id == 4) {	
		$data['data_pelanggaran'] = $this->data_pelanggaran->pelanggaran_nis($nis)->result();
	        } else if ($role_id == 5) {	
		//$data['data_pelanggaran'] = $this->data_pelanggaran->pelanggaran_ortu($id_ortu)->result();
	     redirect('pelanggaran/laporan_filter_ortu');

	} else{
        $data['data_pelanggaran'] = $this->data_pelanggaran->get_data()->result();
			}
		    $user['nama_user'] = $this->session->userdata('nama_user');
			$user['nama_user'] = $this->session->userdata('nama_user');
			$data['data_siswa'] = $this->data_siswa->get_data()->result();
			$data['data_kelas'] = $this->data_kelas->get_data()->result();
			$data['data_walas'] = $this->data_walas->get_data()->result();
			$data['data_jpelanggaran'] = $this->data_jpelanggaran->get_data()->result();
			$data['data_kpelanggaran'] = $this->data_kpelanggaran->get_data()->result();
			// $data['data_kelas'] = $this->data_pelanggaran->get_kelas_pelanggaran()->result();
			$data['data_guru'] = $this->data_guru->get_data()->result();
			$this->load->view('header');
			$this->load->view('navigation', $user);
			$this->load->view('pelanggaran', $data);
			$this->load->view('footer');
			$this->load->view('source');
		}

		public function add()
		{
			$role_id=$this->session->userdata('role_id');
			if ($role_id == 2) {
				   redirect('dashboard_guru');
				} else if ($role_id == 3) {
					redirect('dashboard_walas');
			} else if ($role_id == 4) {
				redirect('dashboard_siswa');
			} else if ($role_id == 5) {
				redirect('dashboard_ortu');
			}
			$info['datatype'] = 'pelanggaran';
			$info['operation'] = 'Input';
			$id_bimpel = $this->input->post('id_bimpel');
			$id_jbimpel = $this->input->post('id_jbimpel');
			$id_jbimpel = 'JBP002';
			$id_jpel = $this->input->post('id_jpel');
			$id_katpel = $this->input->post('id_katpel');
			$id_jbim = $this->input->post('id_jbim');
			$nis = $this->input->post('nis');
			$nip = $this->input->post('nip');
			$tgl_bimpel = $this->input->post('tgl_bimpel');
			$keterangan = $this->input->post('keterangan');
			$this->load->view('header');

			$records = $this->data_pelanggaran->get_records($id_bimpel)->result();
			if (count($records) == 0) {
				$data = array(
					'id_bimpel' => $id_bimpel,
					'id_jbimpel' => $id_jbimpel,
					'id_jpel' => $id_jpel,
					'id_katpel' => $id_katpel,
					'id_jbim' => $id_jbim,
					'nis' => $nis,
					'nip' => $nip,
					'tgl_bimpel' => $tgl_bimpel,
					'keterangan' => $keterangan
				);
				$action = $this->data_pelanggaran->insert_data($data, 'bimpel');
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
		public function nama_walas($nis)
		{

			$data = $this->data_siswa->get_nip_guru($nis);
			echo json_encode((array)$data);
		}

		public function kategori($id_jpel)
		{
			
			$data = $this->data_jpelanggaran->get_kategori_pelanggaran($id_jpel);
			echo json_encode((array)$data);
			// echo json_encode((array)($bobot+$bobot_jpel));
		}
		public function edit()
		{
			$role_id=$this->session->userdata('role_id');
			if ($role_id == 2) {
				   redirect('dashboard_guru');
				} else if ($role_id == 3) {
					redirect('dashboard_walas');
			} else if ($role_id == 4) {
				redirect('dashboard_siswa');
			} else if ($role_id == 5) {
				redirect('dashboard_ortu');
			} 
			$info['datatype'] = 'pelanggaran';
			$info['operation'] = 'Ubah';

			$id_bimpel = $this->input->post('id_bimpel');
			$id_jbimpel = 'JBP002';;
			$id_jpel = $this->input->post('id_jpel');
			$id_katpel = $this->input->post('id_katpel');
			$id_jbim = $this->input->post('id_jbim');
			$nis = $this->input->post('nis');
			$nip = $this->input->post('nip');
			$tgl_bimpel = $this->input->post('tgl_bimpel');
			$keterangan = $this->input->post('keterangan');
			$this->load->view('header');

			$data = array(
				'id_bimpel' => $id_bimpel,
				'id_jbimpel' => $id_jbimpel,
				'id_jpel' => $id_jpel,
				'id_katpel' => $id_katpel,
				'id_jbim' => $id_jbim,
				'nis' => $nis,
				'nip' => $nip,
				'tgl_bimpel' => $tgl_bimpel,
				'keterangan' => $keterangan
			);
			$action = $this->data_pelanggaran->update_data($id_bimpel, $data, 'bimpel');

			if ($action) {
				$this->load->view('notifications/insert_success', $info);
			} else {
				$this->load->view('notifications/insert_failed', $info);
			}


			$this->load->view('source');
		}

		public function delete()
		{
			$role_id=$this->session->userdata('role_id');
			if ($role_id == 2) {
				   redirect('dashboard_guru');
				} else if ($role_id == 3) {
					redirect('dashboard_walas');
			} else if ($role_id == 4) {
				redirect('dashboard_siswa');
			} else if ($role_id == 5) {
				redirect('dashboard_ortu');
			}
			$info['datatype'] = 'pelanggaran';

			$id_bimpel = $this->uri->segment('3');

			$this->load->view('header');

			$action = $this->data_pelanggaran->delete_data($id_bimpel, 'bimpel');
			if ($action) {
				$this->load->view('notifications/delete_success', $info);
			} else {
				$this->load->view('notifications/delete_failed', $info);
			}

			$this->load->view('source');
		}

	public function grafik_pelanggaran()
	{
		
		$data = $this->data_pelanggaran->get_data_grafik()->result();
		echo  json_encode($data);
		
	}
		public function laporan()
		{
			// $role_id=$this->session->userdata('role_id');
			// if (($role_id == 3) or ($role_id == 2)) {
			// 	redirect('pelanggaran/laporan_filterid_kls');
			// }
			$user['nama_user'] = $this->session->userdata('nama_user');
			$data['data_kelas'] = $this->data_pelanggaran->get_kelas_pelanggaran()->result();
			$this->load->view('header');
			$this->load->view('navigation', $user);
			$this->load->view('laporan/laporan_filter_pelanggaran', $data);
			$this->load->view('footer');
			$this->load->view('source');
		}
		public function laporan_filter()
		{
			$user['nama_user'] = $this->session->userdata('nama_user');
			$data['data_kelas'] = $this->data_pelanggaran->get_kelas_pelanggaran()->result();
	
			$kelas = $this->input->post('id_kls');
	
			$data['kelas'] = $kelas;
	
			if ($kelas === 'all') {
				$data['data_pelanggaran'] = $this->data_pelanggaran->get_data_total()->result();
			} else {
				$data['data_pelanggaran'] = $this->data_pelanggaran->get_data_filter($kelas)->result();
			}
	
			$this->load->view('header');
			$this->load->view('navigation', $user);
			$this->load->view('laporan/laporan_pelanggaran', $data);
			$this->load->view('footer');
			$this->load->view('source');
		}
		public function laporan_filter_ortu()
		{
			
			$user['nama_user'] = $this->session->userdata('nama_user');
			$id_ortu = $this->session->userdata('id_ortu');
			$data['data_pelanggaran'] = $this->data_pelanggaran->get_data_total_anak($id_ortu)->result();
			// var_dump($data['data_pelanggaran']);
			// die;
	
			$this->load->view('header');
			$this->load->view('navigation', $user);
			$this->load->view('laporan/laporan_pel_ortu', $data);
			$this->load->view('footer');
			$this->load->view('source');
		}
		public function pelanggaran_siswa($nis)
		{
			$info['datatype'] = 'pelanggaran';
			$user['nama_user'] = $this->session->userdata('nama_user');
			$data['siswa']=$this->data_siswa->get_siswa_nis($nis);
			$data['data_pelanggaran']=$this->data_pelanggaran->get_pelanggaran_nis($nis)->result();
			$this->load->view('header');
			$this->load->view('navigation', $user);
			$this->load->view('pelanggaran_siswa',$data);
			$this->load->view('footer');
			$this->load->view('source');
	
		}
		public function print_siswa($nis)
		{
			$data['siswa']=$this->data_siswa->get_siswa_nis($nis);
			$data['data_pelanggaran']=$this->data_pelanggaran->get_pelanggaran_nis($nis)->result();
			$data['kepala_sekolah']=$this->db->where('id_jabatan',1)->get('guru')->row();
			
			$this->load->view('print/pelanggaran_persiswa',$data);
			
		}
		function print()
		{
			$kelas = $this->uri->segment('3');

        $data['kelas'] = $kelas;
        
        if ($kelas === 'all') {
            $data['data_pelanggaran'] = $this->data_pelanggaran->get_data_total()->result();
        } else{
            $data['kelas'] =$this->data_kelas->get_pelanggaran_lap($kelas);
            $data['data_pelanggaran'] = $this->data_pelanggaran->get_data_filter($kelas)->result();}

        $this->load->view('print/pelanggaran', $data);}

		function cetak_pdf()
		{
			$this->load->library('dompdf_gen');

			$data['data_pelanggaran'] = $this->db->query("select * from bimpel")->result();

			$this->load->view('pdf/pelanggaran', $data);

			$paper_size = 'A4';
			$orientation = 'potrait';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("pelanggaran.pdf", array('Attachment' => 0));
		}
	}
