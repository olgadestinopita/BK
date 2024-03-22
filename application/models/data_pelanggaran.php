<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pelanggaran extends CI_Model
{

	public function get_data()
	{

		$this->db->select('*');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jbimpel', 'jbimpel.id_jbimpel = bimpel.id_jbimpel');
		$this->db->join('jenis_pelanggaran', 'jenis_pelanggaran.id_jpel = bimpel.id_jpel');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_katpel = bimpel.id_katpel');
		$where = array('bimpel.id_jbimpel' => 'JBP002');
		$this->db->where($where);  
		return $this->db->get();
	}
	public function get_data_grafik()
	{

		$this->db->select('count(id_bimpel) as jumlah_pelanggaran, month(tgl_bimpel) as bulan');
		$this->db->from('bimpel');
		$where = 'id_jbimpel = "JBP002" and YEAR(tgl_bimpel) = YEAR(NOW())';
		$this->db->where($where); 
		$this->db->group_by('bulan');
		
		return $this->db->get();
	}
	public function get_data_total()
	{

		$this->db->select('*, sum(bobot) as total_bobot');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jbimpel', 'jbimpel.id_jbimpel = bimpel.id_jbimpel');
		$this->db->join('jenis_pelanggaran', 'jenis_pelanggaran.id_jpel = bimpel.id_jpel');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_katpel = bimpel.id_katpel');
		$where = array('bimpel.id_jbimpel' => 'JBP002');
		$this->db->where($where); 
		$this->db->group_by('bimpel.nis');
		return $this->db->get();
	}
	
	public function get_data_total_anak($id_ortu)
	{

		$this->db->select('*, sum(bobot) as total_bobot');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jbimpel', 'jbimpel.id_jbimpel = bimpel.id_jbimpel');
		$this->db->join('jenis_pelanggaran', 'jenis_pelanggaran.id_jpel = bimpel.id_jpel');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_katpel = bimpel.id_katpel');
		$where = array('bimpel.id_jbimpel' => 'JBP002','id_ortu'=>$id_ortu);
		$this->db->where($where); 
		$this->db->group_by('bimpel.nis');
		return $this->db->get();
	}
	public function get_pelanggaran_nis($nis)
	{
		$this->db->select('*');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jenis_pelanggaran', 'jenis_pelanggaran.id_jpel = bimpel.id_jpel' );
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_katpel = bimpel.id_katpel');
		$where = array('bimpel.nis' => $nis, 'bimpel.id_jbimpel'=>'JBP002' );
		$this->db->where($where);  
		return $this->db->get();
	}

	public function get_pelanggaran($nip)
	{  
		$this->db->select('siswa.nama,kelas,bimpel.nip,bimpel.id_jpel,bimpel.id_katpel,bimpel.keterangan,tgl_bimpel,id_bimpel,bimpel.nis,nama_guru,kategori,jpel,sanksi,bobot');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jenis_pelanggaran', 'jenis_pelanggaran.id_jpel = bimpel.id_jpel' );
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_katpel = bimpel.id_katpel');
		$this->db->join('user', 'user.nip = guru.nip');
		$where = array('user.nip' =>$nip,'bimpel.id_jbimpel'=>'JBP002');
		$this->db->where($where);
		return $this->db->get();
	}
	public function pelanggaran_nis($nis)
	{  
		$this->db->select('siswa.nama,kelas,bimpel.nip,bimpel.id_jpel,bimpel.id_katpel,bimpel.keterangan,tgl_bimpel,id_bimpel,bimpel.nis,nama_guru,kategori,jpel,sanksi,bobot');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jenis_pelanggaran', 'jenis_pelanggaran.id_jpel = bimpel.id_jpel' );
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_katpel = bimpel.id_katpel');
		$this->db->join('user', 'user.nis = siswa.nis');
		$where = array('user.nis' =>$nis,'bimpel.id_jbimpel'=>'JBP002');
		$this->db->where($where);
		return $this->db->get();
	}
	public function pelanggaran_ortu($id_ortu)
	{  
		$this->db->select('siswa.nama,kelas,bimpel.nip,bimpel.id_jpel,bimpel.id_katpel,bimpel.keterangan,tgl_bimpel,id_bimpel,bimpel.nis,nama_guru,kategori,jpel,sanksi,bobot');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('ortu', 'ortu.id_ortu = siswa.id_ortu');
		$this->db->join('jenis_pelanggaran', 'jenis_pelanggaran.id_jpel = bimpel.id_jpel' );
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_katpel = bimpel.id_katpel');
		$this->db->join('user', 'user.id_ortu = ortu.id_ortu');
		$where = array('user.id_ortu' =>$id_ortu,'bimpel.id_jbimpel'=>'JBP002');
		$this->db->where($where);
		return $this->db->get();
	}
	public function pelanggaran_ortu_total($id_ortu)
	{  
		$this->db->select('sum(bobot) as total_bobot');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('ortu', 'ortu.id_ortu = siswa.id_ortu');
		$this->db->join('jenis_pelanggaran', 'jenis_pelanggaran.id_jpel = bimpel.id_jpel' );
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_katpel = bimpel.id_katpel');
		$this->db->join('user', 'user.id_ortu = ortu.id_ortu');
		$where = array('user.id_ortu' =>$id_ortu,'bimpel.id_jbimpel'=>'JBP002');
		$this->db->where($where);
		return $this->db->get()->row()->total_bobot;
	}
	public function count_rows()
	{
		return $this->db->count_all('bimpel');
	}

	public function get_records($id_bimpel)
	{
		$where = array('id_bimpel' => $id_bimpel);
		$this->db->where($where);
		return $this->db->get('bimpel');
	}
	public function get_kelas_pelanggaran()
	{
		return $this->db->query('select distinct siswa.id_kls,kelas from siswa,kelas where siswa.id_kls=kelas.id_kls order by kelas ');
	}
	public function get_data_filter($kelas)
	{
		$this->db->select('*, sum(bobot) as total_bobot');
		$this->db->from('bimpel');
		$this->db->join('siswa', 'siswa.nis = bimpel.nis');
		$this->db->join('kelas', 'kelas.id_kls = siswa.id_kls');
		$this->db->join('guru', 'guru.nip = bimpel.nip');
		$this->db->join('jbimpel', 'jbimpel.id_jbimpel = bimpel.id_jbimpel');
		$this->db->join('jenis_pelanggaran', 'jenis_pelanggaran.id_jpel = bimpel.id_jpel');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_katpel = bimpel.id_katpel');
		$where = array('bimpel.id_jbimpel' => 'JBP002','siswa.id_kls' => $kelas);
		$this->db->where($where);  
		$this->db->group_by('bimpel.nis');
		return $this->db->get();	
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

