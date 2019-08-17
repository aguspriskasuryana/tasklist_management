<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mutasi_harian_hk extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('mutasi_harian_hk_model');
		$this->load->model('task_model');
		$this->load->model('user_model');
    }
	
	public function index()
	{
			
		redirect(site_url()."/mutasi_harian_hk/getDataListMutasi_harian_hk");
	}
	

	function getDataListMutasi_harian_hk(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');
		$data['mutasi_harian_hk']= $this->mutasi_harian_hk_model->get_all_mutasi_harian_hk();
		$data['user'] = $this->task_model->get_all_user();
		$data['sub_team'] = $this->mutasi_harian_hk_model->get_all_sub_team();
		$data['tanggal'] = $this->mutasi_harian_hk_model->get_tanggal_mutasi_harian_hk();
		
			//var_dump($data['mutasi_harian_hk']);
			$data['page_title'] = 'Daftar Harian SPV';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_mutasi_harian_hk', $data);
			$this->load->view('template/footer');
				
	}


	function signMutasi_harian_hk(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');

		$tanggal = $this->input->post('tanggal');
		$shift = $this->input->post('shift');

		$data['user'] = $this->task_model->get_all_user();
		$data['sub_team'] = $this->mutasi_harian_hk_model->get_all_sub_team();

		$data['mutasi_harian_hk']= $this->mutasi_harian_hk_model->get_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$data['tanggalselect'] = $tanggal;
		$data['shiftselect'] = $shift;
		
		$data['tanggal'] = $this->mutasi_harian_hk_model->get_tanggal_mutasi_harian_hk();
		if ($id['id_role'] == "1" ||$id['id_role'] == "2" ){
			$data['tanggal'] = $this->mutasi_harian_hk_model->get_tanggal_mutasi_harian_hk_final_approve();
		}
		$dataIdPersonal= $this->mutasi_harian_hk_model->get_personal_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$dataIdKoordinator_bks= $this->mutasi_harian_hk_model->get_koordinator_bks_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$dataIdSupervisor_bks= $this->mutasi_harian_hk_model->get_supervisor_bks_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$dataIdSupervisor_bri= $this->mutasi_harian_hk_model->get_supervisor_bri_mutasi_harian_hk_by_shift_date($tanggal,$shift);

		
		$data['personal']= array();
		$data['koordinator_bks']= array();
		$data['supervisor_bks']= array();
		$data['supervisor_bri']= array();
		foreach($dataIdPersonal as $dataIdPersonal){
				
						$id_personal = explode(",",$dataIdPersonal['indeks_tamu']);
						$id_personalx = preg_replace('/\s+/', '', $id_personal);
						
						foreach($id_personalx as $id_personals){
							if ((strlen($id_personals) > 0)){
							$user = $this->user_model->get($id_personals);
							array_push($data['personal'],$user);
							}	
						}			

							
		}

		foreach($dataIdKoordinator_bks as $dataIdKoordinator_bks){
				
						if (isset($dataIdKoordinator_bks['app_id_koordinator'])) {
							$id_koordinator_bks = explode(",",$dataIdKoordinator_bks['app_id_koordinator']);
							$id_koordinator_bksx = preg_replace('/\s+/', '', $id_koordinator_bks);

								var_dump($id_koordinator_bksx);
							foreach($id_koordinator_bksx as $id_koordinator_bkss){
								if ((strlen($id_koordinator_bkss) > 0)){
									
								$user = $this->user_model->get($id_koordinator_bkss);
									array_push($data['koordinator_bks'],$user);
								}	
							}
						}
				
		}


		foreach($dataIdSupervisor_bks as $dataIdSupervisor_bks){
				
						if (isset($dataIdSupervisor_bks['app_id_supervisor_bks'])) {
							$id_supervisor_bks = explode(",",$dataIdSupervisor_bks['app_id_supervisor_bks']);
							$id_supervisor_bksx = preg_replace('/\s+/', '', $id_supervisor_bks);

								
							foreach($id_supervisor_bksx as $id_supervisor_bkss){
								if ((strlen($id_supervisor_bkss) > 0)){
								$user = $this->user_model->get($id_supervisor_bkss);
									array_push($data['supervisor_bks'],$user);
								}	
							}
						}
				
		}

		foreach($dataIdSupervisor_bri as $dataIdSupervisor_bri){
				
						if (isset($dataIdSupervisor_bri['app_id_supervisor_bri'])) {
							$id_supervisor_bri = explode(",",$dataIdSupervisor_bri['app_id_supervisor_bri']);
							$id_supervisor_brix = preg_replace('/\s+/', '', $id_supervisor_bri);
								
							foreach($id_supervisor_brix as $id_supervisor_bris){
								if ((strlen($id_supervisor_bris) > 0)){
								$user = $this->user_model->get($id_supervisor_bris);
									array_push($data['supervisor_bri'],$user);
								}	
							}
						}
				
		}

		//var_dump($data['personal']);

			$data['page_title'] = 'Daftar Sign Harian HK';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_sign_mutasi_harian_hk', $data);
			$this->load->view('template/footer');
				
	}

	function signKoordinatorBKSMutasi_harian_hk(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');

		$tanggal = $this->input->post('tanggal');
		$shift = $this->input->post('shift');
		$koor1 ="";
		foreach($this->input->post('koordinator_bks_assign') as $koor){
				$koor1 .= $koor.',';
		}

		$data['mutasi_harian_hk']= $this->mutasi_harian_hk_model->get_mutasi_harian_hk_by_shift_date($tanggal,$shift);


		foreach($data['mutasi_harian_hk'] as $mutasi_harian_hk){
			$id_mutasi_harian_hk = $mutasi_harian_hk['id_mutasi_harian_hk'];
	    	$this->mutasi_harian_hk_model->update_data_assign_koordinator($id_mutasi_harian_hk,$koor1);	
		}

	    $alerts[] = array('message', 'Data berhasil disimpan!');

		$data['user'] = $this->task_model->get_all_user();
		$data['sub_team'] = $this->mutasi_harian_hk_model->get_all_sub_team();

		
		$data['tanggalselect'] = $tanggal;
		$data['shiftselect'] = $shift;
		$data['tanggal'] = $this->mutasi_harian_hk_model->get_tanggal_mutasi_harian_hk();
		$dataIdPersonal= $this->mutasi_harian_hk_model->get_personal_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$dataIdKoordinator_bks= $this->mutasi_harian_hk_model->get_koordinator_bks_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$dataIdSupervisor_bks= $this->mutasi_harian_hk_model->get_supervisor_bks_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$dataIdSupervisor_bri= $this->mutasi_harian_hk_model->get_supervisor_bri_mutasi_harian_hk_by_shift_date($tanggal,$shift);



		$data['personal']= array();
		$data['koordinator_bks']= array();
		$data['supervisor_bks']= array();
		$data['supervisor_bri']= array();
		foreach($dataIdPersonal as $dataIdPersonal){
				
						$id_personal = explode(",",$dataIdPersonal['indeks_tamu']);
						$id_personalx = preg_replace('/\s+/', '', $id_personal);

						
						foreach($id_personalx as $id_personals){
							if ((strlen($id_personals) > 0)){
							$user = $this->user_model->get($id_personals);
							array_push($data['personal'],$user);
							}	
						}
				
		}

		foreach($dataIdKoordinator_bks as $dataIdKoordinator_bks){
				
						if (isset($dataIdKoordinator_bks['app_id_koordinator'])) {
							$id_koordinator_bks = explode(",",$dataIdKoordinator_bks['app_id_koordinator']);
							$id_koordinator_bksx = preg_replace('/\s+/', '', $id_koordinator_bks);

								
							foreach($id_koordinator_bksx as $id_koordinator_bkss){
								if ((strlen($id_koordinator_bkss) > 0)){
								$user = $this->user_model->get($id_koordinator_bkss);
									array_push($data['koordinator_bks'],$user);
								}	
							}
						}
				
		}

		foreach($dataIdSupervisor_bks as $dataIdSupervisor_bks){
				
						if (isset($dataIdSupervisor_bks['app_id_supervisor_bks'])) {
							$id_supervisor_bks = explode(",",$dataIdSupervisor_bks['app_id_supervisor_bks']);
							$id_supervisor_bksx = preg_replace('/\s+/', '', $id_supervisor_bks);

								
							foreach($id_supervisor_bksx as $id_supervisor_bkss){
								if ((strlen($id_supervisor_bkss) > 0)){
								$user = $this->user_model->get($id_supervisor_bkss);
									array_push($data['supervisor_bks'],$user);
								}	
							}
						}
				
		}

		foreach($dataIdSupervisor_bri as $dataIdSupervisor_bri){
				
						if (isset($dataIdSupervisor_bri['app_id_supervisor_bri'])) {
							$id_supervisor_bri = explode(",",$dataIdSupervisor_bri['app_id_supervisor_bri']);
							$id_supervisor_brix = preg_replace('/\s+/', '', $id_supervisor_bri);
								
							foreach($id_supervisor_brix as $id_supervisor_bris){
								if ((strlen($id_supervisor_bris) > 0)){
								$user = $this->user_model->get($id_supervisor_bris);
									array_push($data['supervisor_bri'],$user);
								}	
							}
						}
				
		}




		
		//var_dump($data['personal']);

			$data['page_title'] = 'Daftar Sign Harian HK';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_sign_mutasi_harian_hk', $data);
			$this->load->view('template/footer');
				
	}

	function signSupervisorBKSMutasi_harian_hk(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');

		$tanggal = $this->input->post('tanggal');
		$shift = $this->input->post('shift');
		$spv1 ="";
		foreach($this->input->post('spv_bks_assign') as $spv){
				$spv1 .= $spv.',';
		}

		$data['mutasi_harian_hk']= $this->mutasi_harian_hk_model->get_mutasi_harian_hk_by_shift_date($tanggal,$shift);


		foreach($data['mutasi_harian_hk'] as $mutasi_harian_hk){
			$id_mutasi_harian_hk = $mutasi_harian_hk['id_mutasi_harian_hk'];
	    	$this->mutasi_harian_hk_model->update_data_assign_supervisor_bks($id_mutasi_harian_hk,$spv1);	
		}

	    //$alerts[] = array('message', 'Data berhasil disimpan!');

		$data['user'] = $this->task_model->get_all_user();
		$data['sub_team'] = $this->mutasi_harian_hk_model->get_all_sub_team();

		
		$data['tanggalselect'] = $tanggal;
		$data['shiftselect'] = $shift;
		$data['tanggal'] = $this->mutasi_harian_hk_model->get_tanggal_mutasi_harian_hk();
		$dataIdPersonal= $this->mutasi_harian_hk_model->get_personal_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$dataIdKoordinator_bks= $this->mutasi_harian_hk_model->get_koordinator_bks_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$dataIdSupervisor_bks= $this->mutasi_harian_hk_model->get_supervisor_bks_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$dataIdSupervisor_bri= $this->mutasi_harian_hk_model->get_supervisor_bri_mutasi_harian_hk_by_shift_date($tanggal,$shift);



		$data['personal']= array();
		$data['koordinator_bks']= array();
		$data['supervisor_bks']= array();
		$data['supervisor_bri']= array();
		foreach($dataIdPersonal as $dataIdPersonal){
				
						$id_personal = explode(",",$dataIdPersonal['indeks_tamu']);
						$id_personalx = preg_replace('/\s+/', '', $id_personal);

						
						foreach($id_personalx as $id_personals){
							if ((strlen($id_personals) > 0)){
							$user = $this->user_model->get($id_personals);
							array_push($data['personal'],$user);
							}	
						}
				
		}

		foreach($dataIdKoordinator_bks as $dataIdKoordinator_bks){
				
						if (isset($dataIdKoordinator_bks['app_id_koordinator'])) {
							$id_koordinator_bks = explode(",",$dataIdKoordinator_bks['app_id_koordinator']);
							$id_koordinator_bksx = preg_replace('/\s+/', '', $id_koordinator_bks);

								
							foreach($id_koordinator_bksx as $id_koordinator_bkss){
								if ((strlen($id_koordinator_bkss) > 0)){
								$user = $this->user_model->get($id_koordinator_bkss);
									array_push($data['koordinator_bks'],$user);
								}	
							}
						}
				
		}

		foreach($dataIdSupervisor_bks as $dataIdSupervisor_bks){
				
						if (isset($dataIdSupervisor_bks['app_id_supervisor_bks'])) {
							$id_supervisor_bks = explode(",",$dataIdSupervisor_bks['app_id_supervisor_bks']);
							$id_supervisor_bksx = preg_replace('/\s+/', '', $id_supervisor_bks);

								
							foreach($id_supervisor_bksx as $id_supervisor_bkss){
								if ((strlen($id_supervisor_bkss) > 0)){
								$user = $this->user_model->get($id_supervisor_bkss);
									array_push($data['supervisor_bks'],$user);
								}	
							}
						}
				
		}

		foreach($dataIdSupervisor_bri as $dataIdSupervisor_bri){
				
						if (isset($dataIdSupervisor_bri['app_id_supervisor_bri'])) {
							$id_supervisor_bri = explode(",",$dataIdSupervisor_bri['app_id_supervisor_bri']);
							$id_supervisor_brix = preg_replace('/\s+/', '', $id_supervisor_bri);
								
							foreach($id_supervisor_brix as $id_supervisor_bris){
								if ((strlen($id_supervisor_bris) > 0)){
								$user = $this->user_model->get($id_supervisor_bris);
									array_push($data['supervisor_bri'],$user);
								}	
							}
						}
				
		}




		
		//var_dump($data['personal']);

			$data['page_title'] = 'Daftar Sign Harian HK';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_sign_mutasi_harian_hk', $data);
			$this->load->view('template/footer');
				
	}

	function signSupervisorBRIMutasi_harian_hk(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');

		$tanggal = $this->input->post('tanggal');
		$shift = $this->input->post('shift');
		$final1 ="";
		foreach($this->input->post('final_assign') as $final){
				$final1 .= $final.',';
		}

		$data['mutasi_harian_hk']= $this->mutasi_harian_hk_model->get_mutasi_harian_hk_by_shift_date($tanggal,$shift);


		foreach($data['mutasi_harian_hk'] as $mutasi_harian_hk){
			$id_mutasi_harian_hk = $mutasi_harian_hk['id_mutasi_harian_hk'];
	    	$this->mutasi_harian_hk_model->update_data_assign_supervisor_bri($id_mutasi_harian_hk,$final1);	
		}

	    //$alerts[] = array('message', 'Data berhasil disimpan!');

		$data['user'] = $this->task_model->get_all_user();
		$data['sub_team'] = $this->mutasi_harian_hk_model->get_all_sub_team();

		
		$data['tanggalselect'] = $tanggal;
		$data['shiftselect'] = $shift;
		$data['tanggal'] = $this->mutasi_harian_hk_model->get_tanggal_mutasi_harian_hk();
		$dataIdPersonal= $this->mutasi_harian_hk_model->get_personal_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$dataIdSupervisor_bks= $this->mutasi_harian_hk_model->get_supervisor_bks_mutasi_harian_hk_by_shift_date($tanggal,$shift);
		$dataIdSupervisor_bri= $this->mutasi_harian_hk_model->get_supervisor_bri_mutasi_harian_hk_by_shift_date($tanggal,$shift);



		$data['personal']= array();
		$data['supervisor_bks']= array();
		$data['supervisor_bri']= array();
		foreach($dataIdPersonal as $dataIdPersonal){
				
						$id_personal = explode(",",$dataIdPersonal['indeks_tamu']);
						$id_personalx = preg_replace('/\s+/', '', $id_personal);

						
						foreach($id_personalx as $id_personals){
							if ((strlen($id_personals) > 0)){
							$user = $this->user_model->get($id_personals);
							array_push($data['personal'],$user);
							}	
						}
				
		}

		foreach($dataIdSupervisor_bks as $dataIdSupervisor_bks){
				
						if (isset($dataIdSupervisor_bks['app_id_supervisor_bks'])) {
							$id_supervisor_bks = explode(",",$dataIdSupervisor_bks['app_id_supervisor_bks']);
							$id_supervisor_bksx = preg_replace('/\s+/', '', $id_supervisor_bks);

								
							foreach($id_supervisor_bksx as $id_supervisor_bkss){
								if ((strlen($id_supervisor_bkss) > 0)){
								$user = $this->user_model->get($id_supervisor_bkss);
									array_push($data['supervisor_bks'],$user);
								}	
							}
						}
				
		}

		foreach($dataIdSupervisor_bri as $dataIdSupervisor_bri){
				
						if (isset($dataIdSupervisor_bri['app_id_supervisor_bri'])) {
							$id_supervisor_bri = explode(",",$dataIdSupervisor_bri['app_id_supervisor_bri']);
							$id_supervisor_brix = preg_replace('/\s+/', '', $id_supervisor_bri);
								
							foreach($id_supervisor_brix as $id_supervisor_bris){
								if ((strlen($id_supervisor_bris) > 0)){
								$user = $this->user_model->get($id_supervisor_bris);
									array_push($data['supervisor_bri'],$user);
								}	
							}
						}
				
		}



		
		//var_dump($data['personal']);

			$data['page_title'] = 'Daftar Sign Harian SPV';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_sign_mutasi_harian_hk', $data);
			$this->load->view('template/footer');
				
	}


	function tambah_mutasi_harian_hk()
	{

		$id = $this->session->userdata('user_data');

		$this->load->library('ckeditor');
		$this->load->library('ckfinder');



		$this->ckeditor->basePath = base_url().'asset/ckeditor/';
		$this->ckeditor->config['language'] = 'us';
		$this->ckeditor->config['width'] = '900px';
		$this->ckeditor->config['height'] = '200px';   
		$this->ckeditor->config['skin'] = 'office2013';         

		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
		
		$data['page_title'] = 'Form Tambah Harian SPV';
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
		//if(!$this->input->post()) {
			$data['mutasi_harian_hk'] = $this->mutasi_harian_hk_model->get_all_mutasi_harian_hk();
			$data['user'] = $this->task_model->get_all_user();
			$data['sub_team'] = $this->mutasi_harian_hk_model->get_all_sub_team();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_mutasi_harian_hk', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_mutasi_harian_hk($id_mutasi_harian_hk)
	    {
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');



		$this->ckeditor->basePath = base_url().'asset/ckeditor/';
		/*$this->ckeditor->config['toolbar'] = 
		array(
		        array( 'Source','-','Save','NewPage','Preview','-','Templates' ),
		        array( 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt' ),
		        array( 'Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat' ),
		        array( 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ),
		        array( 'Bold','Italic','Underline','Strike','-','Subscript','Superscript' ),
		        array( 'NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv' ),
		        array( 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ),
		        array( 'BidiLtr', 'BidiRtl' ),
		        array( 'Link','Unlink','Anchor' ),
		        array( 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ),'/',
		        array( 'Styles','Format','Font','FontSize' ),
		        array( 'TextColor','BGColor' ),
		        array( 'Maximize', 'ShowBlocks','-','About' )
		); */


		$this->ckeditor->config['language'] = 'us';
		$this->ckeditor->config['width'] = '900px';
		$this->ckeditor->config['height'] = '350px';   
		$this->ckeditor->config['skin'] = 'office2013';         

		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
	        $data['page_title'] = 'Form edit Harian SPV';
	        $this->load->model('mutasi_harian_hk_model');


			$data['sub_team'] = $this->mutasi_harian_hk_model->get_all_sub_team();

	        $data['query']=  $this->mutasi_harian_hk_model->get($id_mutasi_harian_hk);
			$data['user'] = $this->task_model->get_all_user();
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_mutasi_harian_hk', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
			
			$id = $this->session->userdata('user_data');
	        $this->load->model('mutasi_harian_hk_model');
	        foreach($this->input->post('users') as $users){
				$user1 .= $users.',';
			}
			foreach($this->input->post('id_sub_team') as $subteams){
				$subteam .= $subteams.',';
			}
	        $this->mutasi_harian_hk_model->simpan_data($id['id_user'],$user1, $subteam);
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/mutasi_harian_hk");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		

			$id = $this->session->userdata('user_data');
	        $this->load->model('mutasi_harian_hk_model');
	        foreach($this->input->post('users') as $users){
				$user1 .= $users.',';
			}
			foreach($this->input->post('id_sub_team') as $subteams){
				$subteam .= $subteams.',';
			}
	        $this->mutasi_harian_hk_model->update_data($id['id_user'],$user1, $subteam);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/mutasi_harian_hk");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_mutasi_harian_hk)
        {
        	var_dump($id_mutasi_harian_hk);
			$this->mutasi_harian_hk_model->hapus($id_mutasi_harian_hk);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/mutasi_harian_hk");
        }
		
		
}

