<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != 1 and $this->session->userdata('role_id') != 3 and $this->session->userdata('role_id') != 6 ) {
            redirect('welcome');
        }
        $this->load->helper(array('url'));
        $this->load->library('form_validation');
        $this->load->model('data_siswa');
        $this->load->model('data_kelas');
        $this->load->model('data_walas');
        $this->load->model('data_guru');
        $this->load->model('data_ortu');
        $this->load->model('data_buat');
    }

    public function index()
    {
        
		$last_id = $this->db->select_max('nis')->get('siswa')->row()->nis;
		$next_id = $last_id+1;

		$data['next_id'] = $next_id;

        $role_id=$this->session->userdata('role_id');
        $nip=$this->session->userdata('nip');
        $data['role_id']=$role_id;
        $data['nip']=$nip;
        if (($role_id == 3) or ($role_id == 7)) {
		$data['data_siswa'] = $this->data_siswa->get_siswa($nip)->result();
			}else{		
        $data['data_siswa'] = $this->data_siswa->get_data()->result();
			}

        $user['nama_user'] = $this->session->userdata('nama_user');
        $data['data_kelas'] = $this->data_kelas->get_data()->result();
        $data['data_walas'] = $this->data_walas->get_data()->result();
        $data['data_guru'] = $this->data_guru->get_data()->result();
        $data['data_kelas'] = $this->data_siswa->get_kelas()->result();
        $data['data_buat']= $this->data_buat->get_data()->result();   
        $data['data_ortu'] = $this->data_ortu->get_data()->result();
        $this->load->view('header');
        $this->load->view('navigation', $user);
        $this->load->view('siswa', $data);
        $this->load->view('footer');
        $this->load->view('source');
    }
    public function add()
    {
        $role_id=$this->session->userdata('role_id');
        if (($role_id != 1) and ($role_id != 3)and ($role_id != 6)) {
            redirect('dashboard_walas');
        }
        $info['datatype'] = 'siswa';
        $info['operation'] = 'Tambah';
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $id_kls = $this->input->post('id_kls');
        $id_walas = $this->input->post('id_walas');
        $jk = $this->input->post('jk');
        $alamat = $this->input->post('alamat');
        $nama_ortu = $this->input->post('nama_ortu');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $email = $this->input->post('email');
        $this->load->view('header');

            $records = $this->data_siswa->get_records($nis)->result();
            if (count($records) == 0) { 
            $data = array(
                'nama_ortu' => $nama_ortu,
            );
             $this->data_ortu->insert_data($data, 'ortu');
             $id_ortu= $this->db->insert_id();
            $data = array(
                'nis' => $nis,
                'nama' => $nama,
                'no_hp' => $no_hp,
                'id_kls' => $id_kls,
                'id_walas' => $id_walas,
                'jk' => $jk,
                'alamat' => $alamat,
                'id_ortu' => $id_ortu,
                'tgl_lahir' => $tgl_lahir,
                'tempat_lahir' => $tempat_lahir,
                'email' => $email
            );
            $this->data_siswa->insert_data($data, 'siswa');
            $this->load->view('notifications/insert_success', $info);
        } else {
            $this->load->view('notifications/insert_failed', $info);
        }
        $this->load->view('source');
    
    }
    public function nama_walas($id_kls)
		{
			$data = $this->data_kelas->get_nip_guru($id_kls);
			echo json_encode((array)$data);
		}

    // public function get_nis_auto(){
    //     $new_id =  $this->data_siswa->get_idmax()->result();
    //     if ($new_id > 0) {
    //           foreach ($new_id as $key) {
    //             $auto_id = $key->nis;              
    //           }
    //     }      
    //     return $nis = $this->data_siswa->get_newid($auto_id);      
    //  }
    public function edit()
    {
        
        $role_id=$this->session->userdata('role_id');
        if (($role_id != 1) and ($role_id != 3)and ($role_id != 6)) {
            redirect('dashboard_walas');
        }
        $info['datatype'] = 'siswa';
        $info['operation'] = 'Ubah';

        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $no_hp = $this->input->post('no_hp');
        $id_kls = $this->input->post('id_kls');
        $id_walas = $this->input->post('id_walas');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $nama_ortu = $this->input->post('nama_ortu');
        $id_ortu = $this->input->post('id_ortu');
        $records = $this->data_siswa->get_records($nis)->result();
        
        if (count($records) > 0) { 
        $data = array(
            'nama_ortu' => $nama_ortu,
        );
         $this->data_ortu->update_data($id_ortu,$data, 'ortu');
    

        $this->load->view('header');
        $data = array(
            'nis' => $nis,
            'nama' => $nama,
            'jk' => $jk,
            'no_hp' => $no_hp,
            'id_kls' => $id_kls,
            'id_walas' => $id_walas,
            'alamat' => $alamat,
            'tgl_lahir' => $tgl_lahir,
            'id_ortu' => $id_ortu,
            'email' => $email
        );
        $action = $this->data_siswa->update_data($nis, $data, 'siswa');

        if ($action) {
            $this->load->view('notifications/insert_success', $info);
        } else {
            $this->load->view('notifications/insert_failed', $info);
        }
    
        $this->load->view('source');
        }
    }
    
    public function delete()
    {
        
        $role_id=$this->session->userdata('role_id');
        if (($role_id != 1) and ($role_id != 3)and ($role_id != 6)) {
            redirect('dashboard_walas');
        }
        $info['datatype'] = 'siswa';

        $nis = $this->uri->segment('3');

        $this->load->view('header');

        $action = $this->data_siswa->delete_data($nis, 'siswa');
        if ($action) {
            $this->load->view('notifications/delete_success', $info);
        } else {
            $this->load->view('notifications/delete_failed', $info);
        }

        $this->load->view('source');
    }


    public function siswa_filter()
    {
        $last_id = $this->db->select_max('nis')->get('siswa')->row()->nis;
		$next_id = $last_id+1;

		$data['next_id'] = $next_id;
        $role_id=$this->session->userdata('role_id');
        if ($role_id != 1) {
            redirect('dashboard_walas');
        }
        $role_id=$this->session->userdata('role_id');
        $data['role_id']=$role_id;
        $user['nama_user'] = $this->session->userdata('nama_user');
        $data['data_kelas'] = $this->data_siswa->get_kelas()->result();
        $data['data_kelas'] = $this->data_kelas->get_data()->result();
        $data['data_walas'] = $this->data_walas->get_data()->result();
        $data['data_guru'] = $this->data_guru->get_data()->result();
        $data['data_ortu'] = $this->data_ortu->get_data()->result();
        $kelas = $this->input->post('kelas');
        $data['kelas'] = $kelas;
        if ($kelas === 'all') {
            $data['data_siswa'] = $this->data_siswa->get_data()->result();
        } else {
            $data['data_siswa'] = $this->data_siswa->get_data_filter($kelas)->result();
        }
        $this->load->view('header');
        $this->load->view('navigation', $user);
        $this->load->view('siswa', $data);
        $this->load->view('footer');
        $this->load->view('source');
    }

    public function walas_siswa()
    {
        $role_id=$this->session->userdata('role_id');
        if ($role_id != 1) {
            redirect('dashboard_walas');
        }
        $user['nama_user'] = $this->session->userdata('nama_user');
        $data['data_siswa'] = $this->data_siswa->get_data_walas()->result();
        $this->load->view('header');
        $this->load->view('navigation', $user);
        $this->load->view('siswa', $data);
        $this->load->view('footer');
        $this->load->view('source');
    }


    public function laporan()
    {
        // $role_id=$this->session->userdata('role_id');
        // if (($role_id != 3) or ($role_id != 6)) {
        //     redirect('dashboard_walas');
        // }
        $user['nama_user'] = $this->session->userdata('nama_user');
        $data['data_kelas'] = $this->data_siswa->get_kelas()->result();

        $this->load->view('header');
        $this->load->view('navigation', $user);
        $this->load->view('laporan/laporan_filter_siswa', $data);
        $this->load->view('footer');
        $this->load->view('source');
    }

    public function laporan_filter()
    {
        $user['nama_user'] = $this->session->userdata('nama_user');
        $data['data_kelas'] = $this->data_siswa->get_kelas()->result();

        $kelas = $this->input->post('id_kls');

        $data['kelas'] = $kelas;

        if ($kelas === 'all') {
            $data['data_siswa'] = $this->data_siswa->get_data()->result();
        } else {
            $data['data_siswa'] = $this->data_siswa->get_data_filter($kelas)->result();
        }

        $this->load->view('header');
        $this->load->view('navigation', $user);
        $this->load->view('laporan/laporan_siswa', $data);
        $this->load->view('footer');
        $this->load->view('source');
    }

    function print()
    {
        $kelas = $this->uri->segment('3');

        $data['kelas'] = $kelas;
        
        if ($kelas === 'all') {
            $data['data_siswa'] = $this->data_siswa->get_data()->result();
        } else{
            $data['kelas'] =$this->data_kelas->get_kelas_lap($kelas);
            $data['data_siswa'] = $this->data_siswa->get_data_filter($kelas)->result();}

        $this->load->view('print/siswa', $data);
    }

    function cetak_pdf()
    {
        $this->load->library('dompdf_gen');

        $kelas = $this->uri->segment('3');

        $data['kelas'] = $kelas;

        if ($kelas === 'all') {
            $data['data_siswa'] = $this->db->query("select * from siswa")->result();
        } else {
            $data['data_siswa'] = $this->data_siswa->get_data_filter($kelas)->result();     }

        $this->load->view('pdf/siswa', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("siswa.pdf", array('Attachment' => 0));
        }
    }