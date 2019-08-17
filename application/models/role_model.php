<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends CI_Model
{
	
	function get_all_role()
	{
		$this->db->select('*')->from('user_role');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get($id_role)
	{
		$this->load->database();
		$query = $this->db->get_where('user_role',array('id_role'=>$id_role));
		return $query->row_array();
	}

	function simpan_data()
	{
		$maxid = $this->get_maxid();
		$tmaxid = 1+$maxid['id_role'];
		$simpan_data=array
		(
			'id_role'		=>$tmaxid,
			'nama_role'		=>$this->input->post('nama_role')
		);

		$simpan = $this->db->insert('user_role',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
				'nama_role'			=>$this->input->post('nama_role')
			);
				$this->db->where('id_role',$this->input->post('id_role'));
                $this->db->update('user_role', $data);
        }

    function hapus($id_role){
		$this->db->query("delete from user_role where id_role = $id_role");
	}	
	
	function get_maxid(){
		$this->db->select('MAX(id_role) AS id_role');
		$this->db->from('user_role');
		$result = $this->db->get();
		return $result->row_array();
	}

	function get_walldisplay(){
		$db2 = $this->load->database('database2', TRUE);
		$db2->select('*');
		$db2->from('balakar');
		$resultx = $db2->get();
		return $resultx->result_array();
	}
	
}
