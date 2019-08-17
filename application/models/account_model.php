<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model
{
	function add_user($username, $password, $role)
	{
		$data = array(
			'username' => $username,
			'password' => md5("xx-".$password."-xx"),
			'role' => $role
		);
		$this->db->insert('master_user', $data);
		return $this->db->insert_id();
	}

	function login_log($jalur)
	{

		$id = $this->session->userdata('user_data');
		$data = array(
			'username' => $id['nama_lengkap'],
			'user_id' => $id['id_user'],
			'jalur' => $jalur
		);
		$simpan = $this->db->insert('loginlog', $data);
		return $simpan;
	}
	
	
	function login($username, $pwd)
	{
		$this->db->select('*')->from('master_user');
		$this->db->where('username', $username);
		$this->db->where('password', md5("xx-".$pwd."-xx"));

        $query = $this->db->get();
        
        return $query->row_array();
	}

	function loginXXX($username)
	{
		$this->db->select('*')->from('master_user');
		$this->db->where('username', $username);

        $query = $this->db->get();
        
        return $query->row_array();
	}
    
    function login_encrypted($username, $pwd)
	{
		$this->db
            ->select('*')
            ->from('master_user')
            ->where('username', $username)
            ->where('password', $pwd);
        $query = $this->db->get();
        return $query->row_array();
	}
	
}
