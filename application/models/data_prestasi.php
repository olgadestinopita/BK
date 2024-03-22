<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_prestasi extends CI_Model
{

    public function get_data()
    {
        $this->db->select('*');
		$this->db->from('prestasi');
		$this->db->join('siswa', 'siswa.nis = prestasi.nis');
        $this->db->join('walas', 'walas.id_walas = siswa.id_walas');
        $this->db->join('guru', 'guru.nip = walas.nip');
        $this->db->join('ortu', 'ortu.id_ortu = siswa.id_ortu');
        $this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
        $this->db->join('kategori_prestasi', 'kategori_prestasi.id_katpres = prestasi.id_katpres');
		return $this->db->get();
    }
    public function get_prestasi_nis($nis)
	{
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->join('siswa', 'siswa.nis = prestasi.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('kategori_prestasi', 'kategori_prestasi.id_katpres = prestasi.id_katpres');
		$where = array('prestasi.nis' => $nis);
		$this->db->where($where);  
		return $this->db->get();
	}
    public function prestasi_nip($nip)
	{  
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->join('siswa', 'siswa.nis = prestasi.nis');
        $this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
        $this->db->join('walas', 'walas.id_walas = siswa.id_walas');
        $this->db->join('guru', 'guru.nip = walas.nip');
        $this->db->join('kategori_prestasi', 'kategori_prestasi.id_katpres = prestasi.id_katpres');
        $this->db->join('user', 'user.nip = guru.nip');
        $where = array('user.nip' =>$nip);
		$this->db->where($where);
		return $this->db->get();
	}
    public function prestasi_nis($nis)
	{  
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->join('siswa', 'siswa.nis = prestasi.nis');
        $this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
        $this->db->join('kategori_prestasi', 'kategori_prestasi.id_katpres = prestasi.id_katpres');
        $this->db->join('user', 'user.nis = siswa.nis');
        $where = array('user.nis' =>$nis);
		$this->db->where($where);
		return $this->db->get();
	}
    public function prestasi_ortu($id_ortu)
	{   
        $this->db->select('*');
		$this->db->from('prestasi');
		$this->db->join('siswa', 'siswa.nis = prestasi.nis');
        $this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
        $this->db->join('kategori_prestasi', 'kategori_prestasi.id_katpres = prestasi.id_katpres');
		$this->db->join('ortu', 'ortu.id_ortu = siswa.id_ortu');
		$this->db->join('user', 'user.id_ortu = ortu.id_ortu');
		$where = array('user.id_ortu' =>$id_ortu);
		$this->db->where($where);
		return $this->db->get();
	}
    public function count_rows()
    {
        return $this->db->count_all('prestasi');
    }
    public function get_records($id_prestasi)
    {
        $where = array('id_prestasi' => $id_prestasi);
        $this->db->where($where);
        return $this->db->get('prestasi');
    }
    public function get_kelas_prestasi()
	{
		return $this->db->query('select distinct siswa.id_kls,kelas from siswa,kelas where siswa.id_kls=kelas.id_kls order by kelas ');
	}

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function get_data_filter($kelas)
	{
        $this->db->select('*');
		$this->db->from('prestasi');
		$this->db->join('siswa', 'siswa.nis = prestasi.nis');
        $this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
        $this->db->join('kategori_prestasi', 'kategori_prestasi.id_katpres = prestasi.id_katpres');
		$where = array('siswa.id_kls' => $kelas);
		$this->db->where($where);
		
        return $this->db->get();
	}
	
    public function update_data($id_prestasi, $data, $table)
    {
        $where = array('id_prestasi' => $id_prestasi);
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

   public function delete_data($id_prestasi, $table)
{
    $where = array('id_prestasi' => $id_prestasi);
    $this->db->where($where);
    return $this->db->delete($table);
    }
}
