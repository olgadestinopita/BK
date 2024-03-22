<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->helper(array('url'));
        if ($this->session->userdata('is_active') != 'login') {
            redirect(base_url());
        }
    }
    public function join()
    {
        $this->session->set_userdata('chat', 'online');
        redirect(base_url("chat/room"));
    }

    public function room($nis,$nip)
    {
        $role_id = $this->session->userdata('role_id');
        $id_user = $this->session->userdata('id_user');
        $data['penerima'] = "";
        if ($role_id == 4) {
            $data['penerima'] = $this->db->select('nama_guru')->where('nip', $nip)->get('guru')->row()->nama_guru;
        } else {
            $data['penerima'] = $this->db->select('nama')->where('nis', $nis)->get('siswa')->row()->nama;
        }
        $data['nama_user'] = $this->session->userdata('nama_user');
        $this->db->select('*');
		$this->db->from('chat');
		$this->db->join('siswa', 'siswa.nis = chat.nis');
		$this->db->join('guru', 'guru.nip = chat.nip');
        $where = array('chat.nis' =>$nis,'chat.nip'=>$nip);
		$this->db->where($where);
		$data['contents'] = $this->db->get()->result();
        $data['nis'] = $nis;
        $data['nip'] = $nip;
        $this->load->view('header');
        $this->load->view('navigation', $data);
        $this->load->view('chat/chat_room', $data);
        $this->load->view('footer');
        $this->load->view('source');
        $this->db->set('pesan',1);
        $where = array('chat.nis' =>$nis,'chat.nip'=>$nip,'pengirim <>'=>$id_user,'pesan'=>0);
        $this->db->where($where);
        $this->db->update('chat');
    }
    public function get_chat($nis,$nip)
    {
        
        $this->db->select('*');
		$this->db->from('chat');
		$this->db->join('siswa', 'siswa.nis = chat.nis');
		$this->db->join('guru', 'guru.nip = chat.nip');
        $where = array('chat.nis' =>$nis,'chat.nip'=>$nip);
		$this->db->where($where);
		$data['contents'] = $this->db->get()->result();
	    echo json_encode($data);
        
    }

    public function post()
    {
        // $role_id=$this->session->userdata('role_id');
        // if (($role_id == 3) or ($role_id == 2)) {
			 	
		// 	}
        $pesan = $_POST['text'];
        $nis = $_POST['nis'];
        $nip = $_POST['nip'];
        $pengirim = $_POST['pengirim'];

        $data = array(
        
            'nip' => $nip,
            'nis' => $nis,
            'pengirim'=> $pengirim,
            'pesan' => $pesan
        );
        $this->db->insert('chat',$data );
    }

   
}
