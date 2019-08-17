<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_model extends CI_Model
{
	function simpan_data($data_tanggal,$data_jam,$id_user,$bpo,$form)
	{
		$simpan_data=array
		(
			'aktifitas'		=>$this->input->post('nama_task'),
			'link_bpo'		=>$bpo,
			'expired_date'	=>date("Y-m-d H:i:s", strtotime($this->input->post('expired_date'))),
			'id_team'		=>$this->input->post('team'),
			'tanggal'		=>$data_tanggal,
			'jam'			=>$data_jam,
			'id_user_updater'	=>$id_user,
			'form'			=>$form,
			'duration'		=>$this->input->post('duration'),
			'with_img_valid'=>$this->input->post('with_img_valid')

		);
		//var_dump($this->input->post('with_img_valid'));
		$simpan = $this->db->insert('task_list',$simpan_data);
		//return $simpan;
		
	}

	function get($id_task)
	{
		$this->load->database();
		$query = $this->db->get_where('task_list',array('id_task_list'=>$id_task));
		return $query->row_array();
	}

	function get_task($id_team,$id_role){
		

		$this->db->select(' t.id_task_list as id_task, 
							t.aktifitas, 
							tm.nama as nama, 
							t.tanggal as tanggals,
						    t.jam, 
						    tm.id_team as id_team, 
							t.link_bpo as bpo, 
							t.form, 
							t.duration as duration');
		$this->db->from('task_list as t');
		$this->db->join('master_team as tm', 'tm.id_team = t.id_team','left');
		if ($id_role != 0 && $id_role != 1 && $id_role != 4 && $id_role != 2 && $id_role != 3 && $id_role != 8) {
		$this->db->where('t.id_team =',$id_team);
		}
		$this->db->order_by('tm.id_team','asc');
		
		$result = $this->db->get();
		return $result->result_array();
	}

	function update_data($data_tanggal,$data_jam,$id_user,$bpo,$Form)
	{
		if ($bpo == "0"){
			$bpo = $this->input->post('link_bpo_lama');
		}
		$data=array
		(
			'aktifitas'		=>$this->input->post('nama_task'),
			'link_bpo'		=>$bpo,
			'expired_date'	=>date("Y-m-d H:i:s", strtotime($this->input->post('expired_date'))),
			'id_team'		=>$this->input->post('id_team'),
			'tanggal'		=>$data_tanggal,
			'jam'			=>$data_jam,
			'id_user_updater'=>$id_user,
			'form'			=>$Form,
			'duration'		=>$this->input->post('duration'),
			'with_img_valid'=>$this->input->post('with_img_valid')
		);
		//var_dump($this->input->post('with_img_valid'));
		$this->db->where('id_task_list',$this->input->post('id_task_list'));
		$this->db->update('task_list', $data);
		
	}


    function hapus($id_user){
	$this->db->query("delete from master_user where id_user = $id_user");
	}	

	function hapus_task($id_task_list){
	$this->db->query("delete from task_list where id_task_list = $id_task_list");
	}	

	function get_all_lokasi()
	{
		$this->db->select('*')->from('par_lokasi');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_all_team()
	{
		$this->db->select('*');
		$this->db->from('master_team');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_all_form()
	{
		$form = array("ups"=>"UPS 1 MB1", "ups2"=>"UPS2 MB1", "ups3"=>"UPS 1 MB2", "lvmdp"=>"LVMDP", "lvmdp2"=>"LVMDP MB2", "kwh"=>"KWH", "kwh2"=>"KWH GH", "kwh3"=>"KWH MB2", "acliebert"=>"AC Liebert", "genset"=>"Genset", "tangki"=>"Tangki", "datastorage"=>"Data Storage", "hopteknisi"=>"HOP Teknisi");
		return $form;
	}
	
	function get_all_user()
	{
		$this->db->select('*');
		$this->db->from('master_user');
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_team_where($team)
	{
		$this->db->select('*');
		$this->db->from('master_team');
		$this->db->where('id_team',$team);
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_task_where_idteam_now($id_team,$date_now){
		$unixTimestamp = strtotime($date_now);
		$day = date("l", $unixTimestamp);
		

		$this->db->select('*');
		$this->db->from('task_list');

		$this->db->where('id_team',$id_team);
		
		//$this->db->where('link_bpo','0');
		//$this->db->where('id_task_list','18558');
		
		$this->db->where('(tanggal like "%'.$date_now.'%" or tanggal like "%'.$day.'%")');
		//var_dump('id_team = '.$id_team.' and (tanggal like "%'.$date_now.'%" or tanggal="*," '.$mondaysaturday.')');
		$result = $this->db->get();
		return $result->result_array();
	}



	function get_task_from_form_req_where_idteam_now($id_team,$date_now){

		$unixTimestamp = strtotime($date_now);
		$day = date("l", $unixTimestamp);
		

		$this->db->select('t.id_task_list as id_task_list, t.id_team, t.aktifitas,t.tanggal,t.jam,t.last_modified,t.expired_date,t.link_bpo,t.id_user_updater,g.jam_awal,g.jam_baru,g.tanggal_lama,g.tanggal_baru,g.date_req,g.id_paraf,g.time_paraf');
		$this->db->from('ganti_jadwal_req as g');
		$this->db->join('task_list as t','t.id_task_list = g.id_task_list','inner');

		$this->db->where('t.id_team',$id_team);
		//$this->db->where('t.link_bpo','0');
		$this->db->where('(g.tanggal_baru like "%'.$date_now.'%" or g.tanggal_baru like "%'.$day.'%")');

		$result = $this->db->get();
		return $result->result_array();
	}

	
	function get_task_now($date_now){

		$unixTimestamp = strtotime($date_now);
		$day = date("l", $unixTimestamp);
		

		$this->db->select('*');
		$this->db->from('task_list');
		
		//$this->db->where('link_bpo','0');
		$this->db->where('(tanggal like "%'.$date_now.'%" or tanggal like "%'.$day.'%")');

		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_idtask_where_idteam_now($id_team,$date_now){


		$unixTimestamp = strtotime($date_now);
		$day = date("l", $unixTimestamp);
		

		$this->db->select('id_task_list');
		$this->db->from('task_list');
		$this->db->where('id_team',$id_team);
		//$this->db->where('link_bpo','0');
		$this->db->where('(tanggal like "%'.$date_now.'%" or tanggal like "%'.$day.'%")');

		$result = $this->db->get();
		//var_dump($result);
		return $result->result_array();
	}
	
	function get_idtask_where_now($date_now){

		$unixTimestamp = strtotime($date_now);
		$day = date("l", $unixTimestamp);
		

		$this->db->select('id_task_list');
		$this->db->from('task_list');
		$this->db->where('(tanggal like "%'.$date_now.'%" or tanggal like "%'.$day.'%")');
		$result = $this->db->get();
		//var_dump($day);
		return $result->result_array();
	}
	
	function get_activity_list_now($id_task_list,$date_now){
		$this->db->select('*');
		$this->db->from('task_list_activity');
		$this->db->where('id_task_list',$id_task_list);
		$this->db->where('tanggal like "%'.$date_now.'%"');
		//var_dump('tanggal like "%'.$date_now.'%"');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_activity_list_where_date($date_now){
		$this->db->select('*');
		$this->db->from('task_list_activity');
		$this->db->where('tanggal like "%'.$date_now.'%"');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_jam_of_task_list($id_task_list){
		$this->db->select('jam');
		$this->db->from('task_list');
		$this->db->where('id_task_list',$id_task_list);
		$result = $this->db->get();
		return $result->row_array();
	}
	
	function get_tanggal_of_task_list($id_task_list){
		$this->db->select('tanggal');
		$this->db->from('task_list');
		$this->db->where('id_task_list',$id_task_list);
		$result = $this->db->get();
		return $result->row_array();
	}

	function deletehistorytemporary($date){

		$query = "delete FROM `task_list_activity_history_temporary` WHERE `task_list_activity_history_temporary`.`tanggal` like '%".$date."%' ";

		$result = $this->db->query($query);
	} 

	function get_countidteambydatehistory($date){

		$query = "select DISTINCT(`task_list`.`id_team`) FROM `task_list` INNER JOIN `task_list_activity_history_temporary` ON `task_list_activity_history_temporary`.`id_task_list` = `task_list`.`id_task_list` WHERE `task_list_activity_history_temporary`.`tanggal` =  '".$date."' ";

		$result = $this->db->query($query);
		return $result->result_array();
	} 

	function get_task_persen_by_period($date,$id_team){
//$query = "select * from task_list_activity ";
//		$result = $this->db->query($query);

		$query = "select team,(100/total*tepat) AS tepatpersen,(100/total*lambat) AS lambatpersen FROM(SELECT COUNT(id_act) AS total,team,COUNT(IF(MinuteDiff <= duration,1,NULL)) AS tepat ,COUNT(IF(MinuteDiff > duration,1,NULL)) AS lambat    FROM (SELECT tm.nama AS team,tl.id_act, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified,  IF(tl.jam='',10,TIMESTAMPDIFF(MINUTE, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified)) AS MinuteDiff , t.duration FROM task_list_activity_history_temporary AS tl INNER JOIN task_list t ON t.id_task_list= tl.id_task_list INNER JOIN master_team as tm ON tm.id_team= t.id_team WHERE tl.tanggal LIKE '%".$date."%' AND t.id_team = ".$id_team."  AND tl.pelaksanaan = 1) AS tb) tb2";


		//"select team,(100/total*tepat) AS tepatpersen,(100/total*lambat) AS lambatpersen FROM(SELECT COUNT(id_act) AS total,team,COUNT( IF(MinuteDiff <= duration,(IF(MinuteDiff > 0,1,NULL)),NULL) ) AS tepat ,COUNT(IF(MinuteDiff > duration,1,(IF(MinuteDiff < 0,1,NULL)))) AS lambat    FROM (SELECT tm.nama AS team,tl.id_act, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified,  IF(tl.jam='',10,TIMESTAMPDIFF(MINUTE, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified)) AS MinuteDiff , t.duration FROM task_list_activity_history AS tl INNER JOIN task_list t ON t.id_task_list= tl.id_task_list INNER JOIN master_team as tm ON tm.id_team= t.id_team WHERE tl.tanggal LIKE '%".$date."%' AND t.id_team = ".$id_team.") AS tb) tb2";

		$result = $this->db->query($query);
		return $result->result_array();
	} 

	function get_cek_teamada($date,$id_team){
//$query = "select * from task_list_activity ";
//		$result = $this->db->query($query);

		$query = "SELECT tm.nama AS team,tl.id_act, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified,  IF(tl.jam='',10,TIMESTAMPDIFF(MINUTE, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified)) AS MinuteDiff , t.duration FROM task_list_activity_history_temporary AS tl INNER JOIN task_list t ON t.id_task_list= tl.id_task_list INNER JOIN master_team as tm ON tm.id_team= t.id_team WHERE tl.tanggal LIKE '%".$date."%' AND t.id_team = ".$id_team."  AND tl.pelaksanaan = 1";


		//"select team,(100/total*tepat) AS tepatpersen,(100/total*lambat) AS lambatpersen FROM(SELECT COUNT(id_act) AS total,team,COUNT( IF(MinuteDiff <= duration,(IF(MinuteDiff > 0,1,NULL)),NULL) ) AS tepat ,COUNT(IF(MinuteDiff > duration,1,(IF(MinuteDiff < 0,1,NULL)))) AS lambat    FROM (SELECT tm.nama AS team,tl.id_act, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified,  IF(tl.jam='',10,TIMESTAMPDIFF(MINUTE, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified)) AS MinuteDiff , t.duration FROM task_list_activity_history AS tl INNER JOIN task_list t ON t.id_task_list= tl.id_task_list INNER JOIN master_team as tm ON tm.id_team= t.id_team WHERE tl.tanggal LIKE '%".$date."%' AND t.id_team = ".$id_team.") AS tb) tb2";

		$result = $this->db->query($query);
		return $result->result_array();
	} 

	function get_task_persen_by_period_yes($date,$id_team){
//$query = "select * from task_list_activity ";
//		$result = $this->db->query($query);

		$query = "select team,(100/total*tepat) AS tepatpersen,(100/total*lambat) AS lambatpersen FROM(SELECT COUNT(id_act) AS total,team,COUNT(IF(MinuteDiff <= duration,1,NULL)) AS tepat ,COUNT(IF(MinuteDiff > duration,1,NULL)) AS lambat    FROM (SELECT tm.nama AS team,tl.id_act, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified,  IF(tl.jam='',10,TIMESTAMPDIFF(MINUTE, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified)) AS MinuteDiff , t.duration FROM task_list_activity_history_temporary AS tl INNER JOIN task_list t ON t.id_task_list= tl.id_task_list INNER JOIN master_team as tm ON tm.id_team= t.id_team WHERE tl.tanggal LIKE '%".$date."%' AND t.id_team = ".$id_team."  AND tl.pelaksanaan = 1) AS tb) tb2";


		//"select team,(100/total*tepat) AS tepatpersen,(100/total*lambat) AS lambatpersen FROM(SELECT COUNT(id_act) AS total,team,COUNT( IF(MinuteDiff <= duration,(IF(MinuteDiff > 0,1,NULL)),NULL) ) AS tepat ,COUNT(IF(MinuteDiff > duration,1,(IF(MinuteDiff < 0,1,NULL)))) AS lambat    FROM (SELECT tm.nama AS team,tl.id_act, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified,  IF(tl.jam='',10,TIMESTAMPDIFF(MINUTE, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified)) AS MinuteDiff , t.duration FROM task_list_activity_history AS tl INNER JOIN task_list t ON t.id_task_list= tl.id_task_list INNER JOIN master_team as tm ON tm.id_team= t.id_team WHERE tl.tanggal LIKE '%".$date."%' AND t.id_team = ".$id_team.") AS tb) tb2";

		$result = $this->db->query($query);
		return $result->result_array();
	} 

	function get_countuseridby_period($date){

		$query = "select COUNT(DISTINCT(`task_list_activity_history_temporary`.`id_user`)) AS countuser FROM `task_list_activity_history_temporary` INNER JOIN `master_user` ON `master_user`.`id_user` = `task_list_activity_history_temporary`.`id_user` AND `master_user`.id_team IN (23,11,48,12,13,3,46,45,35,36,20,2) WHERE `task_list_activity_history_temporary`.`tanggal` LIKE '%".$date."%' ";

		$result = $this->db->query($query);
		return $result->result_array();
	} 

	function get_tanggal_by_period($date){

		$query = "select DISTINCT(tanggal) FROM task_list_activity_history WHERE task_list_activity_history.tanggal LIKE '%".$date."%' ORDER BY tanggal ASC";


		$result = $this->db->query($query);
		return $result->result_array();
	} 

	function get_task_persen_day_by_period($date){

		$query = "select '".$date."' as tanggal,(100/total*tepat) AS tepatpersen,(100/total*lambat) AS lambatpersen FROM(SELECT COUNT(id_act) AS total,COUNT(IF(MinuteDiff <= duration,1,NULL)) AS tepat ,COUNT(IF(MinuteDiff > duration,1,NULL)) AS lambat    FROM (SELECT tl.id_act, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified,  IF(tl.jam='',10,TIMESTAMPDIFF(MINUTE, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified)) AS MinuteDiff , t.duration FROM task_list_activity_history_temporary AS tl INNER JOIN task_list t ON t.id_task_list= tl.id_task_list WHERE tl.tanggal LIKE '%".$date."%'  AND tl.pelaksanaan = 1) AS tb) tb2";


		//"select team,(100/total*tepat) AS tepatpersen,(100/total*lambat) AS lambatpersen FROM(SELECT COUNT(id_act) AS total,team,COUNT( IF(MinuteDiff <= duration,(IF(MinuteDiff > 0,1,NULL)),NULL) ) AS tepat ,COUNT(IF(MinuteDiff > duration,1,(IF(MinuteDiff < 0,1,NULL)))) AS lambat    FROM (SELECT tm.nama AS team,tl.id_act, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified,  IF(tl.jam='',10,TIMESTAMPDIFF(MINUTE, CONCAT(tl.tanggal, ' ', tl.jam), tl.last_modified)) AS MinuteDiff , t.duration FROM task_list_activity_history AS tl INNER JOIN task_list t ON t.id_task_list= tl.id_task_list INNER JOIN master_team as tm ON tm.id_team= t.id_team WHERE tl.tanggal LIKE '%".$date."%' AND t.id_team = ".$id_team.") AS tb) tb2";

		$result = $this->db->query($query);
		return $result->result_array();
	} 



	function get_listpendingpelaksanaantanggal($id_team,$date_now){
		
		$this->db->select('tl.tanggal');
		$this->db->distinct();
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->where('t.id_team',$id_team);
		$this->db->where('tl.pelaksanaan','0');
		$this->db->where('tl.tanggal NOT like "%'.$date_now.'%"');
		$this->db->order_by('tl.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	
	function get_listpendingpelaksanaan($id_team,$date_now){
		$this->db->select('tl.jam, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,t.link_bpo,t.form,t.duration,tl.camera,t.with_img_valid');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->where('t.id_team',$id_team);
		$this->db->where('tl.pelaksanaan','0');
		$this->db->where('tl.tanggal NOT like "%'.$date_now.'%"');
		$this->db->order_by('tl.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_listpendingpicbkstanggal($date_now){
		
		$this->db->select('tl.tanggal');
		$this->db->distinct();
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->where('(t.id_team in (23,11,48,12,13,3,46,45))');
		$this->db->join('master_team as mt','mt.id_team = t.id_team','left');
		$this->db->where('tl.paraf_pic','0');
		$this->db->where('tl.pelaksanaan != 2');
		$this->db->where('tl.tanggal NOT like "%'.$date_now.'%"');
		$this->db->order_by('tl.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_listpendingpicbks($date_now){
		$this->db->select('tl.jam, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,t.link_bpo,t.form,mt.nama as team,t.duration,tl.camera,t.with_img_valid');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','mt.id_team = t.id_team','left');
		$this->db->where('(t.id_team in (23,11,48,12,13,3,46,45))');
		$this->db->where('tl.paraf_pic','0');
		$this->db->where('tl.pelaksanaan != 2');
		$this->db->where('tl.tanggal NOT like "%'.$date_now.'%"');
		$this->db->order_by('tl.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_listpendingbrispvtanggal($date_now){
		
		$this->db->select('tl.tanggal');
		$this->db->distinct();
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->where('tl.paraf_supervisor','0');
		$this->db->where('tl.pelaksanaan != 2');
		$this->db->where('tl.tanggal NOT like "%'.$date_now.'%"');
		$this->db->order_by('tl.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_maxdate(){
		//SELECT MAX(`task_list_activity_history`.`tanggal`) AS tanggal FROM `task_list_activity_history`
		$this->db->select('MAX(`task_list_activity_history`.`tanggal`) AS tanggal');
		$this->db->from('task_list_activity_history');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_listpendingbrispv($date_now){
		$this->db->select('tl.jam, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,t.link_bpo,mt.nama as team,t.form,t.duration,tl.camera,t.with_img_valid');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','t.id_team = mt.id_team','left');
		$this->db->where('tl.paraf_supervisor','0');
		$this->db->where('tl.pelaksanaan != 2');
		$this->db->where('tl.tanggal NOT like "%'.$date_now.'%"');
		$this->db->order_by('tl.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_listpendingbrispvbyassigner($date_now,$id_user){

		$this->db->select('tl.id_user,tl.jam, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,t.link_bpo,mt.nama as team,t.form,t.duration,tl.camera,t.with_img_valid');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','t.id_team = mt.id_team','left');
		$this->db->where('tl.paraf_supervisor','0');
		$this->db->where('tl.pelaksanaan != 2');
		$this->db->where('tl.tanggal NOT like "%'.$date_now.'%"');
		$this->db->where('tl.assigner like "%'.$id_user.'%"');
		$this->db->order_by('tl.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_task_where_idteamBKS_now($date_now){

		$unixTimestamp = strtotime($date_now);
		$day = date("l", $unixTimestamp);
		

		$this->db->select('*');
		$this->db->from('task_list');
		$this->db->where('(id_team in (23,11,48,12,13,3,46,45))');
		//$this->db->where('id_task_list','18534');
		
		//$this->db->where('link_bpo','0');
		$this->db->where('(tanggal like "%'.$date_now.'%" or tanggal like "%'.$day.'%")');

		$result = $this->db->get();
		return $result->result_array();
	}



	function get_now_pic_bks($id_task_list,$date_now){
		$this->db->select('mt.nama as team,tl.jam, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,t.form,t.duration');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','mt.id_team = t.id_team','left');
		$this->db->where('tl.id_task_list',$id_task_list);
		$this->db->where('tl.tanggal like "%'.$date_now.'%"');
		$this->db->where('t.id_team IN (23,11,48,12,13,3,46,45)');
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_now_spv($id_task_list,$date_now,$id){
		$this->db->select('tl.jam,tl.id_user, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,mt.nama as team,t.form,t.duration,tl.camera,t.with_img_valid,tl.permohonan');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','t.id_team = mt.id_team','left');
		$this->db->where('tl.id_task_list',$id_task_list);
		$this->db->where('tl.tanggal like "%'.$date_now.'%"');
		$this->db->where('(tl.assigner like "%'.$id.'%" or tl.jam ="" or tl.jam =" " or tl.jam ="  ")');
		$result = $this->db->get();


		return $result->result_array();
	}


	function get_now_kabag($date){
		$this->db->select('tl.jam,tl.id_user, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,tl.id_paraf_pic,tl.id_paraf_wa_kabag,tl.paraf_wa_kabag,mt.nama as team,t.duration');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','t.id_team = mt.id_team','left');
		$this->db->where('tl.tanggal like "%'.$date.'%"');

		$this->db->order_by('tl.id_paraf_pic,tl.id_paraf_supervisor asc',false);
		//$this->db->where('(tl.assigner like "%'.$id.'%" or tl.jam ="" or tl.jam =" " or tl.jam ="  ")');
		$result = $this->db->get();


		return $result->result_array();
	}

	function get_list_report($date,$idteam){
		$this->db->select('tl.jam, tl.id_act, tl.id_user, tl.tanggal, tl.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,tl.id_paraf_pic,tl.id_paraf_wa_kabag,tl.paraf_wa_kabag,mt.nama as team,t.duration');
		$this->db->from('task_list_activity_history as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','t.id_team = mt.id_team','left');
		$this->db->where('tl.tanggal like "%'.$date.'%"');
		if ($idteam){
		$this->db->where('mt.id_team in ('.$idteam.')');
		}
		$this->db->order_by('mt.nama','asc');
		$this->db->order_by('tl.jam','asc');
		//$this->db->where('(tl.assigner like "%'.$id.'%" or tl.jam ="" or tl.jam =" " or tl.jam ="  ")');
		$result = $this->db->get();


		return $result->result_array();
	}

	function get_list_report_excel($date,$idteam){
		$this->db->select('tl.jam, tl.id_act, tl.id_user, tl.tanggal, tl.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,tl.id_paraf_pic,tl.id_paraf_wa_kabag,tl.paraf_wa_kabag,mt.nama as team,t.duration');
		$this->db->from('task_list_activity_history as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','t.id_team = mt.id_team','left');
		$this->db->where('tl.tanggal like "%'.$date.'%"');
		$this->db->where('mt.id_company not in (1)');
		if ($idteam){
		$this->db->where('mt.id_team in ('.$idteam.')');
		}

		$this->db->order_by('mt.nama','asc');
		$this->db->order_by('tl.jam','asc');
		//$this->db->where('(tl.assigner like "%'.$id.'%" or tl.jam ="" or tl.jam =" " or tl.jam ="  ")');
		$result = $this->db->get();


		return $result->result_array();
	}
	function get_all_now_kabag_statusbribelumparaf($date){
		$this->db->select('tl.id_act');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','t.id_team = mt.id_team','left');
		$this->db->where('tl.tanggal like "%'.$date.'%"');
		//$this->db->where('(tl.assigner like "%'.$id.'%" or tl.jam ="" or tl.jam =" " or tl.jam ="  ")');
		$result = $this->db->get();


		return $result->result_array();
	}

	function get_now_kabag_statusbribelumparaf($date){
		$this->db->select('tl.id_act');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','t.id_team = mt.id_team','left');
		$this->db->where('tl.tanggal like "%'.$date.'%"');
		$this->db->where('tl.paraf_supervisor','0');
		$this->db->where('tl.pelaksanaan != 2');
		//$this->db->where('(tl.assigner like "%'.$id.'%" or tl.jam ="" or tl.jam =" " or tl.jam ="  ")');
		$result = $this->db->get();


		return $result->result_array();
	}
	
	function generate_activity($id_task_list,$jams,$tanggal,$aktifitas){
		$jams = preg_replace('/\s+/', '', $jams);
		$data=array
		(
			'id_task_list'=>$id_task_list,
			'aktifitas'=>$aktifitas,
			'jam'=>$jams,
			'tanggal'=>$tanggal

		);

		$simpan = $this->db->insert('task_list_activity',$data);
	}
	
	function get_activity_list_by_idtask($id_task_list){
		$this->db->select('*');
		$this->db->from('task_list_activity');
		$this->db->where('id_task_list',$id_task_list);
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_task_where_idteam($id_team){
		$this->db->select('*');
		$this->db->from('task_list');
		$this->db->where('id_team',$id_team);
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_addhoctask_where_idteam($id_team){
		$this->db->select('*');
		$this->db->from('task_list');
		$this->db->where('tanggal',"");
		$this->db->where('id_team',$id_team);
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function update_pelaksanaan_activity($status,$id_act,$keterangan,$id_user,$time){
		$data=array(
			'id_user'=>$id_user,
			'pelaksanaan'=>$status,
			'keterangan'=>$keterangan,
			'last_modified'=>$time
		);
		//var_dump($data);
			$this->db->where('id_act',$id_act);
			$this->db->update('task_list_activity', $data);
	}

	function update_permohonan($id_act,$keterangan,$id_user,$time){
		$data=array(
			'id_user'=>$id_user,
			'permohonan'=>$keterangan,
			'last_modified'=>$time
		);
		//var_dump($data);
			$this->db->where('id_act',$id_act);
			$this->db->update('task_list_activity', $data);
	}

	function update_pelaksanaan_activity_by_img($status,$id_act,$keterangan,$id_user,$time,$camera){

		$data=array(
			'id_user'=>$id_user,
			'pelaksanaan'=>$status,
			'keterangan'=>$keterangan,
			'last_modified'=>$time,
			'camera'	=>$camera
		);
		//var_dump($data);
			$this->db->where('id_act',$id_act);
			$this->db->update('task_list_activity', $data);
	}

	
	
	function update_paraf_pic($id_act,$time,$id_user){
		$data=array(
			'id_paraf_pic'=>$id_user,
			'paraf_pic'=>1,
			'time_paraf_pic'=>$time
		);
			$this->db->where('id_act',$id_act);
			$this->db->update('task_list_activity', $data);
	}

	function update_approve_permohonan($id_act,$time){
		$data=array(
			'last_modified'=>$time
		);
			$this->db->where('id_act',$id_act);
			$this->db->update('task_list_activity', $data);
	}


	
	function reset_task($id_act){
		$data=array(
			'id_user'=>0,
			'pelaksanaan'=>0,
			'keterangan'=>"",
			'id_paraf_pic'=>0,
			'paraf_pic'=>0,
			'time_paraf_pic'=>""
		);
			$this->db->where('id_act',$id_act);
			$this->db->update('task_list_activity', $data);
	}
	
	function update_paraf_spv($id_act,$time,$id_user){
		$data=array(
			'id_paraf_supervisor'=>$id_user,
			'paraf_supervisor'=>1,
			'time_paraf_supervisor'=>$time
		);
		
			$this->db->where('id_act',$id_act);
			$this->db->update('task_list_activity', $data);
	}
	
	//$this->task_model->update_assigner_not_jam($this->input->get('id_act'),date('H:i:s'),$id_user);
	function update_assigner_not_jam($id_act,$date,$id_user){
		$data=array(
			'assigner'=>$id_user,
			//'assigner'=>$id_user,
		);
		
			$this->db->where('id_act',$id_act);
			$this->db->update('task_list_activity', $data);
	}

	function get_idparaf_supervisor($id_act){
		$this->db->select('id_paraf_supervisor');
		$this->db->from('task_list_activity');
		$this->db->where('id_act',$id_act);
		$result = $this->db->get();
		return $result->row_array();
	}
	
	function get_assigner($id_act){
		$this->db->select('assigner');
		$this->db->from('task_list_activity');
		$this->db->where('id_act',$id_act);
		$result = $this->db->get();
		return $result->row_array();
	}
	
	function get_tanggal_kabag(){
		$this->db->select('tanggal');
		$this->db->distinct();
		$this->db->from('task_list_activity');
		$this->db->order_by('tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_activity_byteam_date($team,$date){
		$this->db->select('tl.*');
		$this->db->from('task_list_activity tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->where('t.id_team',$team);
		$this->db->where('tl.tanggal like "%'.$date.'%"');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_countpershift($shift,$team,$date){
		$this->db->select('COUNT(tl.id_act) as count');
		$this->db->from('task_list_activity tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->where('t.id_team',$team);
		$this->db->where('tl.tanggal like "%'.$date.'%"');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_now($id_task_list,$date_now){
		$this->db->select('tl.jam, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,t.link_bpo,t.form,fu.id_form_ups as ups,fu2.id_form_ups as ups2,fu3.id_form_ups_mb2 as ups3,fl.id_lvmdp as lvmdp,fl2.id_lvmdp as lvmdp2,ft.id_tangki as tangki,fk.id_kwh as kwh,fk2.id_kwh as kwh2,fk3.id_kwh as kwh3,fac.id_ac as acliebert,fg.id_genset as genset,t.duration,tl.camera,t.with_img_valid,tl.permohonan');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('form_ups_temporary as fu','fu.id_act = tl.id_act AND fu.ups_no =1','left');
		$this->db->join('form_ups_temporary as fu2','fu2.id_act = tl.id_act AND fu2.ups_no =2','left');
		$this->db->join('form_ups_mb2_temporary as fu3','fu3.id_act = tl.id_act ','left');
		$this->db->join('form_tangki_month as ft','ft.id_act = tl.id_act','left');
		$this->db->join('form_lvmdp_month as fl','fl.id_act = tl.id_act  AND fl.lvmdp_no =1','left');
		$this->db->join('form_lvmdp_month as fl2','fl2.id_act = tl.id_act AND fl2.lvmdp_no =2','left');
		$this->db->join('form_kwh_month as fk','fk.id_act = tl.id_act AND fk.lokasi =1','left');
		$this->db->join('form_kwh_month as fk2','fk2.id_act = tl.id_act AND fk2.lokasi =2','left');
		$this->db->join('form_kwh_month as fk3','fk3.id_act = tl.id_act AND fk3.lokasi =110','left');
		$this->db->join('form_genset_month as fg','fg.id_act = tl.id_act','left');
		$this->db->join('form_ac_liebert as fac','fac.id_act = tl.id_act','left');
		$this->db->where('tl.id_task_list',$id_task_list);
		$this->db->where('tl.tanggal like "%'.$date_now.'%"');

		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_now_fast($id_team,$date_now){
		$this->db->select('tl.jam, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,t.link_bpo,t.form,fu.id_form_ups as ups,fu2.id_form_ups as ups2,fu3.id_form_ups_mb2 as ups3,fl.id_lvmdp as lvmdp,fl2.id_lvmdp as lvmdp2,ft.id_tangki as tangki,fk.id_kwh as kwh,fk2.id_kwh as kwh2,fk3.id_kwh as kwh3,fac.id_ac as acliebert,fg.id_genset as genset,t.duration,tl.camera,t.with_img_valid,tl.permohonan');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('form_ups_temporary as fu','fu.id_act = tl.id_act AND fu.ups_no =1','left');
		$this->db->join('form_ups_temporary as fu2','fu2.id_act = tl.id_act AND fu2.ups_no =2','left');
		$this->db->join('form_ups_mb2_temporary as fu3','fu3.id_act = tl.id_act ','left');
		$this->db->join('form_tangki_temporary as ft','ft.id_act = tl.id_act','left');
		$this->db->join('form_lvmdp_temporary as fl','fl.id_act = tl.id_act  AND fl.lvmdp_no =1','left');
		$this->db->join('form_lvmdp_temporary as fl2','fl2.id_act = tl.id_act AND fl2.lvmdp_no =2','left');
		$this->db->join('form_kwh_temporary as fk','fk.id_act = tl.id_act AND fk.lokasi =1','left');
		$this->db->join('form_kwh_temporary as fk2','fk2.id_act = tl.id_act AND fk2.lokasi =2','left');
		$this->db->join('form_kwh_temporary as fk3','fk3.id_act = tl.id_act AND fk3.lokasi =110','left');
		$this->db->join('form_genset_temporary as fg','fg.id_act = tl.id_act','left');
		$this->db->join('form_ac_liebert_temporary as fac','fac.id_act = tl.id_act','left');
		if(!strcmp("0", $id_team)){
		}else {
		$this->db->where('t.id_team',$id_team);
		}
		$this->db->where('tl.tanggal like "%'.$date_now.'%"');

		$result = $this->db->get();
		return $result->result_array();
	}


	
	function get_my_activity_byteamdate_fromyesterdayactivity($team,$date){
		$this->db->select('mt.nama,tl.jam, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,t.link_bpo,t.form,fu.id_form_ups as ups,fu2.id_form_ups as ups2,fu3.id_form_ups_mb2 as ups3,fl.id_lvmdp as lvmdp,fl2.id_lvmdp as lvmdp2,ft.id_tangki as tangki,fk.id_kwh as kwh,fk2.id_kwh as kwh2,fk3.id_kwh as kwh3,fac.id_ac as acliebert,fg.id_genset as genset,t.duration,tl.camera,t.with_img_valid,tl.permohonan');
		$this->db->from('task_list_activity tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','mt.id_team = t.id_team','left');
		$this->db->join('form_ups_temporary as fu','fu.id_act = tl.id_act AND fu.ups_no =1','left');
		$this->db->join('form_ups_temporary as fu2','fu2.id_act = tl.id_act AND fu2.ups_no =2','left');
		$this->db->join('form_ups_mb2_temporary as fu3','fu3.id_act = tl.id_act ','left');
		$this->db->join('form_tangki_temporary as ft','ft.id_act = tl.id_act','left');
		$this->db->join('form_lvmdp_temporary as fl','fl.id_act = tl.id_act  AND fl.lvmdp_no =1','left');
		$this->db->join('form_lvmdp_temporary as fl2','fl2.id_act = tl.id_act AND fl2.lvmdp_no =2','left');
		$this->db->join('form_kwh_temporary as fk','fk.id_act = tl.id_act AND fk.lokasi =1','left');
		$this->db->join('form_kwh_temporary as fk2','fk2.id_act = tl.id_act AND fk2.lokasi =2','left');
		$this->db->join('form_kwh_temporary as fk3','fk3.id_act = tl.id_act AND fk3.lokasi =110','left');
		$this->db->join('form_genset_temporary as fg','fg.id_act = tl.id_act','left');
		$this->db->join('form_ac_liebert_temporary as fac','fac.id_act = tl.id_act','left');


		$this->db->where('tl.jam >= "23:00:00"');
		if(!strcmp("0", $team)){
		}else {
		$this->db->where('t.id_team',$team);
		}
		$this->db->where('tl.tanggal like "%'.$date.'%"');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_bks_activity_byteamdate_fromyesterdayactivity($date){
		$this->db->select('mt.nama as team,tl.jam, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,t.link_bpo,t.form,fu.id_form_ups as ups,fu2.id_form_ups as ups2,fu3.id_form_ups_mb2 as ups3,fl.id_lvmdp as lvmdp,fl2.id_lvmdp as lvmdp2,ft.id_tangki as tangki,fk.id_kwh as kwh,fk2.id_kwh as kwh2,fk3.id_kwh as kwh3,fac.id_ac as acliebert,fg.id_genset as genset,t.duration,tl.camera,t.with_img_valid,tl.permohonan');
		$this->db->from('task_list_activity tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','mt.id_team = t.id_team','left');
		$this->db->join('form_ups_temporary as fu','fu.id_act = tl.id_act AND fu.ups_no =1','left');
		$this->db->join('form_ups_temporary as fu2','fu2.id_act = tl.id_act AND fu2.ups_no =2','left');
		$this->db->join('form_ups_mb2_temporary as fu3','fu3.id_act = tl.id_act ','left');
		$this->db->join('form_tangki_temporary as ft','ft.id_act = tl.id_act','left');
		$this->db->join('form_lvmdp_temporary as fl','fl.id_act = tl.id_act  AND fl.lvmdp_no =1','left');
		$this->db->join('form_lvmdp_temporary as fl2','fl2.id_act = tl.id_act AND fl2.lvmdp_no =2','left');
		$this->db->join('form_kwh_temporary as fk','fk.id_act = tl.id_act AND fk.lokasi =1','left');
		$this->db->join('form_kwh_temporary as fk2','fk2.id_act = tl.id_act AND fk2.lokasi =2','left');
		$this->db->join('form_kwh_temporary as fk3','fk3.id_act = tl.id_act AND fk3.lokasi =110','left');
		$this->db->join('form_genset_temporary as fg','fg.id_act = tl.id_act','left');
		$this->db->join('form_ac_liebert_temporary as fac','fac.id_act = tl.id_act','left');


		$this->db->where('tl.jam >= "23:00:00"');
		$this->db->where('(t.id_team in (23,11,48,12,13,3,46,45))');
		$this->db->where('tl.tanggal like "%'.$date.'%"');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_all_activity_byteamdate_fromyesterdayactivity($team,$date){
		$this->db->select('mt.nama as team,tl.jam,tl.id_user, tl.id_act, tl.tanggal, t.aktifitas,t.id_team,tl.pelaksanaan,tl.last_modified,tl.keterangan,tl.paraf_pic,tl.time_paraf_pic,tl.paraf_supervisor,tl.assigner,tl.id_paraf_supervisor,t.link_bpo,t.form,fu.id_form_ups as ups,fu2.id_form_ups as ups2,fu3.id_form_ups_mb2 as ups3,fl.id_lvmdp as lvmdp,fl2.id_lvmdp as lvmdp2,ft.id_tangki as tangki,fk.id_kwh as kwh,fk2.id_kwh as kwh2,fk3.id_kwh as kwh3,fac.id_ac as acliebert,fg.id_genset as genset,t.duration,tl.camera,t.with_img_valid,tl.permohonan');
		$this->db->from('task_list_activity tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->join('master_team as mt','mt.id_team = t.id_team','left');
		$this->db->join('form_ups_temporary as fu','fu.id_act = tl.id_act AND fu.ups_no =1','left');
		$this->db->join('form_ups_temporary as fu2','fu2.id_act = tl.id_act AND fu2.ups_no =2','left');
		$this->db->join('form_ups_mb2_temporary as fu3','fu3.id_act = tl.id_act ','left');
		$this->db->join('form_tangki_temporary as ft','ft.id_act = tl.id_act','left');
		$this->db->join('form_lvmdp_temporary as fl','fl.id_act = tl.id_act  AND fl.lvmdp_no =1','left');
		$this->db->join('form_lvmdp_temporary as fl2','fl2.id_act = tl.id_act AND fl2.lvmdp_no =2','left');
		$this->db->join('form_kwh_temporary as fk','fk.id_act = tl.id_act AND fk.lokasi =1','left');
		$this->db->join('form_kwh_temporary as fk2','fk2.id_act = tl.id_act AND fk2.lokasi =2','left');
		$this->db->join('form_kwh_temporary as fk3','fk3.id_act = tl.id_act AND fk3.lokasi =110','left');
		$this->db->join('form_genset_temporary as fg','fg.id_act = tl.id_act','left');
		$this->db->join('form_ac_liebert_temporary as fac','fac.id_act = tl.id_act','left');


		$this->db->where('tl.jam >= "23:00:00"');
		if(!strcmp("0", $team)){
		}else {
		$this->db->where('t.id_team',$team);
		}
		$this->db->where('tl.tanggal like "%'.$date.'%"');
		$result = $this->db->get();
		return $result->result_array();
	}

	
	function get_activity_shift_byidtask($a,$b,$id_task){
		$query = "select * from task_list_activity where jam between '".$a."' and '".$b."'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
	function update_assigner($time_start,$time_end,$spv,$id_task,$date){
		$data = array(
			'assigner'=>$spv
		);

		$this->db->where('tanggal like "%'.$date.'%"');
		$this->db->where('id_task_list = "'.$id_task.'" and jam >= "'.$time_start.'" and jam < "'.$time_end.'"');
		$this->db->update('task_list_activity', $data);
	}
	
	function get_paraf_spv($id_user){
		$this->db->select('*');
		$this->db->from('task_list_activity');
		$this->db->where('assigner like "%'.$id_user.'%"');
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_paraf1_spv($id_user){
		$this->db->select('*');
		$this->db->from('task_list_activity');
		$this->db->where('id_paraf_supervisor like "%'.$id_user.'%"');
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_data_parafakhir($tgl){
		$this->db->select('t.aktifitas,tl.jam,tl.pelaksanaan,tl.paraf_pic,tl.paraf_supervisor,t.id_team,tl.keterangan,tl.assigner,tl.id_paraf_supervisor');
		$this->db->from('task_list_activity as tl');
		$this->db->join('task_list as t','t.id_task_list = tl.id_task_list','left');
		$this->db->where('tl.tanggal',$tgl);
		$this->db->where('tl.assigner != 0');
		$this->db->where('tl.paraf_wa_kabag',0);
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function approve($tgl,$time,$id_user){
		$data = array(
			'id_paraf_wa_kabag'=>$id_user,
			'paraf_wa_kabag'=>1,
			'time_paraf_wa_kabag'=>$time
		);
			$this->db->where('tanggal',$tgl);
			$this->db->update('task_list_activity',$data);
	}
	
	function get_approve($tgl){
		$this->db->select('*');
		$this->db->from('task_list_activity');
		$this->db->where('tanggal',$tgl);
		$this->db->where('paraf_wa_kabag',1);
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function insert_task_history($id_act,$id_user,$id_task_list,$jam,$tanggal,$pelaksanaan,$keterangan,$last_modified,$id_paraf_pic,$paraf_pic,$time_paraf_pic,$id_paraf_supervisor,$paraf_supervisor,$time_paraf_supervisor,$id_paraf_wa_kabag,$paraf_wa_kabag,$time_paraf_wa_kabag,$assigner,$kegiatan){
		$data = array(
		'id_act'=>$id_act,
		'id_user'=>$id_user,
		'id_task_list'=>$id_task_list,
		'jam'=>$jam,
		'tanggal'=>$tanggal,
		'pelaksanaan'=>$pelaksanaan,
		'keterangan'=>$keterangan,
		'last_modified'=>$last_modified,
		'id_paraf_pic'=>$id_paraf_pic,
		'paraf_pic'=>$paraf_pic,
		'time_paraf_pic'=>$time_paraf_pic,
		'id_paraf_supervisor'=>$id_paraf_supervisor,
		'paraf_supervisor'=>$paraf_supervisor,
		'time_paraf_supervisor'=>$time_paraf_supervisor,
		'id_paraf_wa_kabag'=>$id_paraf_wa_kabag,
		'paraf_wa_kabag'=>$paraf_wa_kabag,
		'time_paraf_wa_kabag'=>$time_paraf_wa_kabag,
		'assigner'=>$assigner,
		'aktifitas'=>$kegiatan
		);
		$this->db->insert('task_list_activity_history',$data);
		$this->db->insert('task_list_activity_history_temporary',$data);
	}
	
	function delete_activity_bydate($tgl){
		$this->db->where('tanggal',$tgl);
		$this->db->delete('task_list_activity');
	}
	//function hapus($tgl){
	//$this->db->query("delete from master_team where id_team = $id_team");
	//}
}
