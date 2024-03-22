<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kpelanggaran extends CI_Model {

	public function get_data() {
		return $this->db->get('kategori_pelanggaran');
	}

	public function count_rows() {
		return $this->db->count_all('kategori_pelanggaran');
	}

	public function get_records($id_katpel){
		$where = array('id_katpel' => $id_katpel);
		$this->db->where($where);
		return $this->db->get('kategori_pelanggaran');
	}

	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($id_katpel, $data, $table){
        
            $where = array('id_katpel' => $id_katpel);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($id_katpel, $table){
        $where = array('id_katpel' => $id_katpel);
		$this->db->where($where);
		return $this->db->delete($table);
	}

}