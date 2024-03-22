<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ortu extends CI_Model {

	public function get_data() {

		 $this->db->select('*');
		 $this->db->from('ortu');
		 $this->db->join('pekerjaan_ortu', 'pekerjaan_ortu.id_pekerjaan = ortu.id_pekerjaan','left');
		 return $this->db->get();
	}
	public function get_data_ortu($id_ortu) {

		$this->db->select('*');
		$this->db->from('ortu');
		$this->db->join('pekerjaan_ortu', 'pekerjaan_ortu.id_pekerjaan = ortu.id_pekerjaan');
		$where = array('id_ortu' => $id_ortu);
		$this->db->where($where);
		return $this->db->get();
	}

	public function count_rows() {
		return $this->db->count_all('ortu');
	}
	public function get_records($id_ortu){
		$where = array('id_ortu' => $id_ortu);
		$this->db->where($where);
		return $this->db->get('ortu');
	}

	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($id_ortu, $data, $table)
	{
		$where = array('id_ortu' => $id_ortu);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	// public function update_data($id_ortu, $data, $table){
	// 	$where = array('id_ortu' => $id_ortu);
	// 	$this->db->where($where);
	// 	return $this->db->update($table, $data);
	// }

	public function delete_data($id_ortu,$table){
		$where = array('id_ortu' => $id_ortu);
		$this->db->where($where);
		return $this->db->delete($table);
	}

}