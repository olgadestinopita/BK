<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		//$role_id = $this->session->userdata('role_id');
		//if ($role_id != 1 && $role_id != 2 && $role_id != 3) {
			//redirect('welcome');
		//}
		$this->load->model('data_bimbingan');
		$this->load->model('data_siswa');
		$this->load->model('data_kelas');
		$this->load->model('data_guru');
		$this->load->model('data_walas');
		$this->load->model('data_jbimbingan');
		$this->load->library('form_validation');
		$this->load->helper(array('url'));
	}

	public function index()
	{   
		$role_id=$this->session->userdata('role_id');
		$id_user=$this->session->userdata('id_user');
        $nip=$this->session->userdata('nip');
		$nis=$this->session->userdata('nis');
		$id_ortu=$this->session->userdata('id_ortu');
        $data['role_id']=$role_id;
        $data['nip']=$nip;
		$data['nis']=$nis;
		$data['id_ortu']=$id_ortu;
		$data['id_user']=$id_user;
        if (($role_id == 3) or ($role_id == 2) or ($role_id == 6)) {
		$data['data_bimbingan'] = $this->data_bimbingan->get_bimbingan($nip)->result();
		$this->db->select('*, count(*) as jumlah_notif');
		$this->db->from('bimpel');
		$this->db->join('chat', 'chat.nis = bimpel.NIS and chat.nip = bimpel.NIP','left');
		$where = array('bimpel.nip' =>$nip,'bimpel.id_jbimpel'=>'JBP001', 'pengirim <>' => $id_user, 'pesan' => 0);
		$this->db->where($where);
		$this->db->group_by('bimpel.NIS', 'bimpel.NIP');
		$data['notif']=$this->db->get()->result();
		
	
		} else if ($role_id == 4) {	
		$data['data_bimbingan'] = $this->data_bimbingan->bimbingan_nis($nis)->result();
		$this->db->select('*, count(*) as jumlah_notif');
		$this->db->from('bimpel');
		$this->db->join('chat', 'chat.nis = bimpel.NIS and chat.nip = bimpel.NIP','left');
		$where = array('bimpel.nis' =>$nis,'bimpel.id_jbimpel'=>'JBP001', 'pengirim <>' => $id_user, 'pesan' => 0);
		$this->db->where($where);
		$this->db->group_by('bimpel.NIS', 'bimpel.NIP');
		$data['notif']=$this->db->get()->result();
	
		} else if ($role_id == 5) {	
		$data['data_bimbingan'] = $this->data_bimbingan->bimbingan_ortu($id_ortu)->result();
			}else{
        $data['data_bimbingan'] = $this->data_bimbingan->get_data()->result();
			}
			
		// var_dump($data['notif']);
		// die;
		$user['nama_user'] = $this->session->userdata('nama_user');
		
		$data['data_siswa'] = $this->data_siswa->get_data()->result();
		$data['data_kelas'] = $this->data_kelas->get_data()->result();
		$data['data_guru'] = $this->data_guru->get_data()->result();
		$data['data_walas'] = $this->data_walas->get_data()->result();
		$data['data_jbimbingan'] = $this->data_jbimbingan->get_data()->result();
		// var_dump($data['data_bimbingan'][0]);
		// die;
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('bimbingan', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}
	public function daftar_siswa($id_kls)
	{

		$data = $this->data_siswa->get_data_kelas($id_kls)->result();
		echo json_encode((array)$data);
	}
	public function add()
	{
		$role_id=$this->session->userdata('role_id');
				 if ($role_id == 4) {
				redirect('dashboard_siswa');
			} else if ($role_id == 5) {
				redirect('dashboard_ortu');
			}
		$info['datatype'] = 'bimbingan';
		$info['operation'] = 'Input';

		$role_id= $this->session->userdata('role_id');
		$id_user= $this->session->userdata('id_user');
		$id_bimpel = $this->input->post('id_bimpel');
		$id_jbimpel ='JBP001';
		$id_jpel = $this->input->post('id_jpel');
		$id_katpel = $this->input->post('id_katpel');
		$id_jbim = $this->input->post('id_jbim');
		$nis = $this->input->post('nis');
		
		if ($role_id == 1 ) {
		$nip = $this->data_guru->get_nip_walas($nis);
		}else{		
		$nip = $this->data_guru->get_nip($id_user);
		}
		$tgl_bimpel = $this->input->post('tgl_bimpel');
		$keterangan = $this->input->post('keterangan');
		$this->load->view('header');

		$records = $this->data_bimbingan->get_records($id_bimpel)->result();
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
			$action = $this->data_bimbingan->insert_data($data, 'bimpel');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$role_id=$this->session->userdata('role_id');
			if ($role_id == 2) {
				} else if ($role_id == 4) {
				redirect('dashboard_siswa');
			} else if ($role_id == 5) {
				redirect('dashboard_ortu');
			}
		$info['datatype'] = 'bimbingan';
		$info['operation'] = 'Ubah';
		$role_id= $this->session->userdata('role_id');
		$id_user= $this->session->userdata('id_user');

		$id_bimpel = $this->input->post('id_bimpel');
		$id_jbimpel ='JBP001';
		$id_jpel = $this->input->post('id_jpel');
		$id_katpel = $this->input->post('id_katpel');
		$id_jbim = $this->input->post('id_jbim');
		$nis = $this->input->post('nis');
		
		if ($role_id == 1) {
			$nip = $this->data_guru->get_nip_walas($nis);
			}else{		
			$nip = $this->data_guru->get_nip($id_user);
			}
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
		$action = $this->data_bimbingan->update_data($id_bimpel, $data, 'bimpel');

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
		$info['datatype'] = 'bimbingan';

		$id_bimpel = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_bimbingan->delete_data($id_bimpel, 'bimpel');
		if ($action) {
			$this->load->view('notifications/delete_success', $info);
		} else {
			$this->load->view('notifications/delete_failed', $info);
		}

		$this->load->view('source');
	}
	public function grafik_bimbingan()
	{
		
		$data = $this->data_bimbingan->get_data_grafik()->result();
		echo  json_encode($data);
		
	}
	public function bimbingan_siswa($nis)
	{
		$info['datatype'] = 'bimbingan';
		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['siswa']=$this->data_siswa->get_siswa_nis($nis);
		$data['data_bimbingan']=$this->data_bimbingan->get_bimbingan_nis($nis)->result();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('bimbingan_siswa',$data);
		$this->load->view('footer');
		$this->load->view('source');

	}

	public function print_siswa($nis)
	{
		$data['siswa']=$this->data_siswa->get_siswa_nis($nis);
		$data['data_bimbingan']=$this->data_bimbingan->get_bimbingan_nis($nis)->result();
		$data['kepala_sekolah']=$this->db->where('id_jabatan',1)->get('guru')->row();
		
		$this->load->view('print/bimbingan_persiswa',$data);
		
	}
	public function laporan()
		{
			$user['nama_user'] = $this->session->userdata('nama_user');
			$data['data_kelas'] = $this->data_bimbingan->get_kelas_bimbingan()->result();
			$this->load->view('header');
			$this->load->view('navigation', $user);
			$this->load->view('laporan/laporan_filter_bimbingan', $data);
			$this->load->view('footer');
			$this->load->view('source');
		}
		public function laporan_filter()
		{
			$user['nama_user'] = $this->session->userdata('nama_user');
			$data['data_kelas'] = $this->data_bimbingan->get_kelas_bimbingan()->result();
			$kelas = $this->input->post('id_kls');
			$data['kelas'] = $kelas;
			if ($kelas === 'all') {
				$data['data_bimbingan'] = $this->data_bimbingan->get_data()->result();
			} else {
				$data['data_bimbingan'] = $this->data_bimbingan->get_data_filter($kelas)->result();
			}
	
			$this->load->view('header');
			$this->load->view('navigation', $user);
			$this->load->view('laporan/laporan_bimbingan', $data);
			$this->load->view('footer');
			$this->load->view('source');
		}
		public function laporan_bimbingan_walas()
		{   
			$role_id=$this->session->userdata('role_id');
			$nip=$this->session->userdata('nip');
			$data['role_id']=$role_id;
			$data['nip']=$nip;
			if (($role_id == 3) or ($role_id == 2)) {
			$data['data_bimbingan'] = $this->data_bimbingan->get_bimbingan($nip)->result();
				}else{		
			$data['data_bimbingan'] = $this->data_bimbingan->get_data()->result();
				}
			$user['nama_user'] = $this->session->userdata('nama_user');
			
			$data['data_siswa'] = $this->data_siswa->get_data()->result();
			$data['data_kelas'] = $this->data_kelas->get_data()->result();
			$data['data_guru'] = $this->data_guru->get_data()->result();
			$data['data_walas'] = $this->data_walas->get_data()->result();
			$data['data_jbimbingan'] = $this->data_jbimbingan->get_data()->result();
			$this->load->view('header');
			$this->load->view('navigation', $user);
			$this->load->view('bimbingan_persiswa', $data);
			$this->load->view('footer');
			$this->load->view('source');
		}
	
		function print()
		{
			$kelas = $this->uri->segment('3');

        $data['kelas'] = $kelas;
        
        if ($kelas === 'all') {
            $data['data_bimbingan'] = $this->data_bimbingan->get_data()->result();
        } else{
            $data['kelas'] =$this->data_kelas->get_bimbingan_lap($kelas);
            $data['data_bimbingan'] = $this->data_bimbingan->get_data_filter($kelas)->result();
		}

        $this->load->view('print/bimbingan', $data);}

	
}
