<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_jpelanggaran extends CI_Model {

	public function get_data() {
		$this->db->select('*');
		$this->db->from('jenis_pelanggaran');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_katpel = jenis_pelanggaran.id_katpel');
		return $this->db->get();
	}

	public function count_rows() {
		return $this->db->count_all('jenis_pelanggaran');
	}
	public function get_kategori($bobot)
	{   $this->db->select('kategori_pelanggaran.id_katpel,kategori');
		$this->db->from('kategori_pelanggaran');
		$where = array('batas_bobot <=' => $bobot);
		$this->db->where($where);
		$this->db->order_by('batas_bobot','desc');
		return $this->db->get()->row();
	}
	public function get_kategori_pelanggaran($id_jpel)
	{   $this->db->select('kategori_pelanggaran.id_katpel,kategori');
		$this->db->from('jenis_pelanggaran');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_katpel = jenis_pelanggaran.id_katpel');
		$where = array('id_jpel' => $id_jpel);
		$this->db->where($where);
		return $this->db->get()->row();
	}
	public function get_bobot($id_jpel)
	{   $this->db->select('bobot');
		$this->db->from('jenis_pelanggaran');
		$where = array('id_jpel' => $id_jpel);
		$this->db->where($where);
		return $this->db->get()->row()->bobot;
	}
	public function get_jumlah_bobot($nis)
	{   $this->db->select_sum('bobot');
		$this->db->from('bimpel');
		$this->db->join('jenis_pelanggaran', 'jenis_pelanggaran.id_jpel = bimpel.id_jpel');
		
		$where = array('nis' => $nis);
		$this->db->where($where);
		return $this->db->get()->row()->bobot;
	}

	public function get_records($id_jpel){
		$where = array('id_jpel' => $id_jpel);
		$this->db->where($where);
		return $this->db->get('jenis_pelanggaran');
	}

	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($id_jpel, $data, $table){
        
            $where = array('id_jpel' => $id_jpel);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($id_jpel, $table){
        $where = array('id_jpel' => $id_jpel);
		$this->db->where($where);
		return $this->db->delete($table);
	}

}