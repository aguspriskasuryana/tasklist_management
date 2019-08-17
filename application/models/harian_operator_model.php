<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Harian_OPERATOR_model extends CI_Model
{
	
	function get_all_harian_operator()
	{

		$id = $this->session->userdata('user_data');

		$timeYear = date('Y');
		$time = date('Y-m-d', strtotime('-2 month'));
		//var_dump($time);
		$this->db->select('ho.*')->from('harian_operator as ho');
		$this->db->join('master_user as mu', 'mu.id_user = ho.author','left');
		$this->db->where('ho.tanggal > "'.$time.'"');
		$this->db->where('mu.id_team = "'.$id['id_team'].'"');
		$this->db->order_by('ho.waktu_kejadian','DESC');
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get_harian_operator_by_shift_date($date,$shift)
	{
		$id = $this->session->userdata('user_data');
		$this->db->select('ho.*')->from('harian_operator as ho');
		$this->db->join('master_user as mu', 'mu.id_user = ho.author','left');
		$this->db->order_by('waktu_kejadian','DESC');
		$this->db->where('tanggal',$date);
		$this->db->where('shift',$shift);
		$this->db->where('mu.id_team = "'.$id['id_team'].'"');
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}


	function get_penyerah_harian_operator_by_shift_date($date,$shift)
	{
		$id = $this->session->userdata('user_data');
		$this->db->select('ho.id_pelapor');		
		$this->db->distinct();
		$this->db->from('harian_operator as ho');
		$this->db->join('master_user as mu', 'mu.id_user = ho.author','left');
		$this->db->order_by('ho.waktu_kejadian','DESC');
		$this->db->where('ho.tanggal',$date);
		$this->db->where('ho.shift',$shift);
		$this->db->where('mu.id_team = "'.$id['id_team'].'"');
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get_penerima_harian_operator_by_shift_date($date,$shift)
	{

		$id = $this->session->userdata('user_data');
		$this->db->select('ho.receiv');		
		$this->db->distinct();
		$this->db->from('harian_operator as ho');
		$this->db->join('master_user as mu', 'mu.id_user = ho.author','left');
		$this->db->order_by('ho.waktu_kejadian','DESC');
		$this->db->where('ho.tanggal',$date);
		$this->db->where('ho.shift',$shift);
		$this->db->where('mu.id_team = "'.$id['id_team'].'"');

		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get_mengetahui_harian_operator_by_shift_date($date,$shift)
	{
		$id = $this->session->userdata('user_data');
		$this->db->select('ho.appfinal');		
		$this->db->distinct();
		$this->db->from('harian_operator as ho');
		$this->db->join('master_user as mu', 'mu.id_user = ho.author','left');
		$this->db->order_by('ho.waktu_kejadian','DESC');
		$this->db->where('ho.tanggal',$date);
		$this->db->where('ho.shift',$shift);
		$this->db->where('mu.id_team = "'.$id['id_team'].'"');
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function get($id_harian_operator)
	{
		$this->load->database();
		$query = $this->db->get_where('harian_operator',array('id_harian_operator'=>$id_harian_operator));
		return $query->row_array();
	}

	function get_tanggal_harian_operator(){
		$timeYear = date('Y');
		$time = date('Y-m-d', strtotime('-2 month'));
		$id = $this->session->userdata('user_data');
		$this->db->select('ho.tanggal');
		$this->db->distinct();
		$this->db->from('harian_operator as ho');
		$this->db->join('master_user as mu', 'mu.id_user = ho.author','left');
		$this->db->where('ho.tanggal > "'.$time.'"');
		$this->db->where('mu.id_team = "'.$id['id_team'].'"');
		$this->db->order_by('ho.tanggal','desc');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_tanggal_harian_operator_final_approve(){
		$id = $this->session->userdata('user_data');
		$this->db->select('ho.tanggal');
		$this->db->distinct();
		$this->db->from('harian_operator as ho');
		$this->db->join('master_user as mu', 'mu.id_user = ho.author','left');
		$this->db->where('ho.receiv is NOT NULL');
		$this->db->where('ho.appfinal IS NULL OR ho.appfinal =""');
		$this->db->where('mu.id_team = "'.$id['id_team'].'"');
		$this->db->order_by('ho.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	}
	

	function simpan_data($id_user,$operator1)
	{

		$simpan_data=array
		(
			'tanggal'	=>$this->input->post('tanggal'),
			'waktu_lapor'	=>$this->input->post('waktu_lapor'),
			'shift'			=>$this->input->post('shift'),
			'id_pelapor'		=>$operator1,
			'waktu_kejadian'	=>$this->input->post('waktu_kejadian'),
			'kejadian'			=>$this->input->post('kejadian'),
			'tindak_lanjut'		=>$this->input->post('tindak_lanjut'),
			'author'			=>$id_user
		);

		$simpan = $this->db->insert('harian_operator',$simpan_data);
		return $simpan;
		
	}
	function update_data($id_user,$operator1)
        {
            $data=array(
			'tanggal'		=>$this->input->post('tanggal'),
			'waktu_lapor'	=>$this->input->post('waktu_lapor'),
			'shift'			=>$this->input->post('shift'),
			'id_pelapor'		=>$operator1,
			'waktu_kejadian'	=>$this->input->post('waktu_kejadian'),
			'kejadian'			=>$this->input->post('kejadian'),
			'tindak_lanjut'		=>$this->input->post('tindak_lanjut'),
			'author'			=>$id_user
			);
				$this->db->where('id_harian_operator',$this->input->post('id_harian_operator'));
                $this->db->update('harian_operator', $data);
        }

    function update_data_assign_operator($id_harian_operator,$operator1)
        {
            $data=array(
			'receiv'		=>$operator1,
			);
				$this->db->where('id_harian_operator',$id_harian_operator);
                $this->db->update('harian_operator', $data);
        }

        function update_data_assign_final($id_harian_operator,$final1)
        {
            $data=array(
			'appfinal'		=>$final1,
			);
				$this->db->where('id_harian_operator',$id_harian_operator);
                $this->db->update('harian_operator', $data);
        }

        

    function hapus($id_harian_operator){
		$this->db->query("delete from harian_operator where id_harian_operator = $id_harian_operator");
	}	
	
	
	
}
