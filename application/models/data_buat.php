<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_buat extends CI_Model
{

    public function get_data()
    {
        $this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_role', 'user_role.id_role = user.role_id');
        // $this->db->join('siswa', 'siswa.id_user = user.id_user');

		return $this->db->get();
    }

    public function count_rows()
    {
        return $this->db->count_all('user');
    }
    public function get_records($username)
    {
        $where = array('username' => $username);
        $this->db->where($where);
        return $this->db->get('user');
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($id_user, $data, $table)
    {
        $where = array('id_user' => $id_user);
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function delete_data($id_user, $table)
	{
		$where = array('id_user' => $id_user);
		$this->db->where($where);
		return $this->db->delete($table);
    }
}
