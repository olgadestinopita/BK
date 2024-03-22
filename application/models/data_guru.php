<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_guru extends CI_Model
{

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('jabatan', 'jabatan.id_jabatan = guru.id_jabatan');
		$this->db->join('status_guru', 'status_guru.id_status = guru.id_status');
		return $this->db->get();
	}

	public function get_data_nip($nip)
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('jabatan', 'jabatan.id_jabatan = guru.id_jabatan');
		$this->db->join('status_guru', 'status_guru.id_status = guru.id_status');
		$where = array('nip' => $nip);
		$this->db->where($where);
		return $this->db->get();
	}

	public function count_rows()
	{
		return $this->db->count_all('guru');
	}

	public function get_records($nip)
	{
		$where = array('nip' => $nip);
		$this->db->where($where);
		return $this->db->get('guru');
	}
	public function get_nip($id_user)
	{   $this->db->select('nip');
		$this->db->from('user');
		$where = array('id_user' => $id_user);
		$this->db->where($where);
		return $this->db->get()->row()->nip;
	}
	// public function get_nip_user($id_user)
	// {   $this->db->select('nip');
	// 	$this->db->from('guru');
	// 	$where = array('id_user' => $id_user);
	// 	$this->db->where($where);
	// 	return $this->db->get()->row()->nip;
	// }
	public function get_nip_walas($nis)
	{   $this->db->select('nip');
		$this->db->from('siswa');
		$this->db->join('walas','walas.id_walas=siswa.id_walas');
		$where = array('nis' => $nis);
		$this->db->where($where);
		return $this->db->get()->row()->nip;
	}	
	// 	public function get_walas($nis)
	// 	{   $this->db->select('nip');
	// 		$this->db->from('siswa');
	// 		$this->db->join('walas','walas.id_walas=siswa.id_walas');
	// 		$where = array('nis' => $nis);
	// 		$this->db->where($where);
	// 		return $this->db->get()->row()->nip;
		
	// }
	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($nip, $data, $table)
	{
		$where = array('nip' => $nip);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($nip, $table)
	{
		$where = array('nip' => $nip);
		$this->db->where($where);
		return $this->db->delete($table);
	}
	
	public function get_status(){
		
		return $this->db->get('status_guru');
	}

}

