<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_bimbingan extends CI_Model
{
	//menampilkan bimbingan siswa secara keseluruhan
	public function get_data()
	{

		$this->db->select('*');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jenis_bimbingan', 'jenis_bimbingan.id_jbim = bimpel.id_jbim' );
		$this->db->join('jbimpel', 'jbimpel.id_jbimpel = bimpel.id_jbimpel');
		$where = array('bimpel.id_jbimpel' =>'JBP001');
		return $this->db->get();
	}
	//menampilkan bimbingan siswa berdasarkan nip
	public function get_bimbingan($nip)
	{  
		$this->db->select('*');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jenis_bimbingan', 'jenis_bimbingan.id_jbim = bimpel.id_jbim' );
		$this->db->join('jbimpel', 'jbimpel.id_jbimpel = bimpel.id_jbimpel');
		$this->db->join('user', 'user.nip = guru.nip');
		$where = array('user.nip' =>$nip,'bimpel.id_jbimpel'=>'JBP001');
		$this->db->where($where);
		return $this->db->get();
	}


	//menampilkan bimbingan siswa berdasarkan nis
	public function bimbingan_nis($nis)
	{  
		$this->db->select('*');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jenis_bimbingan', 'jenis_bimbingan.id_jbim = bimpel.id_jbim' );
		$this->db->join('jbimpel', 'jbimpel.id_jbimpel = bimpel.id_jbimpel');
		$where = array('siswa.nis' =>$nis,'bimpel.id_jbimpel'=>'JBP001');
		$this->db->where($where);
		return $this->db->get();
	}
	//menampilkan bimbingan siswa berdasarkan id_ortu
	public function bimbingan_ortu($id_ortu)
	{  
		$this->db->select('*');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jenis_bimbingan', 'jenis_bimbingan.id_jbim = bimpel.id_jbim' );
		$this->db->join('jbimpel', 'jbimpel.id_jbimpel = bimpel.id_jbimpel');
		$this->db->join('ortu', 'ortu.id_ortu = siswa.id_ortu');
		$where = array('ortu.id_ortu' =>$id_ortu,'bimpel.id_jbimpel'=>'JBP001');
		$this->db->where($where);
		return $this->db->get();
	}
	//input bimbingan ditabel bimbingan
	public function get_bimbingan_nis($nis)
	{
		$this->db->select('*');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jenis_bimbingan', 'jenis_bimbingan.id_jbim = bimpel.id_jbim' );
		$this->db->join('jbimpel', 'jbimpel.id_jbimpel = bimpel.id_jbimpel');
		$where = array('bimpel.nis' => $nis, 'bimpel.id_jbimpel'=>'JBP001' );
		$this->db->where($where);  
		return $this->db->get();
	}
	

	public function count_rows()
	{
		return $this->db->count_all('bimpel');
	}

	public function get_kelas_bimbingan()
	{
		return $this->db->query('select distinct siswa.id_kls,kelas from siswa,kelas where siswa.id_kls=kelas.id_kls order by kelas ');
	}
	public function get_data_grafik()
	{

		$this->db->select('count(id_bimpel) as jumlah_bimbingan, month(tgl_bimpel) as bulan');
		$this->db->from('bimpel');
		$where = 'id_jbimpel = "JBP001" and YEAR(tgl_bimpel) = YEAR(NOW())';
		$this->db->where($where); 
		$this->db->group_by('bulan');
		
		return $this->db->get();
	}
	public function get_data_filter($kelas)
	{
		
		$this->db->select('*');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jenis_bimbingan', 'jenis_bimbingan.id_jbim = bimpel.id_jbim' );
		$this->db->join('jbimpel', 'jbimpel.id_jbimpel = bimpel.id_jbimpel');
		$where = array('bimpel.id_jbimpel' => 'JBP001','siswa.id_kls' => $kelas);
		$this->db->where($where); 
		return $this->db->get(); 
		}
	
	public function get_records($id_bimpel)
	{
		$where = array('id_bimpel' => $id_bimpel);
		$this->db->where($where);
		return $this->db->get('bimpel');
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($id_bimpel, $data, $table)
	{
		$where = array('id_bimpel' => $id_bimpel);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($id_bimpel, $table)
	{
		$where = array('id_bimpel' => $id_bimpel);
		$this->db->where($where);
		return $this->db->delete($table);
	}
}
