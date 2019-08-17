<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mutasi_harian_hk_model extends CI_Model
{
	
	function get_all_mutasi_harian_hk()
	{
		$time = date('Y-m-d', strtotime('-1 month'));
		$this->db->select('*')->from('mutasi_harian_hk');
		$this->db->where('tanggal > "'.$time.'"');
		$this->db->order_by('date_created','DESC');

		
		$query = $this->db->get();

		
		
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get_all_sub_team()
	{
		$this->db->select('*')->from('sub_team');
		$this->db->order_by('sub_team_name','DESC');
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get_mutasi_harian_hk_by_shift_date($date,$shift)
	{
		$this->db->select('*')->from('mutasi_harian_hk');
		$this->db->order_by('date_created','DESC');
		$this->db->where('tanggal',$date);
		$this->db->where('shift',$shift);
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}


	function get_personal_mutasi_harian_hk_by_shift_date($date,$shift)
	{
		$this->db->select('indeks_tamu');		
		$this->db->distinct();
		$this->db->from('mutasi_harian_hk');
		$this->db->order_by('date_created','DESC');
		$this->db->where('tanggal',$date);
		$this->db->where('shift',$shift);
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get_koordinator_bks_mutasi_harian_hk_by_shift_date($date,$shift)
	{
		$this->db->select('app_id_koordinator');		
		$this->db->distinct();
		$this->db->from('mutasi_harian_hk');
		$this->db->order_by('date_created','DESC');
		$this->db->where('tanggal',$date);
		$this->db->where('shift',$shift);
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get_supervisor_bks_mutasi_harian_hk_by_shift_date($date,$shift)
	{
		$this->db->select('app_id_supervisor_bks');		
		$this->db->distinct();
		$this->db->from('mutasi_harian_hk');
		$this->db->order_by('date_created','DESC');
		$this->db->where('tanggal',$date);
		$this->db->where('shift',$shift);
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get_supervisor_bri_mutasi_harian_hk_by_shift_date($date,$shift)
	{
		$this->db->select('app_id_supervisor_bri');		
		$this->db->distinct();
		$this->db->from('mutasi_harian_hk');
		$this->db->order_by('date_created','DESC');
		$this->db->where('tanggal',$date);
		$this->db->where('shift',$shift);
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get($id_mutasi_harian_hk)
	{
		$this->load->database();
		$query = $this->db->get_where('mutasi_harian_hk',array('id_mutasi_harian_hk'=>$id_mutasi_harian_hk));
		return $query->row_array();
	}

	function get_tanggal_mutasi_harian_hk(){
		$this->db->select('tanggal');
		$this->db->distinct();
		$this->db->from('mutasi_harian_hk');
		$this->db->order_by('tanggal','desc');
		$result = $this->db->get();
		return $result->result_array();
	}

	function simpan_data($id_user_login,$users,$subteam)
	{

		$simpan_data=array
		(
			'indeks_tamu'	=>$users,
			'kegiatan'		=>$this->input->post('kegiatan'),
			'lokasi'		=>$this->input->post('lokasi'),
			'jam_awal'		=>$this->input->post('jam_awal'),
			'jam_akhir'		=>$this->input->post('jam_akhir'),
			'tanggal'		=>$this->input->post('tanggal'),
			'keterangan'	=>$this->input->post('keterangan'),
			'shift'			=>$this->input->post('shift'),
			'id_sub_team'	=>$subteam
		);

		$simpan = $this->db->insert('mutasi_harian_hk',$simpan_data);
		return $simpan;
		
	}
	function update_data($id_user,$users,$subteam)
        {
            $data=array(
			'indeks_tamu'	=>$users,
			'kegiatan'		=>$this->input->post('kegiatan'),
			'lokasi'		=>$this->input->post('lokasi'),
			'jam_awal'		=>$this->input->post('jam_awal'),
			'jam_akhir'		=>$this->input->post('jam_akhir'),
			'tanggal'		=>$this->input->post('tanggal'),
			'keterangan'	=>$this->input->post('keterangan'),
			'shift'			=>$this->input->post('shift'),
			'id_sub_team'	=>$subteam
			);
				$this->db->where('id_mutasi_harian_hk',$this->input->post('id_mutasi_harian_hk'));
                $this->db->update('mutasi_harian_hk', $data);
        }

    function update_data_assign_supervisor_bri($id_mutasi_harian_hk,$spv1)
        {
            $data=array(
			'app_id_supervisor_bri'		=>$spv1,
			);
				$this->db->where('id_mutasi_harian_hk',$id_mutasi_harian_hk);
                $this->db->update('mutasi_harian_hk', $data);
        }

    function update_data_assign_supervisor_bks($id_mutasi_harian_hk,$id_spv_bks)
        {
            $data=array(
			'app_id_supervisor_bks'		=>$id_spv_bks,
			);
				$this->db->where('id_mutasi_harian_hk',$id_mutasi_harian_hk);
                $this->db->update('mutasi_harian_hk', $data);
        }

    function update_data_assign_koordinator($id_mutasi_harian_hk,$id_koordinator)
        {
            $data=array(
			'app_id_koordinator'		=>$id_koordinator,
			);
				$this->db->where('id_mutasi_harian_hk',$id_mutasi_harian_hk);
                $this->db->update('mutasi_harian_hk', $data);
        }

        

    function hapus($id_mutasi_harian_hk){
		$this->db->query("delete from mutasi_harian_hk where id_mutasi_harian_hk = $id_mutasi_harian_hk");
	}	
	
	
	
}
