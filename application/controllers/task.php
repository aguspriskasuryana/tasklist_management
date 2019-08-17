<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
    {
        parent::__construct();
		$this->load->library('csrf');
		$this->load->model('task_model');
		$this->load->model('team_model');
		$this->load->model('form_model');
		//date_default_timezone_set('Asia/Jakarta');
    }
	
	function index()
	{	
		/*$data['page_title'] = 'Daftar Task';
		$data['css_arr'] = array('datatables.css');
		$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
		$this->load->view('template/header', $data);
		$this->load->view('task/getDataTaskMaster', $data);
		$this->load->view('template/footer'); */

		redirect(site_url()."/task/getDataTaskMaster");
	}

	function getDataTaskMaster(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');
		$data['task']= $this->task_model->get_task($id['id_team'],$id['id_role']);
		
			//var_dump($data['activity_list']);
			$data['page_title'] = 'Daftar Task';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_task_list', $data);
			$this->load->view('template/footer');
				
	}

	function get_home_dashboard(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');
		$data['task']= $this->task_model->get_task($id['id_team'],$id['id_role']);
		
			//var_dump($data['activity_list']);
			$data['page_title'] = 'Daftar Task';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('homedashboard', $data);
			//$this->load->view('template/footer');
				
	}

	function get_dashboardbyperiod(){
		$month = date("Y-m", strtotime("first day of previous month"));
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');
		$team = $this->team_model->get_allteam_in_history_task($month);
		$countuser = $this->task_model->get_countuseridby_period($month);
		
		$data['countuser'] = $countuser;
		$data['team'] = $team;
		$data['dataemployeepower'] = array();
		$data['value'] = "";
		foreach($team as $teams){
			$task = $this->task_model->get_task_persen_by_period($month,$teams['id_team']);
			//var_dump($task[$x]['tepatpersen']);
			array_push($data['dataemployeepower'],$task);
		}
		//var_dump($team[0]['nama']);
		asort($data['dataemployeepower']);

		$tanggalPeriod = $this->task_model->get_tanggal_by_period($month); 

		$data['dataDate'] = array();
		foreach($tanggalPeriod as $tanggalPeriodS){
			$persenbydate = $this->task_model->get_task_persen_day_by_period($tanggalPeriodS['tanggal']);
			array_push($data['dataDate'],$persenbydate);
		}

			//var_dump($data['activity_list']);
			$data['page_title'] = 'Daftar Task';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('homedashboard', $data);
			$this->load->view('template/footer');
				
	}


	function get_data_totalpershit(){

		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$shift =$this->input->get('shift');
		$id = $this->session->userdata('user_data');
		$count=$this->task_model->get_countpershift($shift,$id['id_team'],$time);
		//var_dump($count);
		//$tanggalx = explode(",",$datatanggal['tanggal']);
		echo json_encode($count['count']);
	}

	
	function get_data_task()
	{
		$this->load->library('datatables');
		$id = $this->session->userdata('user_data');
		if($id['id_role'] == 0){
		$this->datatables
			->select('t.id_task_list as id_task, t.aktifitas, tm.nama as nama, (IF(t.tanggal="1,","Senin-Jumat",t.tanggal))) as tanggals, t.jam, t.form', false)
			->from('task_list as t')
			->join('master_team as tm', 'tm.id_team = t.id_team','left')
			->add_column('aksi', '<a href="'.site_url('task/detil/$1').'" data-toggle="ajaxModal" class="btn btn-xs btn-default"><i class="fa fa-picture-o" data-toggle="tooltip" data-original-title="Detil"></i></a>', 'id_task');			
		}else{
		$this->datatables
			->select('t.id_task_list as id_task, t.aktifitas, tm.nama as nama, IF(t.tanggal="*,","Setiap Hari",(IF(t.tanggal="1,","Senin-Jumat",t.tanggal))) as tanggals, t.jam, t.link_bpo as bpo, t.form', false)
			->from('task_list as t')
			->join('master_team as tm', 'tm.id_team = t.id_team','left')
			->where('t.id_team =',$id['id_team'])
			
			->add_column('aksi', 

				'<a target="blank" href="'.site_url('../BPO/$2/$3').'" data-toggle="ajaxModal" class="btn btn-xs btn-default"><i class="fa fa-picture-o" data-toggle="tooltip" data-original-title="Detil"></i></a>
				&nbsp
				<a href="'.site_url('task/hapus_task/$1').'" class="btn detail_icon btn-xs btn-danger btn-delete-task" data-toggle="tooltip" data-original-title="Delete Task"><i class="fa fa-trash-o"></i></a>', 
				'id_task,nama,bpo');
			//->add_column('aksi', '<a href="'.site_url('task/detil/$1').'" data-toggle="ajaxModal" class="btn btn-xs btn-default"><i class="fa fa-picture-o" data-toggle="tooltip" data-original-title="Detil"></i></a>&nbsp<a href="'.site_url('task/edit_task/$1').'" data-toggle="ajaxModal" class="btn btn-xs btn-default"><i class="fa fa-picture-o" data-toggle="tooltip" data-original-title="Edit"></i></a>&nbsp<a href="'.site_url('task/hapus_task/$1').'" class="btn detail_icon btn-xs btn-danger btn-delete-task" data-toggle="tooltip" data-original-title="Delete Task"><i class="fa fa-trash-o"></i></a>', 'id_task');
		}
		$res = $this->datatables->generate();
		echo $res;
	}
	
	
	function tambah_task()
	{
		$data['page_title'] = 'Form Tambah Task';
		$data['css_arr'] = array(
			'fuelux.css',
			'select2.css',
			'datepicker.css',
			'rab.css',
			'fileinput.css',
			'dropzone.css',
			'jquery-ui-autocomplete.css'
		);
		$data['js_arr'] = array(
			'parsley/parsley.min.js',
			'parsley/parsley.extend.js',
			'select2/select2.min.js',
			'datepicker/bootstrap-datepicker.js',
			'fileinput.min.js',
			'dropzone.min.js',
			'jquery-ui-autocomplete.js'
		);
		$id = $this->session->userdata('user_data');

		$data['form'] = $this->task_model->get_all_form();
		if($id['id_role'] == 0 || $id['id_team'] == 23 ||  $id['id_team'] == 44 || $id['id_team'] == 1){
		$data['team'] = $this->task_model->get_all_team();
		} else {
		$data['team'] = $this->task_model->get_team_where($id['id_team']);
		}
		//var_dump($data['team']);
		$this->load->view('template/header', $data);
		$this->load->view('form_tambah_task', $data);
		$this->load->view('template/footer');
	}
	
	function simpan_data()
	{
		$data_tanggal = $this->input->post('tanggalx');
		$jam = array_unique($this->input->post('jam'));
		$data_jam = '';
		foreach($jam as $jams){
			$data_jam .= $jams.', '; 
		}


		$form = $this->task_model->get_all_form();

		$aForm = '';
		foreach($form as $x => $x_value) {
		$val = $this->input->post($x);
			if ($val){
			$aForm .= $x.', '; 
			}
		}
		//var_dump($aForm);
		//var_dump($data_jam);
		$id = $this->session->userdata('user_data');
		$id_user = $id['id_user'];
		if($this->input->post('link_bpo') == ""){
		$bpo = '0';
		}else{
		$bpo = $this->input->post('link_bpo');
		}
		$this->task_model->simpan_data($data_tanggal,$data_jam,$id_user,$bpo,$aForm);
		//$this->input->post('jam')
		redirect('task');
	
	}

	function simpan_data_ups()
	{
		
		$id = $this->session->userdata('user_data');
		$id_user = $id['id_user'];
		$id_team = $id['id_team'];
		$tanggal = date("Y-m-d");
		if($this->input->post('link_bpo') == ""){
		$bpo = '0';
		}else{
		$bpo = $this->input->post('link_bpo');
		}
		$this->form_model->simpan_data_ups($id_user,$id_team,$tanggal);
		//$this->input->post('jam')
		redirect('task');
	
	}

	function simpan_data_form($typeform)
	{
		
		$id = $this->session->userdata('user_data');
		$id_user = $id['id_user'];
		$id_team = $id['id_team'];
		$tanggal = date("Y-m-d");
		if($this->input->post('link_bpo') == ""){
		$bpo = '0';
		}else{
		$bpo = $this->input->post('link_bpo');
		}
		if ($typeform=="ups"){
			$this->form_model->simpan_data_ups($id_user,$id_team,$tanggal);
		} elseif ($typeform=="upsmb2"){
			$this->form_model->simpan_data_ups_mb2($id_user,$id_team,$tanggal);
		} elseif ($typeform=="tangki"){
			$this->form_model->simpan_data_tangki($id_user,$id_team,$tanggal);
		} elseif ($typeform=="genset"){
			$this->form_model->simpan_data_genset($id_user,$id_team,$tanggal);
		} elseif ($typeform=="lvmdp"){
			$this->form_model->simpan_data_lvmdp($id_user,$id_team,$tanggal);
		} elseif ($typeform=="kwh"){
			$this->form_model->simpan_data_kwh($id_user,$id_team,$tanggal);
		} elseif ($typeform=="acliebert"){
			$this->form_model->simpan_data_acliebert($id_user,$id_team,$tanggal);
		} elseif ($typeform=="acliebertmb2"){
			$this->form_model->simpan_data_acliebert_mb2($id_user,$id_team,$tanggal);
		}
//var_dump($typeform);
		
		//$this->input->post('jam')
		redirect('task/activity');
	
	}


	function simpan_data_edit_form($typeform)
	{
		
		$id = $this->session->userdata('user_data');
		$id_user = $id['id_user'];
		$id_team = $id['id_team'];
		$tanggal = date("Y-m-d");
		
		if ($typeform=="ups"){
			$this->form_model->simpan_data_edit_ups($id_user,$id_team,$tanggal);
			redirect('form/getlistformups');
		} elseif ($typeform=="upsmb2"){
			$this->form_model->simpan_data_edit_ups_mb2($id_user,$id_team,$tanggal);
			redirect('form/getlistformupsmb2');
		} elseif ($typeform=="tangki"){
			$this->form_model->simpan_data_edit_tangki($id_user,$id_team,$tanggal);
			redirect('form/getlistformtangki');
		} elseif ($typeform=="genset"){
			$this->form_model->simpan_data_edit_genset($id_user,$id_team,$tanggal);
			redirect('form/getlistformgenset');
		} elseif ($typeform=="lvmdp"){
			$this->form_model->simpan_data_edit_lvmdp($id_user,$id_team,$tanggal);
			redirect('form/getlistformlvmdp');
		} elseif ($typeform=="kwh"){
			$this->form_model->simpan_data_edit_kwh($id_user,$id_team,$tanggal);
			redirect('form/getlistformkwh');
		} elseif ($typeform=="acliebert"){
			$this->form_model->simpan_data_edit_acliebert($id_user,$id_team,$tanggal);
			redirect('form/getlistformacliebert');
		} elseif ($typeform=="acliebertmb2"){
			$this->form_model->simpan_data_edit_acliebert_mb2($id_user,$id_team,$tanggal);
			redirect('form/getlistformacliebertmb2');
		}

		redirect('form/getlistformups');
	
	}

	

	function simpan_data_edit()
	{
		$data_tanggal = $this->input->post('tanggalx');
		$data_jam = $this->input->post('jam');
		
		
		$form = $this->task_model->get_all_form();

		$aForm = '';
		foreach($form as $x => $x_value) {
		$val = $this->input->post($x);
			if ($val){
			$aForm .= $x.', '; 
			}
		}

		$id = $this->session->userdata('user_data');
		$id_user = $id['id_user'];
		if($this->input->post('link_bpo') == ""){
		$bpo = '0';
		}else{
		$bpo = $this->input->post('link_bpo');
		}
		$this->task_model->update_data($data_tanggal,$data_jam,$id_user,$bpo,$aForm);
		//$this->input->post('jam')
		redirect('task');
	
	}

	function simpan_data_addhoc()
	{
		$id_task_list = $this->input->post('id_task_list_addhoc');
		$aktifitas = $this->input->get($id_task_list);
		$jam = $this->input->post('jam_addhoc');
		//var_dump($data_jam);
		$id = $this->session->userdata('user_data');
		$id_user = $id['id_user'];
		//var_dump($id_task_list);
		//var_dump($jam);
		$this->task_model->generate_activity($id_task_list,$jam,date("Y-m-d"),$aktifitas['aktifitas']);
		//$this->input->post('jam')
		redirect('task/activity');
	
	}
	
	
	function edit_task($id_task)
	    {
		
	        $data['page_title'] = 'Form edit Task';
	        $this->load->model('task_model');
	        $id = $this->session->userdata('user_data');

	        $data['css_arr'] = array(
				'fuelux.css',
				'select2.css',
				'datepicker.css',
				'rab.css',
				'fileinput.css',
				'dropzone.css',
				'jquery-ui-autocomplete.css'
			);
			$data['js_arr'] = array(
				'parsley/parsley.min.js',
				'parsley/parsley.extend.js',
				'select2/select2.min.js',
				'datepicker/bootstrap-datepicker.js',
				'fileinput.min.js',
				'dropzone.min.js',
				'jquery-ui-autocomplete.js'
			);


			$data['form'] = $this->task_model->get_all_form();
	        $data['query']=$this->task_model->get($id_task);
	        $data['team']=$this->team_model->get($data['query']['id_team']);

	        if($id['id_role'] == 0 || $id['id_team'] == 23  ||  $id['id_team'] == 44|| $id['id_team'] == 1){
			$data['list_team'] = $this->task_model->get_all_team();
			} else {
			$data['list_team'] = $this->task_model->get_team_where($id['id_team']);
			}

	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_task', $data);
	        $this->load->view('template/footer');
		
	    }

		
	function activity(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');
		//var_dump($id);
		$task_now = $this->task_model->get_task_where_idteam_now($id['id_team'],date("Y-m-d"));
		$data['form_name'] = $this->task_model->get_all_form();
	
		//var_dump($data['form']['ups3']);

		//$task_AddHoc_Now = $this->task_model->get_addhoctask_where_idteam_now($id['id_team'],date("Y-m-d"));
		
		//var_dump($task_now);
		//$req_task_now = $this->task_model->get_task_from_form_req_where_idteam_now($id['id_team'],date("Y-m-d"));
		$t =date("Y-m-d");
		$unixTimestamp = strtotime($t);
 
		//Get the day of the week using PHP's date function.
		$dayOfWeek = date("l", $unixTimestamp);
		
		$data['user'] = $this->task_model->get_all_user();
		
		//var_dump($dayOfWeek);
		if($task_now){			
			$jamnya =date("h");
			$intjm = (int)$jamnya;
			//var_dump($intjm);
			if($intjm < 22){

				$this->form_model->hapustemporaryform(date("Y-m-d"));
				foreach($task_now as $activity_now){

					$cek_activity_list = $this->task_model->get_activity_list_now($activity_now['id_task_list'],date("Y-m-d"));
					$isijam=$activity_now['jam'];
					$isitanggal=$activity_now['tanggal'];
					if(!$cek_activity_list){
					//var_dump("j:".$activity_now['jam']);
						if ((strlen($isijam) < 6)  && (strlen($isitanggal) != 0) ){
							//var_dump("MASUK");
							$this->task_model->generate_activity($activity_now['id_task_list'],"",date("Y-m-d"),$activitynow['aktifitas']);
						} else {
							$jam = explode(",",$activity_now['jam']);
							$jam = preg_replace('/\s+/', '', $jam);
							//var_dump($jam);
							foreach($jam as $jams){
								if(strlen($jams) != 0  && (strlen($isitanggal) != 0) && (strlen($isitanggal) != 1)){
								$this->task_model->generate_activity($activity_now['id_task_list'],$jams,date("Y-m-d"),$activity_now['aktifitas'],$activity_now['aktifitas']);
								//var_dump($jams);
								
								}
							}	
						}
						
					}
				}
			}
					
			
				

			$data['activity_list'] = array();
			$data['teamSession']= $this->team_model->get($id['id_team']);

			$data['addhoctask_list_team'] = $this->task_model->get_addhoctask_where_idteam($id['id_team']);
			$data['activity_list'] = $this->task_model->get_now_fast($id['id_team'],date("Y-m-d"));
			$yesterdayActivitys = $this->task_model->get_my_activity_byteamdate_fromyesterdayactivity($id['id_team'],date("Y-m-d", strtotime("yesterday")));

			//var_dump($yesterdayActivitys);	
			
			

			foreach($yesterdayActivitys as $yesterdayActivity){
				array_push($data['activity_list'],$yesterdayActivity);
			}

			//foreach($todayActivitys as $todayActivity){
			//	array_push($data['activity_list'],$todayActivity);
			//}

			//foreach($task_now as $activity_now){
				//$activity_list = $this->task_model->get_now($activity_now['id_task_list'],date("Y-m-d"));
				//foreach($activity_list as $data_activity_list){
					//array_push($data['activity_list'],$data_activity_list);
				//}
			//}
			

			foreach($data['addhoctask_list_team'] as $activity_addhoc_now){
				$activity_addhoc_list = $this->task_model->get_now($activity_addhoc_now['id_task_list'],date("Y-m-d"));
			
				foreach($activity_addhoc_list as $data_activity_addhoc_list){
					//array_push($data['activity_list'],$data_activity_addhoc_list);
				}
			}

			

			

			$data['lokasi'] = $this->task_model->get_all_lokasi();

			asort($data['activity_list']);
			//var_dump($data['activity_list']);
			$data['page_title'] = 'Daftar Aktifitas';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			
			if($id['id_role'] == 3){
				$this->load->view('paraf_spv_self', $data);
			}else{ 
				if($id['id_role'] == 4){
					$this->load->view('paraf_pic_self', $data);
				}else if($id['id_role'] == 7){
					$this->load->view('paraf_pic_self', $data);
				}else if($id['id_role'] == 6){
					$this->load->view('paraf_pic_self', $data);
				}else{
					$this->load->view('list_activity_now', $data);
				}
			}

			$this->load->view('template/footer');
				
					
				
			
		} else {
			$data['teamSession']= $this->team_model->get($id['id_team']);
				
			$data['activity_list'] = array();
			
			asort($data['activity_list']);
			//var_dump($data['activity_list']);
			$data['page_title'] = 'Daftar Aktifitas';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			if($id['id_role'] == 3){
				$this->load->view('paraf_spv_self', $data);
			}else{ 
				if($id['id_role'] == 4){
					$this->load->view('paraf_pic_self', $data);
				}else if($id['id_role'] == 7){
					$this->load->view('paraf_pic_self', $data);
				}else if($id['id_role'] == 6){
					$this->load->view('paraf_pic_self', $data);
				}else{
						$this->load->view('list_activity_now', $data);
				}
			}

			$this->load->view('template/footer');
				
					
				
		}
	}

	function activitypending(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');
		$data['activity_listpending'] = array();

		
		$data['activity_listpending'] = $this->task_model->get_listpendingpelaksanaan($id['id_team'],date("Y-m-d"));
		$data['tanggalpending'] = $this->task_model->get_listpendingpelaksanaantanggal($id['id_team'],date("Y-m-d"));
		//var_dump($data['activity_listpending']);
		$data['teamSession']= $this->team_model->get($id['id_team']);

			

			//asort($data['activity_listpending']);
			//var_dump($data['activity_list']);
			$data['page_title'] = 'Daftar Aktifitas';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			if($id['id_role'] == 3){
				$this->load->view('paraf_spv_self_pending', $data);
			}else{ 
				if($id['id_role'] == 4){
					$this->load->view('paraf_pic_self_pending', $data);
				}else if($id['id_role'] == 7){
					$this->load->view('paraf_pic_self_pending', $data);
				}else if($id['id_role'] == 6){
					$this->load->view('paraf_pic_self_pending', $data);
				}else{
					$this->load->view('list_activity_pending', $data);
				}
			}

			$this->load->view('template/footer');
				
							
			
	}

	
	function input_pelaksanaan($status){
		//echo $this->input->get('id_act');
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		
		$id = $this->session->userdata('user_data');
		
		if($status == 1){
			if($id){
				$this->task_model->update_pelaksanaan_activity(1,$this->input->get('id_act'),'-',$id['id_user'],$time);
				if($id['id_role']==4){
					$this->input_paraf(1);
				}
				if($id['id_role']==7){
					$this->input_paraf(1);
				}
				if($id['id_role']==6){
					$this->input_paraf(1);
				}
				if($id['id_role']==3){
					$this->input_paraf(1);
					$this->input_paraf(2);
				}
			} else {
				//bawa ke login 
				redirect('home/dashboard2'); 	
			}
																	
		}else if ($status == 2){
			$this->task_model->update_pelaksanaan_activity(2,$this->input->get('id_act'),$this->input->get('alasan'),$id['id_user'],$time);
		}else{
			//var_dump('expression');
			$this->task_model->update_permohonan($this->input->get('id_act'),$this->input->get('permohonan'),$id['id_user'],$time);
		}
	}
	
	function paraf_spv_bri(){
		$id = $this->session->userdata('user_data');
		$task_now = $this->task_model->get_task_now(date("Y-m-d"));
		$data['user'] = $this->task_model->get_all_user();
		
		//var_dump($jams);
		if($task_now){			
			foreach($task_now as $activity_now){
				$cek_activity_list = $this->task_model->get_activity_list_now($activity_now['id_task_list'],date("Y-m-d"));
				//var_dump($cek_activity_list);
				$isijam=$activity_now['jam'];
				$isitanggal=$activity_now['tanggal'];
				if(!$cek_activity_list){
//var_dump("masuk sini");
					if ((strlen($isijam) < 6)  && (strlen($isitanggal) != 0) ){
						//var_dump("MASUK");
						$this->task_model->generate_activity($activity_now['id_task_list'],"",date("Y-m-d"),$activity_now['aktifitas']);
					} else {
						$jam = explode(",",$activity_now['jam']);
						$jam = preg_replace('/\s+/', '', $jam);
						//var_dump($jam);
						foreach($jam as $jams){
							if(strlen($jams) != 0  && (strlen($isitanggal) != 0) && (strlen($isitanggal) != 1)){
							$this->task_model->generate_activity($activity_now['id_task_list'],$jams,date("Y-m-d"),$activity_now['aktifitas']);
							//var_dump($jams);
							
							}
						}	
					}
					
				}
			}


			$yesterdayActivitys = $this->task_model->get_all_activity_byteamdate_fromyesterdayactivity("0",date("Y-m-d", strtotime("yesterday")));
			$data['activity_list'] = array();
			

			foreach($yesterdayActivitys as $yesterdayActivity){
				array_push($data['activity_list'],$yesterdayActivity);
			}

			foreach($task_now as $activity_now){
			$activity_list = $this->task_model->get_now_spv($activity_now['id_task_list'],date("Y-m-d"),$id['id_user']);
			//var_dump($activity_list);
				foreach($activity_list as $data_activity_list){
					array_push($data['activity_list'],$data_activity_list);
				}
			}


			$data['activity_listpending'] = $this->task_model->get_listpendingbrispvbyassigner(date("Y-m-d"),$id['id_user']);
			//var_dump($data['status_paraf']);
			asort($data['activity_list']);
			//$team = $this->task_model->get_team_where($id_team);
			$data['page_title'] = 'Daftar Aktifitas';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('paraf_spv_bri', $data);
			$this->load->view('template/footer');	
			
		} else{echo 'tidak ada kegiatan hari ini!';}
		
	}

	function paraf_spv_bri_uncheckonly(){
		$id = $this->session->userdata('user_data');
		$task_now = $this->task_model->get_task_now(date("Y-m-d"));
		$data['user'] = $this->task_model->get_all_user();
		
		//var_dump($jams);
		if($task_now){			
			foreach($task_now as $activity_now){
				$cek_activity_list = $this->task_model->get_activity_list_now($activity_now['id_task_list'],date("Y-m-d"));
				//var_dump($cek_activity_list);
				$isijam=$activity_now['jam'];
				$isitanggal=$activity_now['tanggal'];
				if(!$cek_activity_list){
//var_dump("masuk sini");
					if ((strlen($isijam) < 6)  && (strlen($isitanggal) != 0) ){
						//var_dump("MASUK");
						$this->task_model->generate_activity($activity_now['id_task_list'],"",date("Y-m-d"),$activity_now['aktifitas']);
					} else {
						$jam = explode(",",$activity_now['jam']);
						$jam = preg_replace('/\s+/', '', $jam);
						//var_dump($jam);
						foreach($jam as $jams){
							if(strlen($jams) != 0  && (strlen($isitanggal) != 0) && (strlen($isitanggal) != 1)){
							$this->task_model->generate_activity($activity_now['id_task_list'],$jams,date("Y-m-d"),$activity_now['aktifitas']);
							//var_dump($jams);
							
							}
						}	
					}
					
				}
			}


			$yesterdayActivitys = $this->task_model->get_all_activity_byteamdate_fromyesterdayactivity("0",date("Y-m-d", strtotime("yesterday")));
			$data['activity_list'] = array();
			

			foreach($yesterdayActivitys as $yesterdayActivity){
				array_push($data['activity_list'],$yesterdayActivity);
			}

			foreach($task_now as $activity_now){
			$activity_list = $this->task_model->get_now_spv($activity_now['id_task_list'],date("Y-m-d"),$id['id_user']);
			//var_dump($activity_list);
				foreach($activity_list as $data_activity_list){
					array_push($data['activity_list'],$data_activity_list);
				}
			}


			$data['activity_listpending'] = $this->task_model->get_listpendingbrispvbyassigner(date("Y-m-d"),$id['id_user']);
			//var_dump($data['status_paraf']);
			asort($data['activity_list']);
			//$team = $this->task_model->get_team_where($id_team);
			$data['page_title'] = 'Daftar Aktifitas';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('paraf_spv_bri', $data);
			$this->load->view('template/footer');	
			
		} else{echo 'tidak ada kegiatan hari ini!';}
		
	}

	function paraf_spv_bri_pending(){		
		$id = $this->session->userdata('user_data');
			//var_dump($time);
		$id = $this->session->userdata('user_data');
		$data['activity_listpending'] = array();
		
		$data['user'] = $this->task_model->get_all_user();
		
		$data['activity_listpending'] = $this->task_model->get_listpendingbrispv(date("Y-m-d"));
		$data['tanggalpending'] = $this->task_model->get_listpendingbrispvtanggal(date("Y-m-d"));
		//var_dump($data['activity_listpending']);
		$data['teamSession']= $this->team_model->get($id['id_team']);
			asort($data['activity_listpending']);
			//$team = $this->task_model->get_team_where($id_team);
			$data['page_title'] = 'Daftar Aktifitas BKS';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('paraf_spv_bri_pending', $data);
			$this->load->view('template/footer');
			
		
	}
	
	function assign_spv(){
		$time = date('Y-m-d H:i:s');
		
		$id = $this->session->userdata('user_data');
		$task_now = $this->task_model->get_task_now(date("Y-m-d"));
		
		if($task_now){			
			foreach($task_now as $activity_now){
				$cek_activity_list = $this->task_model->get_activity_list_now($activity_now['id_task_list'],date("Y-m-d"));
				$isijam=$activity_now['jam'];
				$isitanggal=$activity_now['tanggal'];
				if(!$cek_activity_list){
					
					if ((strlen($isijam) < 6)  && (strlen($isitanggal) != 0) ){
						
						$this->task_model->generate_activity($activity_now['id_task_list'],"",date("Y-m-d"),$activity_now['aktifitas']);
					} else {
						$jam = explode(",",$activity_now['jam']);
						$jam = preg_replace('/\s+/', '', $jam);
						
						foreach($jam as $jams){
							if(strlen($jams) != 0  && (strlen($isitanggal) != 0) && (strlen($isitanggal) != 1)){
							$this->task_model->generate_activity($activity_now['id_task_list'],$jams,date("Y-m-d"),$activity_now['aktifitas']);

							}
						}	
					}
					
				}
			}					
				
					
				
			
		} else{echo 'tidak ada kegiatan hari ini!';}
		$data['notif'] = $this->notif();
		$data['team'] = $this->task_model->get_all_team();
		$data['user'] = $this->task_model->get_all_user();
		$data['page_title'] = 'Form Assign Supervisor';
		$data['css_arr'] = array('datatables.css');
		$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
		$this->load->view('template/header', $data);
		$this->load->view('form_assigner', $data);
		$this->load->view('template/footer');
	}
	
	function simpan_assigner(){
		$spv1='';
		foreach($this->input->post('spv') as $spv){
			$spv1 .= $spv.',';
		}
		
		//var_dump($spv1);
		if($this->input->post('team') == '*'){
		$task = $this->task_model->get_idtask_where_now(date("Y-m-d"));
		}else{
			$task = $this->task_model->get_idtask_where_idteam_now($this->input->post('team'),date("Y-m-d"));
		}
		
		//var_dump($task);
		if($this->input->post('shift') == 1){
		$time_start = '07:30:00';
		$time_end = '15:59:59';
		foreach($task as $tasks){
			$a = date('H:i:s',strtotime($time_start));
			$b = date('H:i:s',strtotime($time_end));
			$this->task_model->update_assigner($a,$b,$spv1,$tasks['id_task_list'],date("Y-m-d"));
		}
		}else{
			if($this->input->post('shift') == 2){
			$time_start = '16:00:00';
			$time_end = '22:59:59';
			foreach($task as $tasks){
				$a = date('H:i:s',strtotime($time_start));
				$b = date('H:i:s',strtotime($time_end));
				$this->task_model->update_assigner($a,$b,$spv1,$tasks['id_task_list'],date("Y-m-d"));
			}

			}else{ //shift 3
				$jam_submit = date('H:i:s');
				//if($jam_submit > date('H:i:s',strtotime('23:00:00')) && $jam_submit < date('H:i:s',strtotime('23:59:59'))){
				//	$time_start = '23:00:00';
				//	$time_end = '23:59:59';
				//}else{
				//	$time_start = '00:00:00';
				//	$time_end = '07:29:59';
				//}

					if($jam_submit > date('H:i:s',strtotime('07:00:00')) && $jam_submit < date('H:i:s',strtotime('23:59:59'))){
					$time_start = '23:00:00';
					$time_end = '23:59:59';
					foreach($task as $tasks){
						$a = date('H:i:s',strtotime($time_start));
						$b = date('H:i:s',strtotime($time_end));
						$this->task_model->update_assigner($a,$b,$spv1,$tasks['id_task_list'],date("Y-m-d"));
					}


					if($this->input->post('team') == '*'){
							$task_tomorrow = $this->task_model->get_task_now(date("Y-m-d", strtotime('tomorrow')));
					}else{
							$task_tomorrow = $task_now = $this->task_model->get_task_where_idteam_now($id['id_team'],date("Y-m-d", strtotime('tomorrow')));
					}

					$task_tomorrow = $this->task_model->get_task_now(date("Y-m-d", strtotime('tomorrow')));
					//break extrajoss dulu
					if($task_tomorrow){			
						foreach($task_tomorrow as $activity_tomorrow){
							$cek_activity_list_tomorrow = $this->task_model->get_activity_list_now($activity_tomorrow['id_task_list'],date("Y-m-d", strtotime('tomorrow')));
							
							//var_dump($cek_activity_list_tomorrow);
							if(!$cek_activity_list_tomorrow){
							
								$isijam=$activity_tomorrow['jam'];
								$isitanggal=$activity_tomorrow['tanggal'];
								if ((strlen($isijam) < 6)  && (strlen($isitanggal) != 0) ){
									$this->task_model->generate_activity($activity_tomorrow['id_task_list'],"",date("Y-m-d", strtotime('tomorrow')),$activity_tomorrow['aktifitas']);
								} else {
									$jam = explode(",",$activity_tomorrow['jam']);
									
									$jam = preg_replace('/\s+/', '', $jam);
									foreach($jam as $jams){
										if(strlen($jams) != 0 && (strlen($isitanggal) != 0) && (strlen($isitanggal) != 1)){
										$this->task_model->generate_activity($activity_tomorrow['id_task_list'],$jams,date("Y-m-d", strtotime('tomorrow')),$activity_tomorrow['aktifitas']);
										//var_dump($jams);
										
										}
									}

								}
								
							}

						}
					}


					$time_start = '00:00:00';
					$time_end = '07:29:59';
					foreach($task_tomorrow as $activity_tomorrow){
						$a = date('H:i:s',strtotime($time_start));
						$b = date('H:i:s',strtotime($time_end));

						$this->task_model->update_assigner($a,$b,$spv1,$activity_tomorrow['id_task_list'],date("Y-m-d", strtotime('tomorrow')));
					}

				} else {
					$time_start = '00:00:00';
					$time_end = '07:29:59';
					foreach($task as $tasks){
						$a = date('H:i:s',strtotime($time_start));
						$b = date('H:i:s',strtotime($time_end));
						$this->task_model->update_assigner($a,$b,$spv1,$tasks['id_task_list'],date("Y-m-d"));
					}

				}
				
			}
		}
		
		
		redirect('task/assign_spv');
	}
	
	function paraf_pic_bks($id_team){		
		$id = $this->session->userdata('user_data');
		$task_now = $this->task_model->get_task_where_idteamBKS_now(date("Y-m-d"));
		//var_dump($task_now);
		if($task_now){			
			foreach($task_now as $activity_now){
				$cek_activity_list = $this->task_model->get_activity_list_now($activity_now['id_task_list'],date("Y-m-d"));
				if(!$cek_activity_list){
					$jam = explode(",",$activity_now['jam']);
					//var_dump($jam);
					$isijam=$activity_now['jam'];
				$isitanggal=$activity_now['tanggal'];
				if(!$cek_activity_list){
				//var_dump("j:".$activity_now['jam']);
					if ((strlen($isijam) < 6)  && (strlen($isitanggal) != 0) ){
						//var_dump("MASUK");
						$this->task_model->generate_activity($activity_now['id_task_list'],"",date("Y-m-d"),$activity_now['aktifitas']);
					} else {
						$jam = explode(",",$activity_now['jam']);
						$jam = preg_replace('/\s+/', '', $jam);
						//var_dump($jam);
						foreach($jam as $jams){
							if(strlen($jams) != 0  && (strlen($isitanggal) != 0) && (strlen($isitanggal) != 1)){
							$this->task_model->generate_activity($activity_now['id_task_list'],$jams,date("Y-m-d"),$activity_now['aktifitas']);
							//var_dump($jams);
							
							}
						}	
					}
					
				}
				}
			}
				
			$yesterdayActivitys = $this->task_model->get_bks_activity_byteamdate_fromyesterdayactivity(date("Y-m-d", strtotime("yesterday")));
			//var_dump($yesterdayActivitys);	
			$data['activity_list'] = array();
			

			foreach($yesterdayActivitys as $yesterdayActivity){
				array_push($data['activity_list'],$yesterdayActivity);
			}

			foreach($task_now as $activity_now){
			//$activity_list = $this->task_model->get_now($activity_now['id_task_list'],date("Y-m-d"));
			$activity_list = $this->task_model->get_now_pic_bks($activity_now['id_task_list'],date("Y-m-d"));
			//var_dump($activity_list);
			
				foreach($activity_list as $data_activity_list){
					array_push($data['activity_list'],$data_activity_list);
				}
			}
			asort($data['activity_list']);
			//$team = $this->task_model->get_team_where($id_team);
			$data['page_title'] = 'Daftar Aktifitas BKS';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('paraf_pic_bks', $data);
			$this->load->view('template/footer');
			
		} else{echo 'tidak ada kegiatan hari ini!';}
		
	}

	function paraf_pic_bks_pending($id_team){		
		$id = $this->session->userdata('user_data');
			//var_dump($time);
		$id = $this->session->userdata('user_data');
		$data['activity_listpending'] = array();

		
		$data['activity_listpending'] = $this->task_model->get_listpendingpicbks(date("Y-m-d"));
		$data['tanggalpending'] = $this->task_model->get_listpendingpicbkstanggal(date("Y-m-d"));
		//var_dump($data['activity_listpending']);
		$data['teamSession']= $this->team_model->get($id['id_team']);
			asort($data['activity_listpending']);
			//$team = $this->task_model->get_team_where($id_team);
			$data['page_title'] = 'Daftar Aktifitas BKS';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('paraf_pic_bks_pending', $data);
			$this->load->view('template/footer');
			
		
	}
	
	function input_paraf($status){
		//echo $this->input->get('id_act');
		$id = $this->session->userdata('user_data');
		if($status == 1){
		$this->task_model->update_paraf_pic($this->input->get('id_act'),date('H:i:s'),$id['id_user']);
		}else{
			$paraf_spv = $this->task_model->get_idparaf_supervisor($this->input->get('id_act'));
			if($paraf_spv['id_paraf_supervisor'] == 0){
				$id_user = $id['id_user'].',';
			}else{
				$id_user = $paraf_spv['id_paraf_supervisor'].$id['id_user'].',';
			}
			$this->task_model->update_paraf_spv($this->input->get('id_act'),date('H:i:s'),$id_user);
			$assigner = $this->task_model->get_assigner($this->input->get('id_act'));
			if($assigner['assigner'] == 0){
				$this->task_model->update_assigner_not_jam($this->input->get('id_act'),date('H:i:s'),$id_user);
			}	
			
		}
	}


	function input_approve_permohonan(){
		//echo $this->input->get('id_act');
		$id = $this->session->userdata('user_data');
		$this->task_model->update_approve_permohonan($this->input->get('id_act'),$this->input->get('time'));
		
	}


	function approvekabag(){
		$id = $this->session->userdata('user_data');
		$this->task_model->approve($this->input->get('tanggal'),date('H:i:s'),$id['id_user']);
		$hasil_approve = $this->task_model->get_approve($this->input->get('tanggal'));
		//var_dump($hasil_approve);
		foreach($hasil_approve as $hasil){
			$this->task_model->insert_task_history($hasil['id_act'],$hasil['id_user'],$hasil['id_task_list'],$hasil['jam'],$hasil['tanggal'],$hasil['pelaksanaan'],$hasil['keterangan'],$hasil['last_modified'],$hasil['id_paraf_pic'],$hasil['paraf_pic'],$hasil['time_paraf_pic'],$hasil['id_paraf_supervisor'],$hasil['paraf_supervisor'],$hasil['time_paraf_supervisor'],$hasil['id_paraf_wa_kabag'],$hasil['paraf_wa_kabag'],$hasil['time_paraf_wa_kabag'],$hasil['assigner'],$hasil['aktifitas']);
		}
		$this->task_model->delete_activity_bydate($this->input->get('tanggal'));



		$data['tanggal'] = $this->task_model->get_tanggal_kabag();
		//$this->input->post('spv')
		$data['tanggalselect'] = $this->input->post('btn_tanggal_new');

		$data['user'] = $this->task_model->get_all_user();
		//var_dump($this->input->post('btn_tanggal_new'));
		if (!($data['tanggalselect'])){
			$data['tanggalselect'] = date("Y-m-d", strtotime("yesterday"));
		}

		$id = $this->session->userdata('user_data');
		$data['activity_list'] = $this->task_model->get_now_kabag($data['tanggalselect']);
		$data['statusApp'] = $this->task_model->get_now_kabag_statusbribelumparaf($data['tanggalselect']);
		
		

			//var_dump($data['status_paraf']);
			asort($data['activity_list']);
			//$team = $this->task_model->get_team_where($id_team);
			$data['page_title'] = 'Daftar Aktifitas';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('paraf_kabag', $data);
			$this->load->view('template/footer');	
	}


	function paraf_kabag(){
		$data['tanggalselect'] = $this->input->post('btn_tanggal_new');

		//var_dump($this->input->post('btn_tanggal_new'));
		if (!($data['tanggalselect'])){
			$data['tanggalselect'] = date("Y-m-d", strtotime("yesterday"));
		}

		$id = $this->session->userdata('user_data');
		
		$data['user'] = $this->task_model->get_all_user();
		$data['activity_list'] = $this->task_model->get_now_kabag($data['tanggalselect']);
		$data['statusApp'] = $this->task_model->get_now_kabag_statusbribelumparaf($data['tanggalselect']);
		
		$data['tanggal'] = $this->task_model->get_tanggal_kabag();

			//var_dump($data['statusApp']);
			asort($data['activity_list']);
			//$team = $this->task_model->get_team_where($id_team);
			$data['page_title'] = 'Daftar Aktifitas';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('paraf_kabag', $data);
			$this->load->view('template/footer');	
			
		
	}

	function list_report(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');
		$data['tanggalselect'] = $this->input->post('tgl');
		$data['id_team'] = $this->input->post('id_team');

		//var_dump($this->input->post('btn_tanggal_new'));
		if (!($data['tanggalselect'])){
			$data['tanggalselect'] = date("Y-m-d", strtotime("yesterday"));
		}
		if (!($data['id_team'])){
			$data['id_team'] = "";
		}

		$data['team'] = $this->team_model->get_all_team();
		$id = $this->session->userdata('user_data');
		$data['activity_list'] = $this->task_model->get_list_report($data['tanggalselect'],$data['id_team']);	

		//$data['task']= $this->task_model->get_task($id['id_team'],$id['id_role']);


			$data['user'] = $this->task_model->get_all_user();
		
			//var_dump($data['activity_list']);
			$data['page_title'] = 'Task';
			$data['css_arr'] = array(
				'fuelux.css',
				'select2.css',
				'datepicker.css',
				'rab.css',
				'fileinput.css',
				'dropzone.css',
				'jquery-ui-autocomplete.css','datatables.css'
			);
			$data['js_arr'] = array(
				'parsley/parsley.min.js',
				'parsley/parsley.extend.js',
				'select2/select2.min.js',
				'datepicker/bootstrap-datepicker.js',
				'fileinput.min.js',
				'dropzone.min.js',
				'jquery-ui-autocomplete.js','datatables/jquery.dataTables.min.js'
			);
			$this->load->view('template/header', $data);
			$this->load->view('list_report', $data);
			$this->load->view('template/footer');
				
	}

	
	function list_report_excel(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');
		$data['tanggalselect'] = $this->input->post('tgl');

		$data['id_team'] = $this->input->post('id_team');

		//var_dump($this->input->post('btn_tanggal_new'));
		if (!($data['tanggalselect'])){
			$data['tanggalselect'] = date("Y-m-d", strtotime("yesterday"));
		}
		if (!($data['id_team'])){
			$data['id_team'] = "";
		}

		$data['team'] = $this->team_model->get_all_team();
		$id = $this->session->userdata('user_data');
		$data['activity_list'] = $this->task_model->get_list_report_excel($data['tanggalselect'],$data['id_team']);

		//$data['task']= $this->task_model->get_task($id['id_team'],$id['id_role']);


			$data['user'] = $this->task_model->get_all_user();
		
			//var_dump($data['activity_list']);
			$data['page_title'] = 'Task';
			$data['css_arr'] = array(
				'fuelux.css',
				'select2.css',
				'datepicker.css',
				'rab.css',
				'fileinput.css',
				'dropzone.css',
				'jquery-ui-autocomplete.css','datatables.css'
			);
			$data['js_arr'] = array(
				'parsley/parsley.min.js',
				'parsley/parsley.extend.js',
				'select2/select2.min.js',
				'datepicker/bootstrap-datepicker.js',
				'fileinput.min.js',
				'dropzone.min.js',
				'jquery-ui-autocomplete.js','datatables/jquery.dataTables.min.js'
			);
			$this->load->view('list_report_excel', $data);
				
	}

	function paraf_akhir(){
		$data['tanggal'] = $this->task_model->get_tanggal_kabag();
		//var_dump($data['tanggal']);
		$data['page_title'] = 'Approval';
		$data['css_arr'] = array('datatables.css');
		$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
		$this->load->view('template/header', $data);
		$this->load->view('form_paraf_akhir', $data);
		$this->load->view('template/footer');
		
	}
	
	function isi_paraf_akhir(){
		$hasil = $this->task_model->get_data_parafakhir($this->input->get('tgl'));
		echo json_encode($hasil);
	}
	
	function notif(){
		$id = $this->session->userdata('user_data');
		$paraf = $this->task_model->get_paraf_spv($id['id_user']);
		$paraf1 = $this->task_model->get_paraf1_spv($id['id_user']);
		$notif = count($paraf)-count($paraf1);
		echo json_encode($notif);
	}
	
	function approve(){
		$id = $this->session->userdata('user_data');
		$this->task_model->approve($this->input->get('tanggal'),date('H:i:s'),$id['id_user']);
		$hasil_approve = $this->task_model->get_approve($this->input->get('tanggal'));
		var_dump($hasil_approve);
		foreach($hasil_approve as $hasil){
			$this->task_model->insert_task_history($hasil['id_act'],$hasil['id_user'],$hasil['id_task_list'],$hasil['jam'],$hasil['tanggal'],$hasil['pelaksanaan'],$hasil['keterangan'],$hasil['last_modified'],$hasil['id_paraf_pic'],$hasil['paraf_pic'],$hasil['time_paraf_pic'],$hasil['id_paraf_supervisor'],$hasil['paraf_supervisor'],$hasil['time_paraf_supervisor'],$hasil['id_paraf_wa_kabag'],$hasil['paraf_wa_kabag'],$hasil['time_paraf_wa_kabag'],$hasil['assigner'],$hasil['aktifitas']);
		}
		$this->task_model->delete_activity_bydate($this->input->get('tanggal'));

			//redirect(site_url()."/task/paraf_kabag");
		echo json_encode($id);
	}



	function refresh_task_activity($id_act)
        {
			$this->task_model->reset_task($id_act);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/task/paraf_spv_bri");
        }
	function hapus_task($id_task)
        {
			$this->task_model->hapus_task($id_task);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/task");
        }


    function camera(){
    	$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');

		
		$img = "./images/activity/".$id['id_user'];
		//var_dump($img);
		if (file_exists($img.".jpg")) {
        	unlink($img.".jpg");
    	}
    	if (file_exists($img.".png")) {
        	unlink($img.".png");
    	}
    	if (file_exists($img.".gif")) {
        	unlink($img.".gif");
    	}
		$config['upload_path']          = './images/activity/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 7224;
		$config['max_height']           = 4268;
		$config['file_name']            = $this->input->post('id_act_form_camera');
 
		$this->load->library('upload', $config);


		if ( ! $this->upload->do_upload('camera')){
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];
			$this->task_model->update_pelaksanaan_activity_by_img(1,$this->input->post('id_act_form_camera'),"-",$id['id_user'],$time,$file_name);
	        //$this->task_model->update_data_detail_photos($id['id_user'],$file_name);
			//$this->load->view('v_upload_sukses', $data);
		}

			redirect(site_url()."/task/activity");
 
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */