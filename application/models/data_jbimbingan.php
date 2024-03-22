<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_jbimbingan extends CI_Model {

	public function get_data() {
		return $this->db->get('jenis_bimbingan');
	}

	public function count_rows() {
		return $this->db->count_all('jenis_bimbingan');
	}

	public function get_records($id_jbim){
		$where = array('id_jbim' => $id_jbim);
		$this->db->where($where);
		return $this->db->get('jenis_bimbingan');
	}

	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($id_jbim, $data, $table){
        $where = array('id_jbim' => $id_jbim);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($id_jbim, $table){
        $where = array('id_jbim' => $id_jbim);
		$this->db->where($where);
		return $this->db->delete($table);
	}

}