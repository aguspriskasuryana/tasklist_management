<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team_model extends CI_Model
{
	
	function get_all_team()
	{
		$this->db->select('*')->from('master_team');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_special_team()
	{
		$this->db->select('*')->from('master_team');

		$this->db->where('id_team IN (23,11,48,12,13,3,46,45,35,36,20,2,4)');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_allteam_in_history_task($month){

		$query = "select distinct(`master_team`.`id_team`),`master_team`.`nama`  FROM `task_list_activity_history` INNER JOIN `master_user` ON `master_user`.`id_user` = `task_list_activity_history`.`id_user` INNER JOIN `master_team` ON `master_team`.`id_team` = `master_user`.`id_team` AND `master_team`.id_company NOT IN (1) WHERE `task_list_activity_history`.`tanggal` LIKE '%".$month."%' ";


		$result = $this->db->query($query);
		return $result->result_array();
	} 
	function get($id_team)
	{
		$this->load->database();
		$query = $this->db->get_where('master_team',array('id_team'=>$id_team));
		return $query->row_array();
	}

	function simpan_data()
	{
		$simpan_data=array
		(
			'id_team'		=>$this->input->post(''),
			'nama'			=>$this->input->post('nama'),
			'keterangan'	=>$this->input->post('keterangan'),
			'jabatan'		=>$this->input->post('jabatan')

		);

		$simpan = $this->db->insert('master_team',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
				'nama'			=>$this->input->post('nama'),
				'keterangan'	=>$this->input->post('keterangan'),
				'jabatan'		=>$this->input->post('jabatan')
			);
				$this->db->where('id_team',$this->input->post('id_team'));
                $this->db->update('master_team', $data);
        }

    function hapus($id_team){
	$this->db->query("delete from master_team where id_team = $id_team");
	}	
	
	
	
}
