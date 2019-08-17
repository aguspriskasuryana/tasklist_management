<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel_sdp_model extends CI_Model
{
	
	function get_all_panel_sdp($datenow,$nama_perangkat,$nama_panel,$mcb,$koordinat_rak,$phase,$nama_phase)
	{
		//$timeYear = date('Y');
		$this->db->select('*')->from('panel_sdp')->where('tanggal like "%'.$datenow.'%"');
		if($nama_perangkat){
		$this->db->where('nama_perangkat = "'.$nama_perangkat.'"');
		}
		if($nama_panel){
		$this->db->where('nama_panel = "'.$nama_panel.'"');
		}
		if($mcb){
		$this->db->where('mcb = "'.$mcb.'"');
		}
		if($koordinat_rak){
		$this->db->where('koordinat_rak = "'.$koordinat_rak.'"');
		}
		if($phase){
		$this->db->where('phase = "'.$phase.'"');
		}
		if($nama_phase){
		$this->db->where('nama_phase = "'.$nama_phase.'"');
		}
		$query = $this->db->get();
		return $query->result_array();
	}

		function get_all_panel_sdp_template()
	{
		//$timeYear = date('Y');
		$this->db->select('*')->from('panel_sdp_template');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_panel_sdp_detail_kpi($month){

		$query = "SELECT DISTINCT(ps.`nama_phase`) ,ps.`nama_panel`,(SELECT AVG(`panel_sdp`.`voltage_1_phase`) AS 'AVG' FROM `panel_sdp` 
WHERE `panel_sdp`.`nama_panel` = ps.`nama_panel` AND `panel_sdp`.`voltage_1_phase` !=0 
AND `panel_sdp`.`nama_phase` = ps.`nama_phase` AND `tanggal` LIKE '%".$month."%') AS 'AVG',(SELECT SUM(`panel_sdp`.`current_ampere`) AS 'R' FROM `panel_sdp` 
WHERE `panel_sdp`.`nama_panel` = ps.`nama_panel` AND `panel_sdp`.`phase` ='R' 
AND `panel_sdp`.`nama_phase` = ps.`nama_phase` AND `tanggal` LIKE '%".$month."%') AS 'R',(SELECT SUM(`panel_sdp`.`current_ampere`) AS 'R' FROM `panel_sdp` 
WHERE `panel_sdp`.`nama_panel` = ps.`nama_panel` AND `panel_sdp`.`phase` ='S' 
AND `panel_sdp`.`nama_phase` = ps.`nama_phase` AND `tanggal` LIKE '%".$month."%') AS 'S',(SELECT SUM(`panel_sdp`.`current_ampere`) AS 'R' FROM `panel_sdp` 
WHERE `panel_sdp`.`nama_panel` = ps.`nama_panel` AND `panel_sdp`.`phase` ='T' 
AND `panel_sdp`.`nama_phase` = ps.`nama_phase` AND `tanggal` LIKE '%".$month."%') AS 'T' FROM `panel_sdp` AS ps WHERE ps.`tanggal` LIKE '%".$month."%' ORDER BY ps.`nama_panel` ASC";

		$result = $this->db->query($query);
		return $result->result_array();
	} 

	function get_all_panel_sdp_detail_kpi_mcb_amount($month){

		$query = "SELECT DISTINCT(`nama_panel`) AS nama_panel_show, `panel_sdp`.`tanggal` AS tgl,

(SELECT COUNT( `panel_sdp`.`mcb`) FROM `panel_sdp`  WHERE `panel_sdp`.`nama_panel` = nama_panel_show AND
 `panel_sdp`.`phase` ='R' AND `panel_sdp`.`tanggal` = tgl ) AS mcb_r,
 
(SELECT COUNT( `panel_sdp`.`mcb`) FROM `panel_sdp`  WHERE `panel_sdp`.`nama_panel` = nama_panel_show AND
 `panel_sdp`.`phase` ='R' AND `panel_sdp`.`tanggal` = tgl AND `panel_sdp`.`koordinat_rak` !='-' ) AS capacityused_r,
 
(SELECT COUNT( `panel_sdp`.`mcb`) FROM `panel_sdp`  WHERE `panel_sdp`.`nama_panel` = nama_panel_show AND
 `panel_sdp`.`phase` ='R' AND `panel_sdp`.`tanggal` = tgl AND `panel_sdp`.`koordinat_rak` ='-' ) AS capacityavailability_r,

(SELECT COUNT( `panel_sdp`.`mcb`) FROM `panel_sdp`  WHERE `panel_sdp`.`nama_panel` = nama_panel_show AND
 `panel_sdp`.`phase` ='S' AND `panel_sdp`.`tanggal` = tgl ) AS mcb_s,
 
(SELECT COUNT( `panel_sdp`.`mcb`) FROM `panel_sdp`  WHERE `panel_sdp`.`nama_panel` = nama_panel_show AND
 `panel_sdp`.`phase` ='S' AND `panel_sdp`.`tanggal` = tgl AND `panel_sdp`.`koordinat_rak` !='-' ) AS capacityused_s,
 
(SELECT COUNT( `panel_sdp`.`mcb`) FROM `panel_sdp`  WHERE `panel_sdp`.`nama_panel` = nama_panel_show AND
 `panel_sdp`.`phase` ='S' AND `panel_sdp`.`tanggal` = tgl AND `panel_sdp`.`koordinat_rak` ='-' ) AS capacityavailability_s,

(SELECT COUNT( `panel_sdp`.`mcb`) FROM `panel_sdp`  WHERE `panel_sdp`.`nama_panel` = nama_panel_show AND
 `panel_sdp`.`phase` ='T' AND `panel_sdp`.`tanggal` = tgl ) AS mcb_t,
 
(SELECT COUNT( `panel_sdp`.`mcb`) FROM `panel_sdp`  WHERE `panel_sdp`.`nama_panel` = nama_panel_show AND
 `panel_sdp`.`phase` ='T' AND `panel_sdp`.`tanggal` = tgl AND `panel_sdp`.`koordinat_rak` !='-' ) AS capacityused_t,
 
(SELECT COUNT( `panel_sdp`.`mcb`) FROM `panel_sdp`  WHERE `panel_sdp`.`nama_panel` = nama_panel_show AND
 `panel_sdp`.`phase` ='T' AND `panel_sdp`.`tanggal` = tgl AND `panel_sdp`.`koordinat_rak` ='-' ) AS capacityavailability_t,
 
(SELECT (mcb_r + mcb_s + mcb_t)) AS mcbtotal,
(SELECT (capacityused_r + capacityused_s + capacityused_t)) AS capacityusedtotal
 
FROM `panel_sdp` WHERE `panel_sdp`.`tanggal` = '".$month."'";

		$result = $this->db->query($query);
		return $result->result_array();
	} 

	function get_all_panel_sdp_detail_kpi_with_nama_perangkat($month){

		$query = "SELECT DISTINCT(ps.`nama_phase`) ,ps.`nama_perangkat`, ps.`nama_panel` ,(SELECT AVG(`panel_sdp`.`voltage_1_phase`) AS 'AVG' FROM `panel_sdp` 
WHERE `panel_sdp`.`nama_panel` = ps.`nama_panel` AND `panel_sdp`.`voltage_1_phase` !=0 
AND `panel_sdp`.`nama_phase` = ps.`nama_phase` AND `tanggal` LIKE '%".$month."%') AS 'AVG',(SELECT SUM(`panel_sdp`.`current_ampere`) AS 'R' FROM `panel_sdp` 
WHERE `panel_sdp`.`phase` ='R' 
AND `panel_sdp`.`nama_phase` = ps.`nama_phase` AND `tanggal` LIKE '%".$month."%' AND `panel_sdp`.`nama_perangkat` = ps.`nama_perangkat`) AS 'R',(SELECT SUM(`panel_sdp`.`current_ampere`) AS 'R' FROM `panel_sdp` 
WHERE `panel_sdp`.`phase` ='S' 
AND `panel_sdp`.`nama_phase` = ps.`nama_phase` AND `tanggal` LIKE '%".$month."%' AND `panel_sdp`.`nama_perangkat` = ps.`nama_perangkat`) AS 'S',(SELECT SUM(`panel_sdp`.`current_ampere`) AS 'R' FROM `panel_sdp` 
WHERE `panel_sdp`.`phase` ='T' 
AND `panel_sdp`.`nama_phase` = ps.`nama_phase` AND `tanggal` LIKE '%".$month."%' AND `panel_sdp`.`nama_perangkat` = ps.`nama_perangkat`) AS 'T' FROM `panel_sdp` AS ps WHERE ps.`tanggal` LIKE '%".$month."%' ORDER BY ps.`nama_perangkat` ASC";

		$result = $this->db->query($query);

//var_dump($result->result_array());
		return $result->result_array();
	} 

	function get_all_nama_perangkat($datenow)
	{
		//$timeYear = date('Y');
		$this->db->select('distinct(nama_perangkat)')->from('panel_sdp')->where('tanggal like "%'.$datenow.'%"');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_nama_phase($datenow)
	{
		//$timeYear = date('Y');
		$this->db->select('distinct(nama_phase)')->from('panel_sdp')->where('tanggal like "%'.$datenow.'%"');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_all_tanggalready()
	{
		//$timeYear = date('Y');
		$this->db->select('distinct(tanggal)')->from('panel_sdp')->order_by('tanggal','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_nama_panel($datenow)
	{
		//$timeYear = date('Y');
		$this->db->select('distinct(nama_panel)')->from('panel_sdp')->where('tanggal like "%'.$datenow.'%"');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_mcb()
	{
		//$timeYear = date('Y');
		$this->db->select('distinct(mcb)')->from('panel_sdp');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_koordinat_rak($datenow)
	{
		//$timeYear = date('Y');
		$this->db->select('distinct(koordinat_rak)')->from('panel_sdp')->where('tanggal like "%'.$datenow.'%"');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_phase($datenow)
	{
		//$timeYear = date('Y');
		$this->db->select('distinct(phase)')->from('panel_sdp')->where('tanggal like "%'.$datenow.'%"');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get($id_panel_sdp)
	{
		$this->load->database();
		$query = $this->db->get_where('panel_sdp',array('id_panel_sdp'=>$id_panel_sdp));
		return $query->row_array();
	}

	function simpan_data($nama_panel,$mcb,$load,$phase,$nama_phase,$nama_perangkat,$koordinat_rak,$koordinat_legrand,$current_ampere,$voltage_1_phase,$daya_semu,$daya,$grounding,$cos_phi,$daya_semu,$daya,$status,$tgl)
	{

		$id = $this->session->userdata('user_data');
		$simpan_data=array
		(
			//'id_panel_sdp'		=>$this->input->post('id_panel_sdp'),
			'nama_panel'		=>$nama_panel,
			'mcb'				=>$mcb,
			'load'				=>$load,
			'phase'				=>$phase,
			'nama_phase'		=>$nama_phase,
			'nama_perangkat'	=>$nama_perangkat,
			'koordinat_rak'		=>$koordinat_rak,
			'koordinat_legrand'	=>$koordinat_legrand,
			'current_ampere'	=>$current_ampere,
			'voltage_1_phase'	=>$voltage_1_phase,
			'daya_semu'			=>$daya_semu,
			'daya'				=>$daya,
			'grounding'			=>$grounding,
			'cos_phi'			=>$cos_phi,
			'daya_semu'			=>$daya_semu,
			'daya'				=>$daya,
			'user_akses'		=>$id['id_user'],
			'status'			=>$status,
			'tanggal'			=>$tgl
		);

		$simpan = $this->db->insert('panel_sdp',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
           	'id_panel_sdp'		=>$this->input->post('id_panel_sdp'),
			'nama_panel'		=>$this->input->post('nama_panel'),
			'mcb'				=>$this->input->post('mcb'),
			'load'				=>$this->input->post('load'),
			'phase'				=>$this->input->post('phase'),
			'nama_phase'		=>$this->input->post('nama_phase'),
			'nama_perangkat'	=>$this->input->post('nama_perangkat'),
			'koordinat_rak'		=>$this->input->post('koordinat_rak'),
			'koordinat_legrand'	=>$this->input->post('koordinat_legrand'),
			'current_ampere'	=>$this->input->post('current_ampere'),
			'voltage_1_phase'	=>$this->input->post('voltage_1_phase'),
			'daya_semu'			=>$this->input->post('daya_semu'),
			'daya'				=>$this->input->post('daya'),
			'grounding'			=>$this->input->post('grounding'),
			'user_akses'		=>$this->input->post('user_akses')
			);
				$this->db->where('id_panel_sdp',$this->input->post('id_panel_sdp'));
                $this->db->update('panel_sdp', $data);
        }

    function update_data_list($id_panel_sdp, $current_ampere, $voltage_1_phase, $daya_semu, $daya, $grounding)
        {
            $data=array(
           	'current_ampere'	=>$current_ampere,
			'voltage_1_phase'	=>$voltage_1_phase,
			'daya_semu'			=>$daya_semu,
			'daya'				=>$daya,
			'grounding'			=>$grounding
			);
				$this->db->where('id_panel_sdp',$id_panel_sdp);
                $this->db->update('panel_sdp', $data);
        }    

    function hapus($id_panel_sdp){
		$this->db->query("delete from panel_sdp where id_panel_sdp = $id_panel_sdp");
	}	
	
}
