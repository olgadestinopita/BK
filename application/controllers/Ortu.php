<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ortu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library('form_validation');
        $this->load->model('data_ortu');
        
    }

    public function index()
    {
        $user['nama_user'] = $this->session->userdata('nama_user');
        $data['data_ortu'] = $this->data_ortu->get_data()->result();
        
        $this->load->view('header');
        $this->load->view('navigation', $user);
        $this->load->view('ortu', $data);
        $this->load->view('footer');
        $this->load->view('source');
    }

    public function add()
    {
        $info['datatype'] = 'ortu';
        $info['operation'] = 'Input';

        $id_ortu = $this->input->post('id_ortu');
        $nama_ortu = $this->input->post('nama_ortu');
        $id_pekerjaan = $this->input->post('id_pekerjaan');
        $jekel_ortu = $this->input->post('jekel_ortu');
        $tlp_ortu = $this->input->post('tlp_ortu');
        $this->load->view('header');

        $records = $this->data_ortu->get_records($id_ortu)->result();
        if (count($records) == 0) {
            $data = array(
                'id_ortu' => $id_ortu,
                'nama_ortu' => $nama_ortu,
                'id_pekerjaan' => $id_pekerjaan,
                'jekel_ortu' => $jekel_ortu,
                'tlp_ortu' => $tlp_ortu
            );
           $this->data_ortu->insert_data($data, 'ortu');

            $this->load->view('notifications/insert_success', $info);
        } else {
            $this->load->view('notifications/insert_failed', $info);
        }
        $this->load->view('source');
    }

    public function edit()
    {
        $info['datatype'] = 'ortu';
        $info['operation'] = 'Ubah';

        $id_ortu = $this->input->post('id_ortu');
        $nama_ortu = $this->input->post('nama_ortu');
        $id_pekerjaan = $this->input->post('id_pekerjaan');
        $jekel_ortu = $this->input->post('jekel_ortu');
        $tlp_ortu = $this->input->post('tlp_ortu');
        $this->load->view('header');

        $data = array(
                //'id_ortu' => $id_ortu,
                'nama_ortu' => $nama_ortu,
                'id_pekerjaan' => $id_pekerjaan,
                'jekel_ortu' => $jekel_ortu,
                'tlp_ortu' => $tlp_ortu
        );
        $action = $this->data_ortu->update_data($id_ortu, $data, 'ortu');

        if ($action) {
            $this->load->view('notifications/insert_success', $info);
        } else {
            $this->load->view('notifications/insert_failed', $info);
        }


        $this->load->view('source');
    }

    public function delete()
    {
        $info['datatype'] = 'ortu';

        $id_ortu = $this->uri->segment('3');

        $this->load->view('header');

        $action = $this->data_ortu->delete_data($id_ortu, 'ortu');
        if ($action) {
            $this->load->view('notifications/delete_success', $info);
        } else {
            $this->load->view('notifications/delete_failed', $info);
        }

        $this->load->view('source');
    }

    // public function laporan()
    // {
    //     $user['username'] = $this->session->userdata('username');
    //     $user['nama_user'] = $this->session->userdata('nama_user');

    //     $data['data_tahun_lahir'] = $this->data_guru->get_tahun_lahir()->result();

    //     $this->load->view('header');
    //     $this->load->view('navigation', $user);
    //     $this->load->view('laporan/laporan_filter_guru', $data);
    //     $this->load->view('footer');
    //     $this->load->view('source');
    // }

    // public function laporan_filter()
    // {
    //     $user['username'] = $this->session->userdata('username');
    //     $user['nama_user'] = $this->session->userdata('nama_user');

    //     $dari = $this->input->post('dari');
    //     $sampai = $this->input->post('sampai');

    //     $data['dari'] = $dari;
    //     $data['sampai'] = $sampai;

    //     $data['data_guru'] = $this->db->query("select * from guru where substring(nip, 7, 2) >= '$dari' and substring(nip, 7, 2) <= '$sampai'")->result();

    //     $this->load->view('header');
    //     $this->load->view('navigation', $user);
    //     $this->load->view('laporan/laporan_guru', $data);
    //     $this->load->view('footer');
    //     $this->load->view('source');
    // }

    // function print()
    // {
    //     $dari = $this->uri->segment('3');
    //     $sampai = $this->uri->segment('4');

    //     $data['dari'] = $dari;
    //     $data['sampai'] = $sampai;

    //     $data['data_guru'] = $this->db->query("select * from guru where substring(nip, 7, 2) >= '$dari' and substring(nip, 7, 2) <= '$sampai'")->result();

    //     $this->load->view('print/guru', $data);
    // }

    // function cetak_pdf()
    // {
    //     $this->load->library('dompdf_gen');

    //     $dari = $this->uri->segment('3');
    //     $sampai = $this->uri->segment('4');

    //     $data['dari'] = $dari;
    //     $data['sampai'] = $sampai;

    //     $data['data_guru'] = $this->db->query("select * from guru where substring(nip, 7, 2) >= '$dari' and substring(nip, 7, 2) <= '$sampai'")->result();


    //     $this->load->view('pdf/guru', $data);

    //     $paper_size = 'A4';
    //     $orientation = 'potrait';
    //     $html = $this->output->get_output();
    //     $this->dompdf->set_paper($paper_size, $orientation);

    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("guru.pdf", array('Attachment' => 0));
    // }
}
