<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Harian_SPV_model extends CI_Model
{
	
	function get_all_harian_spv()
	{

		$timeYear = date('Y');
		$time = date('Y-m-d', strtotime('-2 month'));
		//var_dump($time);
		$this->db->select('*')->from('harian_spv');

		$this->db->where('tanggal > "'.$time.'"');
		$this->db->order_by('waktu_kejadian','DESC');
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get_harian_spv_by_shift_date($date,$shift)
	{
		$this->db->select('*')->from('harian_spv');
		$this->db->order_by('waktu_kejadian','DESC');
		$this->db->where('tanggal',$date);
		$this->db->where('shift',$shift);
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}


	function get_penyerah_harian_spv_by_shift_date($date,$shift)
	{
		$this->db->select('id_pelapor');		
		$this->db->distinct();
		$this->db->from('harian_spv');
		$this->db->order_by('waktu_kejadian','DESC');
		$this->db->where('tanggal',$date);
		$this->db->where('shift',$shift);
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get_penerima_harian_spv_by_shift_date($date,$shift)
	{
		$this->db->select('receiv');		
		$this->db->distinct();
		$this->db->from('harian_spv');
		$this->db->order_by('waktu_kejadian','DESC');
		$this->db->where('tanggal',$date);
		$this->db->where('shift',$shift);
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get_mengetahui_harian_spv_by_shift_date($date,$shift)
	{
		$this->db->select('appfinal');		
		$this->db->distinct();
		$this->db->from('harian_spv');
		$this->db->order_by('waktu_kejadian','DESC');
		$this->db->where('tanggal',$date);
		$this->db->where('shift',$shift);
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get($id_harian_spv)
	{
		$this->load->database();
		$query = $this->db->get_where('harian_spv',array('id_harian_spv'=>$id_harian_spv));
		return $query->row_array();
	}

	function get_tanggal_harian_spv(){
		$timeYear = date('Y');
		$time = date('Y-m-d', strtotime('-2 month'));
		$this->db->select('tanggal');
		$this->db->distinct();
		$this->db->from('harian_spv');

		$this->db->where('tanggal > "'.$time.'"');
		$this->db->order_by('tanggal','desc');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_tanggal_harian_spv_final_approve(){
		$this->db->select('tanggal');
		$this->db->distinct();
		$this->db->from('harian_spv');
		$this->db->where('receiv is NOT NULL');
		$this->db->where('appfinal IS NULL OR appfinal =""');
		$this->db->order_by('tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	}
	

	function simpan_data($id_user,$spv1)
	{

		$simpan_data=array
		(
			'tanggal'	=>$this->input->post('tanggal'),
			'waktu_lapor'	=>$this->input->post('waktu_lapor'),
			'shift'			=>$this->input->post('shift'),
			'id_pelapor'		=>$spv1,
			'waktu_kejadian'	=>$this->input->post('waktu_kejadian'),
			'kejadian'			=>$this->input->post('kejadian'),
			'tindak_lanjut'		=>$this->input->post('tindak_lanjut'),
			'author'			=>$id_user
		);

		$simpan = $this->db->insert('harian_spv',$simpan_data);
		return $simpan;
		
	}
	function update_data($id_user,$spv1)
        {
            $data=array(
			'tanggal'		=>$this->input->post('tanggal'),
			'waktu_lapor'	=>$this->input->post('waktu_lapor'),
			'shift'			=>$this->input->post('shift'),
			'id_pelapor'		=>$spv1,
			'waktu_kejadian'	=>$this->input->post('waktu_kejadian'),
			'kejadian'			=>$this->input->post('kejadian'),
			'tindak_lanjut'		=>$this->input->post('tindak_lanjut'),
			'author'			=>$id_user
			);
				$this->db->where('id_harian_spv',$this->input->post('id_harian_spv'));
                $this->db->update('harian_spv', $data);
        }

    function update_data_assign_supervisor($id_harian_spv,$spv1)
        {
            $data=array(
			'receiv'		=>$spv1,
			);
				$this->db->where('id_harian_spv',$id_harian_spv);
                $this->db->update('harian_spv', $data);
        }

        function update_data_assign_final($id_harian_spv,$final1)
        {
            $data=array(
			'appfinal'		=>$final1,
			);
				$this->db->where('id_harian_spv',$id_harian_spv);
                $this->db->update('harian_spv', $data);
        }

        

    function hapus($id_harian_spv){
		$this->db->query("delete from harian_spv where id_harian_spv = $id_harian_spv");
	}	
	
	
	
}
