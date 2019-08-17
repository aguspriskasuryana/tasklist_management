<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Repository_problem_model extends CI_Model
{
	
	function get_all_repository_problem()
	{
		$this->db->select('*')->from('repository_problem');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get($id_repository_problem)
	{
		$this->load->database();
		$query = $this->db->get_where('repository_problem',array('id_repository_problem'=>$id_repository_problem));
		return $query->row_array();
	}



	function simpan_data()
	{

		$simpan_data=array
		(
			'id_repository_problem'		=>$this->input->post('id_repository_problem'),
			'nama'						=>$this->input->post('nama'),
			'permasalahan'				=>$this->input->post('permasalahan'),
			'langkah'					=>$this->input->post('langkah'),
			//'time_update'				=>$this->input->post('time_update'),
			'user_id'					=>$this->input->post('user_id')
		);

		$simpan = $this->db->insert('repository_problem',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
           
			'id_repository_problem'		=>$this->input->post('id_repository_problem'),
			'nama'						=>$this->input->post('nama'),
			'permasalahan'				=>$this->input->post('permasalahan'),
			'langkah'					=>$this->input->post('langkah'),
			//'time_update'				=>$this->input->post('time_update'),
			'user_id'					=>$this->input->post('user_id')
			);
				$this->db->where('id_repository_problem',$this->input->post('id_repository_problem'));
                $this->db->update('repository_problem', $data);
        }

    function hapus($id_repository_problem){
		$this->db->query("delete from repository_problem where id_repository_problem = $id_repository_problem");
	}	
	
}
