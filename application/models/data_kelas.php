<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kelas extends CI_Model {

	public function get_data() {
		return $this->db->get('kelas');
	}

	public function count_rows() {
		return $this->db->count_all('kelas');
	}
	public function get_nip_guru($id_kls)
	{   $this->db->select('id_walas,walas.nip,nama_guru');
		$this->db->from('walas');
		$this->db->join('guru', 'guru.nip = walas.nip');
		$where = array('id_kls' => $id_kls);
		$this->db->where($where);
		return $this->db->get()->row();
	}
	public function get_records($id_kls){ 
		$where = array('id_kls' => $id_kls);
		$this->db->where($where);
		return $this->db->get('kelas');
	}
	public function get_kelas_lap($id_kls)
	{   $this->db->select('kelas');
		$this->db->from('kelas');
		$where = array('id_kls' => $id_kls);
		$this->db->where($where);
		return $this->db->get()->row()->kelas;
	}
	public function get_prestasi_lap($id_kls)
	{   $this->db->select('kelas');
		$this->db->from('kelas');
		$where = array('id_kls' => $id_kls);
		$this->db->where($where);
		return $this->db->get()->row()->kelas;
	}
	public function get_pelanggaran_lap($id_kls)
	{   $this->db->select('kelas');
		$this->db->from('kelas');
		$where = array('id_kls' => $id_kls);
		$this->db->where($where);
		return $this->db->get()->row()->kelas;
	}
	public function get_pelanggaran_siswa($id_kls)
	{   $this->db->select('kelas');
		$this->db->from('kelas');
		$where = array('id_kls' => $id_kls);
		$this->db->where($where);
		return $this->db->get()->row()->kelas;
	}
	public function get_bimbingan_lap($id_kls)
	{   $this->db->select('kelas');
		$this->db->from('kelas');
		$where = array('id_kls' => $id_kls);
		$this->db->where($where);
		return $this->db->get()->row()->kelas;
	}
	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($id_kls, $data, $table){
		$where = array('id_kls' => $id_kls);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($id_kls,$table){
		$where = array('id_kls' => $id_kls);
		$this->db->where($where);
		return $this->db->delete($table);
	}

}