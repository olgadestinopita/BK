<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_siswa extends CI_Model
{
	public function get_data()
	{
		$this->db->select('siswa.nis,siswa.id_kls,siswa.id_walas,siswa.id_ortu,kelas,nama,siswa.alamat,siswa.tgl_lahir,siswa.tempat_lahir,email,no_hp,jk,nama_guru,nama_ortu');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('walas', 'walas.id_walas = siswa.id_walas');
		$this->db->join('guru', 'guru.nip = walas.nip');
		$this->db->join('ortu', 'ortu.id_ortu = siswa.id_ortu','left');
		return $this->db->get();
	}

	//menampilkan data bimbingan persiswa (controller bimbingan->bimbingan_siswa)
	public function get_siswa_nis($nis)
	{
		$this->db->select('siswa.nis,kelas,nama,nama_guru');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('walas', 'walas.id_walas = siswa.id_walas');
		$this->db->join('guru', 'guru.nip = walas.nip');
		$where = array('nis' => $nis);
		$this->db->where($where);
		return $this->db->get()->row();
	}
	public function get_data_nis($nis)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('walas', 'walas.id_walas = siswa.id_walas');
		$this->db->join('guru', 'guru.nip = walas.nip');
		$where = array('nis' => $nis);
		$this->db->where($where);
		return $this->db->get();
	}

	public function get_data_kelas($id_kls)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');	
		$where = array('siswa.id_kls' => $id_kls);
		$this->db->where($where);
		return $this->db->get();
	}
	public function get_nip_guru($nis)
	{   $this->db->select('walas.nip,nama_guru');
		$this->db->from('siswa');
		$this->db->join('walas', 'walas.id_walas = siswa.id_walas');
		$this->db->join('guru', 'guru.nip = walas.nip');
		$where = array('nis' => $nis);
		$this->db->where($where);
		return $this->db->get()->row();
	}
	public function get_siswa($nip)
	{  $this->db->select('siswa.nis,siswa.id_kls,siswa.id_walas,siswa.id_ortu,kelas,nama,siswa.alamat,siswa.tgl_lahir,siswa.tempat_lahir,email,no_hp,jk,nama_guru,nama_ortu');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('walas', 'walas.id_walas = siswa.id_walas');
		$this->db->join('guru', 'guru.nip = walas.nip');
		$this->db->join('ortu', 'ortu.id_ortu = siswa.id_ortu');
		$this->db->join('user', 'user.nip = guru.nip');
		$where = array('user.nip' => $nip);
		$this->db->where($where);
		return $this->db->get();
	}

	public function get_data_filter($kelas)
	{

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('walas', 'walas.id_walas = siswa.id_walas');
		$this->db->join('guru', 'guru.nip = walas.nip');
		$this->db->join('ortu', 'ortu.id_ortu = siswa.id_ortu','left');
		$where = array('siswa.id_kls' => $kelas);
		$this->db->where($where);
		// $this->db->limit(200);
		return $this->db->get();
	}

	public function count_rows()
	{
		return $this->db->count_all('siswa');
	}
	public function get_kelas()
	{
		return $this->db->query('select distinct siswa.id_kls,kelas from siswa,kelas where siswa.id_kls=kelas.id_kls order by kelas ');
	}

	public function get_records($nis)
	{
		$where = array('nis' => $nis);
		$this->db->where($where);
		return $this->db->get('siswa');
	}
	 
		

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($nis, $data, $table)
	{
		$where = array('nis' => $nis);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($nis, $table)
	{
		$where = array('nis' => $nis);
		$this->db->where($where);
		return $this->db->delete($table);
	}
}
