<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_absensi extends CI_Model
{

    public function get_data()
    {
        $this->db->select('*');
		$this->db->from('absensi');
        $this->db->join('siswa', 'siswa.nis = absensi.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
        $this->db->join('absen_siswa', 'absen_siswa.id_absen = absensi.id_absen');
		
		 

        return $this->db->get();
    }

    public function count_rows()
    {
        return $this->db->count_all('absensi');
    }
    public function get_records($id_absensi)
    {
        $where = array('id_absensi' => $id_absensi);
        $this->db->where($where);
        return $this->db->get('absensi');
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($id_absensi, $data, $table)
    {
        $where = array('id_absensi' => $id_absensi);
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function delete_data($id_absensi, $table)
    {
        $where = array('id_absensi' => $id_absensi);
        $this->db->where($where);
        return $this->db->delete($table); 
   }

    public function get_absen(){
		
    return $this->db->get('absen_siswa');
}
}
