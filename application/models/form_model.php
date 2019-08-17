<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class form_model extends CI_Model
{
	
	function get_form_ups()
	{
		$this->db->select('*')->from('form_ups');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_form_ups_limit5($ups_no){


		$query ="select * FROM (SELECT * FROM (form_ups_temporary) WHERE ups_no = '".$ups_no."' ORDER BY tanggal_form DESC LIMIT 10) AS tb ORDER BY tb.tanggal_form,tb.jam ASC";
		$result = $this->db->query($query);
		
		return $result->result_array();
	}

	function get_form_ups_complete(){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_ups as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');
		$time = date('Y-m-d', strtotime('-1 month'));
		$this->db->where('fu.tanggal_form > "'.$time.'"');
		$this->db->order_by('fu.time_now','desc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_form_ups_mb2_complete(){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_ups_mb2 as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');
		$time = date('Y-m-d', strtotime('-3 month'));
		$this->db->where('fu.tanggal > "'.$time.'"');
		$this->db->order_by('fu.time_now','desc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_form_ups_complete_byrange($start, $end){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_ups as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');
		$this->db->where('fu.tanggal_form between "'.$start.'" and "'.$end.'"');
		$this->db->order_by('fu.time_now','desc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_form_ups_mb2_complete_byrange($start, $end){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_ups_mb2 as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');
		$this->db->where('fu.tanggal between "'.$start.'" and "'.$end.'"');
		$this->db->order_by('fu.time_now','desc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_form_acliebert_complete(){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_ac_liebert as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');

		$time = date('Y-m-d', strtotime('-3 month'));
		$this->db->where('fu.tanggal > "'.$time.'"');
		//$this->db->where('fu.time_now like "%2018%"');
		$this->db->order_by('fu.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_form_acliebert_complete_byrange($start, $end){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_ac_liebert as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');
		$this->db->where('fu.tanggal between "'.$start.'" and "'.$end.'"');
		$this->db->order_by('fu.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_form_acliebert_mb2_complete(){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_ac_liebert_mb2 as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');
		
		$time = date('Y-m-d', strtotime('-3 month'));
		$this->db->where('fu.tanggal > "'.$time.'"');
		$this->db->order_by('fu.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_form_lvmdp_complete(){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama,fu.lvmdp_no');
		$this->db->from('form_lvmdp as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');
		//$this->db->where('fu.time_now like "%2018%"');

		$time = date('Y-m-d', strtotime('-3 month'));
		$this->db->where('fu.tanggal > "'.$time.'"');
		$this->db->order_by('fu.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_form_kwh_complete_byrange($start, $end){
		
		$this->db->select('fu.*,l.nama_lokasi,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_kwh as fu');
		$this->db->join('par_lokasi as l','l.id_lokasi = fu.lokasi','left');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');
		$this->db->where('fu.tanggal between "'.$start.'" and "'.$end.'"');
		$this->db->order_by('fu.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 
	function get_form_lvmdp_complete_byrange($start, $end){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_lvmdp as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');
		$this->db->where('fu.tanggal between "'.$start.'" and "'.$end.'"');
		$this->db->order_by('fu.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_form_kwh_complete(){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama,pl.*');
		$this->db->from('form_kwh as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');
		$this->db->join('par_lokasi as pl','pl.id_lokasi = fu.lokasi','left');
		$time = date('Y-m-d', strtotime('-1 month'));
		$this->db->where('fu.tanggal > "'.$time.'"');
		$this->db->order_by('fu.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_form_tangki_complete(){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_tangki as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');


		$time = date('Y-m-d', strtotime('-3 month'));
		$this->db->where('fu.tanggal > "'.$time.'"');
		$this->db->order_by('fu.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_form_tangki_complete_byrange($start, $end){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_tangki as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');
		$this->db->where('fu.tanggal between "'.$start.'" and "'.$end.'"');
		$this->db->order_by('fu.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_form_genset_complete(){
		
		$this->db->select('fu.*,mu.nama_lengkap,mu.username,mt.nama');
		$this->db->from('form_genset as fu');
		$this->db->join('master_user as mu','mu.id_user = fu.id_user','left');
		$this->db->join('master_team as mt','mt.id_team = fu.id_team','left');

		$time = date('Y-m-d', strtotime('-3 month'));
		$this->db->where('fu.tanggal > "'.$time.'"');
		$this->db->order_by('fu.tanggal','asc');
		$result = $this->db->get();
		//var_dump($result->result_array());
		return $result->result_array();
	} 

	function get($id_form_ups)
	{
		$this->load->database();
		$query = $this->db->get_where('form_ups',array('id_form_ups'=>$id_role));
		return $query->row_array();
	}

	function simpan_data_ups($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act_form_ups'),
			'ups_no'		=>$this->input->post('ups_no'),
			'tanggal_form'	=>$tanggal,
			'jam'			=>$this->input->post('jam'),
			'by_pass_suply_healthy'	=>$this->input->post('by_pass_suply_healthy'),
			'input_suply_healthy'	=>$this->input->post('input_suply_healthy'),
			'input_l1_l2'	=>$this->input->post('input_l1_l2'),
			'input_l2_l3'	=>$this->input->post('input_l2_l3'),
			'input_l1_l3'	=>$this->input->post('input_l1_l3'),
			'baterry_supply_healthy_led'	=>$this->input->post('baterry_supply_healthy_led'),
			'batere_v'	=>$this->input->post('batere_v'),
			'batere_l'	=>$this->input->post('batere_l'),
			'baterry_charge'	=>$this->input->post('baterry_charge'),
			'inverter_output_healthy_led'	=>$this->input->post('inverter_output_healthy_led'),
			'output_l1'	=>$this->input->post('output_l1'),
			'output_l2'	=>$this->input->post('output_l2'),
			'output_l3'	=>$this->input->post('output_l3'),
			'out_current_l1'	=>$this->input->post('out_current_l1'),
			'out_current_l2'	=>$this->input->post('out_current_l2'),
			'out_current_l3'	=>$this->input->post('out_current_l3'),
			'out_kw_power_l1'	=>$this->input->post('out_kw_power_l1'),
			'out_kw_power_l2'	=>$this->input->post('out_kw_power_l2'),
			'out_kw_power_l3'	=>$this->input->post('out_kw_power_l3'),
			'out_frek_inv'	=>$this->input->post('out_frek_inv'),
			'out_frek_by_pass'	=>$this->input->post('out_frek_by_pass'),
			'loadon_inv_by_pass'	=>$this->input->post('loadon_inv_by_pass'),
			'keterangan'	=>$this->input->post('keteranganups') 
		);

		$simpan = $this->db->insert('form_ups',$simpan_data);
		$simpan = $this->db->insert('form_ups_temporary',$simpan_data);
		return $simpan;
		
	}


	function simpan_data_ups_mb2($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act_form_ups_mb2'),
			'tanggal'		=>$tanggal,
			'jam'			=>$this->input->post('jam'),
			'i_v_Rn'	=>$this->input->post('i_v_Rn'),
			'i_v_sn'	=>$this->input->post('i_v_sn'),
			'i_v_tn'	=>$this->input->post('i_v_tn'),
			'i_c_r'		=>$this->input->post('i_c_r'),
			'i_c_s'		=>$this->input->post('i_c_s'),
			'i_c_t'	    =>$this->input->post('i_c_t'),
			'fHZ_1'	    =>$this->input->post('fHZ_1'),
			'battery_vdc'	=>$this->input->post('battery_vdc'),
			'o_v_Rn'	=>$this->input->post('o_v_Rn'),
			'o_v_sn'	=>$this->input->post('o_v_sn'),
			'o_v_tn'	=>$this->input->post('o_v_tn'),
			'o_c_r'		=>$this->input->post('o_c_r'),
			'o_c_s'		=>$this->input->post('o_c_s'),
			'o_c_t'	    =>$this->input->post('o_c_t'),
			'fHZ_2'	    =>$this->input->post('fHZ_2'),
			'runtime'	    =>$this->input->post('runtime'),
			'temp_ups'	    =>$this->input->post('temp_ups'),
			'temp_battery'  =>$this->input->post('temp_battery'),
			'load_kw'	    =>$this->input->post('load_kw'),
			'keterangan'	=>$this->input->post('keterangan') 
		);

		$simpan = $this->db->insert('form_ups_mb2',$simpan_data);
		$simpan = $this->db->insert('form_ups_mb2_temporary',$simpan_data);
		return $simpan;
		
	}

	function simpan_data_edit_ups_mb2($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act'),
			//'tanggal'		=>$tanggal,
			'jam'			=>$this->input->post('jam'),
			'i_v_Rn'	=>$this->input->post('i_v_Rn'),
			'i_v_sn'	=>$this->input->post('i_v_sn'),
			'i_v_tn'	=>$this->input->post('i_v_tn'),
			'i_c_r'		=>$this->input->post('i_c_r'),
			'i_c_s'		=>$this->input->post('i_c_s'),
			'i_c_t'	    =>$this->input->post('i_c_t'),
			'fHZ_1'	    =>$this->input->post('fHZ_1'),
			'battery_vdc'	=>$this->input->post('battery_vdc'),
			'o_v_Rn'	=>$this->input->post('o_v_Rn'),
			'o_v_sn'	=>$this->input->post('o_v_sn'),
			'o_v_tn'	=>$this->input->post('o_v_tn'),
			'o_c_r'		=>$this->input->post('o_c_r'),
			'o_c_s'		=>$this->input->post('o_c_s'),
			'o_c_t'	    =>$this->input->post('o_c_t'),
			'fHZ_2'	    =>$this->input->post('fHZ_2'),
			'runtime'	    =>$this->input->post('runtime'),
			'temp_ups'	    =>$this->input->post('temp_ups'),
			'temp_battery'  =>$this->input->post('temp_battery'),
			'load_kw'	    =>$this->input->post('load_kw'),
			'keterangan'	=>$this->input->post('keterangan') 
		);



			$this->db->where('id_form_ups_mb2',$this->input->post('id_form_ups_mb2'));
			$this->db->update('form_ups_mb2', $simpan_data);
		
	}


	function simpan_data_edit_ups($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act'),
			//'ups_no'		=>$this->input->post('ups_no'),
			//'tanggal_form'	=>$tanggal,
			'jam'			=>$this->input->post('jam'),
			'by_pass_suply_healthy'	=>$this->input->post('by_pass_suply_healthy'),
			'input_suply_healthy'	=>$this->input->post('input_suply_healthy'),
			'input_l1_l2'	=>$this->input->post('input_l1_l2'),
			'input_l2_l3'	=>$this->input->post('input_l2_l3'),
			'input_l1_l3'	=>$this->input->post('input_l1_l3'),
			'baterry_supply_healthy_led'	=>$this->input->post('baterry_supply_healthy_led'),
			'batere_v'	=>$this->input->post('batere_v'),
			'batere_l'	=>$this->input->post('batere_l'),
			'baterry_charge'	=>$this->input->post('baterry_charge'),
			'inverter_output_healthy_led'	=>$this->input->post('inverter_output_healthy_led'),
			'output_l1'	=>$this->input->post('output_l1'),
			'output_l2'	=>$this->input->post('output_l2'),
			'output_l3'	=>$this->input->post('output_l3'),
			'out_current_l1'	=>$this->input->post('out_current_l1'),
			'out_current_l2'	=>$this->input->post('out_current_l2'),
			'out_current_l3'	=>$this->input->post('out_current_l3'),
			'out_kw_power_l1'	=>$this->input->post('out_kw_power_l1'),
			'out_kw_power_l2'	=>$this->input->post('out_kw_power_l2'),
			'out_kw_power_l3'	=>$this->input->post('out_kw_power_l3'),
			'out_frek_inv'	=>$this->input->post('out_frek_inv'),
			'out_frek_by_pass'	=>$this->input->post('out_frek_by_pass'),
			'loadon_inv_by_pass'	=>$this->input->post('loadon_inv_by_pass'),
			'keterangan'	=>$this->input->post('keteranganups') 
		);

			$this->db->where('id_form_ups',$this->input->post('id_form_ups'));
			$this->db->update('form_ups', $simpan_data);

		//$simpan = $this->db->insert('form_ups',$simpan_data);
		//return $simpan;
		
	}

	function simpan_data_tangki($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act_form_tangki'),
			'tanggal'	=>$tanggal,
			'jam_start'			=>$this->input->post('jam_start'),
			'jam_stop'	=>$this->input->post('jam_stop'),
			'stick_terbaca_seb_run'	=>$this->input->post('stick_terbaca_seb_run'),
			'ltr1'	=>$this->input->post('ltr1'),
			'stick_terbaca_sdh_run'	=>$this->input->post('stick_terbaca_sdh_run'),
			'ltr2'	=>$this->input->post('ltr2'),
			'selisih'	=>$this->input->post('selisih'),
			'keterangan'	=>$this->input->post('keterangantangki'),
			'status'	=>$this->input->post('status')
		);

		$simpan = $this->db->insert('form_tangki',$simpan_data);
		$simpan = $this->db->insert('form_tangki_temporary',$simpan_data);
		return $simpan;
		
	}

	function simpan_data_lvmdp($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act'),
			'tanggal'		=>$tanggal,
			'jam'			=>$this->input->post('jam'),
			'pb_on_off'	=>$this->input->post('pb_on_off'),
			'ir_a'	=>$this->input->post('ir_a'),
			'is_a'	=>$this->input->post('is_a'),
			'it_a'	=>$this->input->post('it_a'),
			'rs_v'	=>$this->input->post('rs_v'),
			'rt_v'	=>$this->input->post('rt_v'),
			'st_v'	=>$this->input->post('st_v'),
			'rn_v'	=>$this->input->post('rn_v'),
			'sn_v'	=>$this->input->post('sn_v'),
			'tn_v'	=>$this->input->post('tn_v'),
			'f_hz'	=>$this->input->post('f_hz'),
			'cos_phi'	=>$this->input->post('cos_phi'),
			'kWh'	=>$this->input->post('kWh'),
			'lvmdp_no'	=>$this->input->post('lvmdp_no')
		);

		$simpan = $this->db->insert('form_lvmdp',$simpan_data);
		$simpan = $this->db->insert('form_lvmdp_temporary',$simpan_data);
		return $simpan;
		
	}

	function simpan_data_edit_lvmdp($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act'),
			'tanggal'		=>$tanggal,
			'jam'			=>$this->input->post('jam'),
			'pb_on_off'	=>$this->input->post('pb_on_off'),
			'ir_a'	=>$this->input->post('ir_a'),
			'is_a'	=>$this->input->post('is_a'),
			'it_a'	=>$this->input->post('it_a'),
			'rs_v'	=>$this->input->post('rs_v'),
			'rt_v'	=>$this->input->post('rt_v'),
			'st_v'	=>$this->input->post('st_v'),
			'rn_v'	=>$this->input->post('rn_v'),
			'sn_v'	=>$this->input->post('sn_v'),
			'tn_v'	=>$this->input->post('tn_v'),
			'f_hz'	=>$this->input->post('f_hz'),
			'cos_phi'	=>$this->input->post('cos_phi'),
			'kWh'	=>$this->input->post('kWh'),
			'lvmdp_no'	=>$this->input->post('lvmdp_no')
		);

			$this->db->where('id_lvmdp',$this->input->post('id_lvmdp'));
		$this->db->update('form_lvmdp', $simpan_data);
		
	}

	function simpan_data_kwh($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act_form_kwh'),
			'tanggal'		=>$tanggal,
			'jam'			=>$this->input->post('jam'),
			'LWBP'			=>$this->input->post('LWBP'),
			'WBP'			=>$this->input->post('WBP'),
			'KVAR'			=>$this->input->post('KVAR'),
			'Cos_Q'			=>$this->input->post('Cos_Q'),
			'keterangan'	=>$this->input->post('keterangan'),
			'lokasi'		=>$this->input->post('lokasi')
		);

		$simpan = $this->db->insert('form_kwh',$simpan_data);
		$simpan = $this->db->insert('form_kwh_temporary',$simpan_data);
		return $simpan;
		
	}

	function simpan_data_edit_kwh($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act'),
			//'tanggal'		=>$tanggal,
			'jam'			=>$this->input->post('jam'),
			'LWBP'			=>$this->input->post('LWBP'),
			'WBP'			=>$this->input->post('WBP'),
			'KVAR'			=>$this->input->post('KVAR'),
			'Cos_Q'			=>$this->input->post('Cos_Q'),
			'keterangan'	=>$this->input->post('keterangan'),
			'lokasi'		=>$this->input->post('lokasi')
		);

		$this->db->where('id_kwh',$this->input->post('id_kwh'));
		$this->db->update('form_kwh', $simpan_data);
		
		
	}

	function simpan_data_genset($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act_form_genset'),
			'tanggal'		=>$tanggal,
			'jam_start'		=>$this->input->post('jam_start_genset'),
			'jam_stop'		=>$this->input->post('jam_stop_genset'),
			'hours_meter'	=>$this->input->post('hours_meter'),
			'voltage_bateray'	=>$this->input->post('voltage_bateray'),
			'kwh'	=>$this->input->post('kwh'),
			'vol_r'	=>$this->input->post('vol_r'),
			'vol_s'	=>$this->input->post('vol_s'),
			'vol_t'	=>$this->input->post('vol_t'),
			'cur_r'	=>$this->input->post('cur_r'),
			'cur_s'	=>$this->input->post('cur_s'),
			'cur_t'	=>$this->input->post('cur_t'),
			'frekwensi'	=>$this->input->post('frekwensi'),
			'cosQ'	=>$this->input->post('cosQ'),
			'oil_press'	=>$this->input->post('oil_press'),
			'water_temp'	=>$this->input->post('water_temp'),
			'rpm'	=>$this->input->post('rpm')
		);

		$simpan = $this->db->insert('form_genset',$simpan_data);
		$simpan = $this->db->insert('form_genset_temporary',$simpan_data);
		return $simpan;
		
	}

	function simpan_data_edit_genset($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act_form_genset'),
			'tanggal'		=>$tanggal,
			'jam_start'		=>$this->input->post('jam_start_genset'),
			'jam_stop'		=>$this->input->post('jam_stop_genset'),
			'hours_meter'	=>$this->input->post('hours_meter'),
			'voltage_bateray'	=>$this->input->post('voltage_bateray'),
			'kwh'	=>$this->input->post('kwh'),
			'vol_r'	=>$this->input->post('vol_r'),
			'vol_s'	=>$this->input->post('vol_s'),
			'vol_t'	=>$this->input->post('vol_t'),
			'cur_r'	=>$this->input->post('cur_r'),
			'cur_s'	=>$this->input->post('cur_s'),
			'cur_t'	=>$this->input->post('cur_t'),
			'frekwensi'	=>$this->input->post('frekwensi'),
			'cosQ'	=>$this->input->post('cosQ'),
			'oil_press'	=>$this->input->post('oil_press'),
			'water_temp'	=>$this->input->post('water_temp'),
			'rpm'	=>$this->input->post('rpm')
		);

			$this->db->where('id_genset',$this->input->post('id_genset'));
			$this->db->update('form_genset', $simpan_data);
		
	}

	function simpan_data_acliebert($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act_form_acliebert'),
			'tanggal'		=>$tanggal,
			'jam'		=>$this->input->post('jam'),
			'temp_ACI'		=>$this->input->post('temp_ACI'),
			'temp_ACII'	=>$this->input->post('temp_ACII'),
			'temp_ACIII'	=>$this->input->post('temp_ACIII'),
			'rh_ACI'	=>$this->input->post('rh_ACI'),
			'rh_ACII'	=>$this->input->post('rh_ACII'),
			'rh_ACIII'	=>$this->input->post('rh_ACIII'),
			'temp_ups'	=>$this->input->post('temp_ups'),
			'temp_snmpI'	=>$this->input->post('temp_snmpI'),
			'temp_snmpII'	=>$this->input->post('temp_snmpII'),
			'temp_snmpIII'	=>$this->input->post('temp_snmpIII'),
			'rh_snmpI'	=>$this->input->post('rh_snmpI'),
			'rh_snmpII'	=>$this->input->post('rh_snmpII'),
			'rh_snmpIII'	=>$this->input->post('rh_snmpIII'),
			'temp_migle'	=>$this->input->post('temp_migle'),
			'rh_migle'	=>$this->input->post('rh_migle'),
			'temp_krisbow'	=>$this->input->post('temp_krisbow'),
			'rh_krisbow'	=>$this->input->post('rh_krisbow'),
			'temp_battery'	=>$this->input->post('temp_battery'),
			'ratas_akhir_temp'	=>$this->input->post('ratas_akhir_temp'),
			'ratas_akhir_rh'	=>$this->input->post('ratas_akhir_rh'),
			'status_ACI'	=>$this->input->post('status_ACI'),
			'status_ACII'	=>$this->input->post('status_ACII'),
			'status_ACIII'	=>$this->input->post('status_ACIII'),
			'status_komp_ACI'	=>$this->input->post('status_komp_ACI'),
			'status_komp_ACII'	=>$this->input->post('status_komp_ACII'),
			'status_komp_ACIII'	=>$this->input->post('status_komp_ACIII'),
			'keterangan'	=>$this->input->post('keterangan')
		);

		$simpan = $this->db->insert('form_ac_liebert',$simpan_data);
		$simpan = $this->db->insert('form_ac_liebert_temporary',$simpan_data);
		return $simpan;
		
	}


	function simpan_data_acliebert_mb2($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act_form_acliebert_mb2'),
			'tanggal'		=>$tanggal,
			'jam'		=>$this->input->post('jam'),
			'temp_ACI'		=>$this->input->post('temp_ACI'),
			'temp_ACII'	=>$this->input->post('temp_ACII'),
			'ratas_akhir_temp'	=>$this->input->post('ratas_akhir_temp'),
			'ket_batas_aman_temp'	=>$this->input->post('ket_batas_aman_temp'),
			'humidity_acI'	=>$this->input->post('humidity_acI'),
			'humidity_acII'	=>$this->input->post('humidity_acII'),
			'ratas_akhir_humid'	=>$this->input->post('ratas_akhir_humid'),
			'ket_batas_aman_humid'	=>$this->input->post('ket_batas_aman_humid'),
			'ac_liebert_mb2_no'	=>$this->input->post('ac_liebert_mb2_no'),
			'keterangan'	=>$this->input->post('keterangan')
		);

		$simpan = $this->db->insert('form_ac_liebert_mb2',$simpan_data);
		$simpan = $this->db->insert('form_ac_liebert_mb2_temporary',$simpan_data);
		return $simpan;
		
	}

	function simpan_data_edit_acliebert_mb2($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act_form_acliebert_mb2'),
			'tanggal'		=>$tanggal,
			'jam'		=>$this->input->post('jam'),
			'temp_ACI'		=>$this->input->post('temp_ACI'),
			'temp_ACII'	=>$this->input->post('temp_ACII'),
			'ratas_akhir_temp'	=>$this->input->post('ratas_akhir_temp'),
			'ket_batas_aman_temp'	=>$this->input->post('ket_batas_aman_temp'),
			'humidity_acI'	=>$this->input->post('humidity_acI'),
			'humidity_acII'	=>$this->input->post('humidity_acII'),
			'ratas_akhir_humid'	=>$this->input->post('ratas_akhir_humid'),
			'ket_batas_aman_humid'	=>$this->input->post('ket_batas_aman_humid'),
			'ac_liebert_mb2_no'	=>$this->input->post('ac_liebert_mb2_no'),
			'keterangan'	=>$this->input->post('keterangan')
		);


		$this->db->where('id_ac_mb2',$this->input->post('id_ac_mb2'));
		$this->db->update('form_ac_liebert_mb2', $simpan_data);
		
	}

	function simpan_data_edit_acliebert($id_user,$id_team,$tanggal)
	{
		$simpan_data=array
		(
			'id_user'		=>$id_user,
			'id_team'		=>$id_team,
			'id_act'		=>$this->input->post('id_act'),
			//'tanggal'		=>$tanggal,
			'jam'		=>$this->input->post('jam'),
			'temp_ACI'		=>$this->input->post('temp_ACI'),
			'temp_ACII'	=>$this->input->post('temp_ACII'),
			'temp_ACIII'	=>$this->input->post('temp_ACIII'),
			'rh_ACI'	=>$this->input->post('rh_ACI'),
			'rh_ACII'	=>$this->input->post('rh_ACII'),
			'rh_ACIII'	=>$this->input->post('rh_ACIII'),
			'temp_ups'	=>$this->input->post('temp_ups'),
			'temp_snmpI'	=>$this->input->post('temp_snmpI'),
			'temp_snmpII'	=>$this->input->post('temp_snmpII'),
			'temp_snmpIII'	=>$this->input->post('temp_snmpIII'),
			'rh_snmpI'	=>$this->input->post('rh_snmpI'),
			'rh_snmpII'	=>$this->input->post('rh_snmpII'),
			'rh_snmpIII'	=>$this->input->post('rh_snmpIII'),
			'temp_migle'	=>$this->input->post('temp_migle'),
			'rh_migle'	=>$this->input->post('rh_migle'),
			'temp_krisbow'	=>$this->input->post('temp_krisbow'),
			'rh_krisbow'	=>$this->input->post('rh_krisbow'),
			'temp_battery'	=>$this->input->post('temp_battery'),
			'ratas_akhir_temp'	=>$this->input->post('ratas_akhir_temp'),
			'ratas_akhir_rh'	=>$this->input->post('ratas_akhir_rh'),
			'status_ACI'	=>$this->input->post('status_ACI'),
			'status_ACII'	=>$this->input->post('status_ACII'),
			'status_ACIII'	=>$this->input->post('status_ACIII'),
			'status_komp_ACI'	=>$this->input->post('status_komp_ACI'),
			'status_komp_ACII'	=>$this->input->post('status_komp_ACII'),
			'status_komp_ACIII'	=>$this->input->post('status_komp_ACIII'),
			'keterangan'	=>$this->input->post('keterangan')
		);

			$this->db->where('id_ac',$this->input->post('id_ac'));
			$this->db->update('form_ac_liebert', $simpan_data);
		//$simpan = $this->db->insert('form_ac_liebert',$simpan_data);
		//return $simpan;
		
	}

	function update_data()
        {
            $data=array(
				'nama_role'			=>$this->input->post('nama_role')
			);
				$this->db->where('id_form_ups',$this->input->post('id_form_ups'));
                $this->db->update('form_ups', $data);
        }

    function hapusups($id_form_ups){
		$this->db->query("delete from form_ups where id_form_ups = $id_form_ups");
	}	

	function hapusacliebert($id_form_acliebert){
		$this->db->query("delete from form_acliebert where id_form_acliebert = $id_form_acliebert");
	}

	function hapuslvmdp($id_form_lvmdp){
		$this->db->query("delete from form_lvmdp where id_lvmdp = $id_form_lvmdp");
	}	

	function hapuskwh($id_form_kwh){
		$this->db->query("delete from form_kwh where id_kwh = $id_form_kwh");
	}		
	
	function hapustangki($id_form_tangki){
		$this->db->query("delete from form_tangki where id_tangki = $id_form_tangki");
	}	

	function hapustemporaryform($tanggal){
		$this->db->query("delete from form_ac_liebert_temporary where tanggal NOT IN ('$tanggal')");
		$this->db->query("delete from form_genset_temporary where tanggal NOT IN ('$tanggal')");
		$this->db->query("delete from form_kwh_temporary where tanggal NOT IN ('$tanggal')");
		$this->db->query("delete from form_lvmdp_temporary where tanggal NOT IN ('$tanggal')");
		$this->db->query("delete from form_tangki_temporary where tanggal NOT IN ('$tanggal')");
		$this->db->query("delete from form_ups_temporary where tanggal_form NOT IN ('$tanggal')");
	}	

	function getformups($id_form)
	{
		$this->load->database();
		$query = $this->db->get_where('form_ups',array('id_form_ups'=>$id_form));
		return $query->row_array();
	}
	function getformupsmb2($id_form)
	{
		$this->load->database();
		$query = $this->db->get_where('form_ups_mb2',array('id_form_ups_mb2'=>$id_form));
		return $query->row_array();
	}
	
	function getformacliebert($id_form)
	{
		$this->load->database();
		$query = $this->db->get_where('form_ac_liebert',array('id_ac'=>$id_form));
		return $query->row_array();
	}

	function getformacliebertmb2($id_form)
	{
		$this->load->database();
		$query = $this->db->get_where('form_ac_liebert_mb2',array('id_ac_mb2'=>$id_form));
		return $query->row_array();
	}

	function getformlvmdp($id_form)
	{
		$this->load->database();
		$query = $this->db->get_where('form_lvmdp',array('id_lvmdp'=>$id_form));
		return $query->row_array();
	}

	function getformkwh($id_form)
	{
		$this->load->database();
		$query = $this->db->get_where('form_kwh',array('id_kwh'=>$id_form));
		return $query->row_array();
	}

	function getformgenset($id_form)
	{
		$this->load->database();
		$query = $this->db->get_where('form_genset',array('id_genset'=>$id_form));
		return $query->row_array();
	}
}
