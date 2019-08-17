<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ganti_jadwal_req_model extends CI_Model
{
	
	function get_all_ganti_jadwal_req()
	{
		$this->db->select('*')->from('ganti_jadwal_req');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_list_approved_form_req()
	{
		//$this->db->select('*')->from('ganti_jadwal_req')->where('id_paraf !=',0);
		$this->db->select('g.id_ganti_jadwal_req as id_ganti_jadwal_req,t.id_task_list, t.aktifitas, u.nama_lengkap, g.jam_awal, g.jam_baru, g.tanggal_lama, g.tanggal_baru,g.date_req, a.nama_lengkap as nama_paraf, g.time_paraf',false)
			->from('ganti_jadwal_req as g')
			->join('master_user as u','u.id_user=g.id_user','left')
			->join('master_user as a','a.id_user=g.id_paraf','left')
			->join('task_list as t','t.id_task_list=g.id_task_list','inner')
			->where('g.id_paraf !=',0);

		$query = $this->db->get();
		return $query->result_array();
	}
	function get($id_ganti_jadwal_req)
	{
		$this->load->database();
		$query = $this->db->get_where('ganti_jadwal_req',array('id_ganti_jadwal_req'=>$id_ganti_jadwal_req));
		return $query->row_array();
	}

	function simpan_data()
	{
		$simpan_data=array
		(
			'id_ganti_jadwal_req'		=>$this->input->post(''),
			'id_task_list'				=>$this->input->post('id_task'),
			'id_user'					=>$this->input->post('id_user'),
			'jam_awal'					=>$this->input->post('jam_awal'),
			'jam_baru'					=>$this->input->post('jam_baru'),
			'tanggal_lama'				=>$this->input->post('tanggal_lama'),
			'tanggal_baru'				=>$this->input->post('tanggal_baru'),
			'date_req'					=>$this->input->post('date_req'),
			'id_paraf'					=>$this->input->post('id_paraf'),
			'time_paraf'				=>$this->input->post('time_paraf')
		);

		$simpan = $this->db->insert('ganti_jadwal_req',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
			'id_task_list'				=>$this->input->post('id_task'),
			'id_user'					=>$this->input->post('id_user'),
			'jam_awal'					=>$this->input->post('jam_awal'),
			'jam_baru'					=>$this->input->post('jam_baru'),
			'tanggal_lama'				=>$this->input->post('tanggal_lama'),
			'tanggal_baru'				=>$this->input->post('tanggal_baru'),
			'date_req'					=>$this->input->post('date_req'),
			'id_paraf'					=>$this->input->post('id_paraf'),
			'time_paraf'				=>$this->input->post('time_paraf')
			);
				$this->db->where('id_ganti_jadwal_req',$this->input->post('id_ganti_jadwal_req'));
                $this->db->update('ganti_jadwal_req', $data);
        }

    function hapus($id_ganti_jadwal_req){
		$this->db->query("delete from ganti_jadwal_req where id_ganti_jadwal_req = $id_ganti_jadwal_req");
	}	

	function update_task_list($status,$id_user,$id_task_list,$time){
		$data=array(
			'id_paraf'=>$id_user,
			//'pelaksanaan'=>$status,
			//'keterangan'=>$keterangan,
			'last_modified'=>$time
		);
			$this->db->where('id_task_list',$id_task_list);
			$this->db->update('task_list', $data);
	}
	
	function update_ganti_jadwal_req($status,$id_ganti_jadwal_req,$id_user,$time){
		$data=array(
			'id_paraf'=>$id_user,
			//'pelaksanaan'=>$status,
			//'keterangan'=>$keterangan,
			'time_paraf'=>$time
		);
			$this->db->where('id_ganti_jadwal_req',$id_ganti_jadwal_req);
			$this->db->update('ganti_jadwal_req', $data);
	}
	
	
}
