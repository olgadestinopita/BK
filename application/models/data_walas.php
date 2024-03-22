<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_walas extends CI_Model
{

	public function get_data()
	{
		// return $this->db->query('select  siswa.nis,nama, siswa.id_kls, kelas, siswa.id_walas, nama_guru from siswa, kelas, walas,guru where siswa.id_kls=kelas.id_kls and walas.nip=guru.nip and siswa.id_walas=walas.id_walas');

		$this->db->select(' walas.id_kls, kelas, walas.nip,tahun,walas.id_walas, nama_guru');
		$this->db->from('walas');
		$this->db->join('kelas', 'kelas.id_kls = walas.id_kls');
		$this->db->join('guru', 'guru.nip = walas.nip');
		return $this->db->get();
	}
	public function count_rows()
	{
		return $this->db->count_all('walas');
	}

	public function get_records($id_walas)
	{
		$where = array('id_walas' => $id_walas);
		$this->db->where($where);
		return $this->db->get('walas');
	}

	public function get_tahun_ngajar()
	{
		return $this->db->query('select distinct substring(id_walas, 7, 2) as tahun_lahir from guru');
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($id_walas, $data, $table)
	{
		$where = array('id_walas' => $id_walas);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($id_walas, $table)
	{
		$where = array('id_walas' => $id_walas);
		$this->db->where($where);
		return $this->db->delete($table);
	}
}
