<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_jabatan extends CI_Model {

	public function get_data() {
		return $this->db->get('jabatan');
	}

	public function count_rows() {
		return $this->db->count_all('jabatan');
	}

	public function get_records($where){
		$this->db->where($where);
		return $this->db->get('jabatan');
	}


	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($where, $data, $table){
		$this->db->where($where);
		return $this->db->replace($table, $data);
	}

	public function delete_data($where, $table){
		$this->db->where($where);
		return $this->db->delete($table);
	}
}