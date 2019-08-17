<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model
{
	function get_data($tanggal){
		$this->db->select('tl.jam, tl.id_act,tl.id_user, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner');
		$this->db->from('task_list_activity_history as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->where('tl.tanggal',$tanggal);
		$this->db->order_by('tl.jam','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 
}
