<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Harian_OPERATOR extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('harian_operator_model');
		$this->load->model('task_model');
		$this->load->model('user_model');
    }
	
	public function index()
	{
			
		redirect(site_url()."/harian_operator/getDataListHarianOPERATOR");
	}
	

	function getDataListHarianOPERATOR(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');
		$data['harian_operator']= $this->harian_operator_model->get_all_harian_operator();
		$data['user'] = $this->task_model->get_all_user();

		$data['tanggal'] = $this->harian_operator_model->get_tanggal_harian_operator();
		
			//var_dump($data['harian_operator']);
			$data['page_title'] = 'Daftar Harian OPERATOR';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_harian_operator', $data);
			$this->load->view('template/footer');
				
	}


	function signHarianOPERATOR(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');

		$tanggal = $this->input->post('tanggal');
		$shift = $this->input->post('shift');

		$data['user'] = $this->task_model->get_all_user();

		$data['harian_operator']= $this->harian_operator_model->get_harian_operator_by_shift_date($tanggal,$shift);
		$data['tanggalselect'] = $tanggal;
		$data['shiftselect'] = $shift;
		
		$data['tanggal'] = $this->harian_operator_model->get_tanggal_harian_operator();
		if ($id['id_role'] == "1" ||$id['id_role'] == "2" ){
			$data['tanggal'] = $this->harian_operator_model->get_tanggal_harian_operator_final_approve();
		}
		$dataIdPelapor= $this->harian_operator_model->get_penyerah_harian_operator_by_shift_date($tanggal,$shift);
		$dataIdPenerima= $this->harian_operator_model->get_penerima_harian_operator_by_shift_date($tanggal,$shift);
		$dataIdMengetahui= $this->harian_operator_model->get_mengetahui_harian_operator_by_shift_date($tanggal,$shift);


		$data['penyerah']= array();
		$data['penerima']= array();
		$data['mengetahui']= array();
		foreach($dataIdPelapor as $dataIdPelapor){
				
						$id_pelapor = explode(",",$dataIdPelapor['id_pelapor']);
						$id_pelaporx = preg_replace('/\s+/', '', $id_pelapor);
						
						foreach($id_pelaporx as $id_pelapors){
							if ((strlen($id_pelapors) > 0)){
							$user = $this->user_model->get($id_pelapors);
							array_push($data['penyerah'],$user);
							}	
						}					
		}


		foreach($dataIdPenerima as $dataIdPenerima){
				
						if (isset($dataIdPenerima['receiv'])) {
							$id_penerima = explode(",",$dataIdPenerima['receiv']);
							$id_penerimax = preg_replace('/\s+/', '', $id_penerima);

								
							foreach($id_penerimax as $id_penerimas){
								if ((strlen($id_penerimas) > 0)){
								$user = $this->user_model->get($id_penerimas);
									array_push($data['penerima'],$user);
								}	
							}
						}
				
		}

		foreach($dataIdMengetahui as $dataIdMengetahui){
				
						if (isset($dataIdMengetahui['appfinal'])) {
							$id_mengetahui = explode(",",$dataIdMengetahui['appfinal']);
							$id_mengetahuix = preg_replace('/\s+/', '', $id_mengetahui);
								
							foreach($id_mengetahuix as $id_mengetahuis){
								if ((strlen($id_mengetahuis) > 0)){
								$user = $this->user_model->get($id_mengetahuis);
									array_push($data['mengetahui'],$user);
								}	
							}
						}
				
		}

		//var_dump($data['penyerah']);

			$data['page_title'] = 'Daftar Sign Harian OPERATOR';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_sign_harian_operator', $data);
			$this->load->view('template/footer');
				
	}

	function signOperatorHarianOPERATOR(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');

		$tanggal = $this->input->post('tanggal');
		$shift = $this->input->post('shift');
		$operator1 ="";
		foreach($this->input->post('operator_assign') as $operator){
				$operator1 .= $operator.',';
		}

		$data['harian_operator']= $this->harian_operator_model->get_harian_operator_by_shift_date($tanggal,$shift);


		foreach($data['harian_operator'] as $harian_operator){
			$id_harian_operator = $harian_operator['id_harian_operator'];
	    	$this->harian_operator_model->update_data_assign_operator($id_harian_operator,$operator1);	
		}

	    //$alerts[] = array('message', 'Data berhasil disimpan!');

		$data['user'] = $this->task_model->get_all_user();

		
		$data['tanggalselect'] = $tanggal;
		$data['shiftselect'] = $shift;
		$data['tanggal'] = $this->harian_operator_model->get_tanggal_harian_operator();
		if ($id['id_role'] == "1" ||$id['id_role'] == "2" ){
			$data['tanggal'] = $this->harian_operator_model->get_tanggal_harian_operator_final_approve();
		}

		$dataIdPelapor= $this->harian_operator_model->get_penyerah_harian_operator_by_shift_date($tanggal,$shift);
		$dataIdPenerima= $this->harian_operator_model->get_penerima_harian_operator_by_shift_date($tanggal,$shift);
		$dataIdMengetahui= $this->harian_operator_model->get_mengetahui_harian_operator_by_shift_date($tanggal,$shift);



		$data['penyerah']= array();
		$data['penerima']= array();
		$data['mengetahui']= array();
		foreach($dataIdPelapor as $dataIdPelapor){
				
						$id_pelapor = explode(",",$dataIdPelapor['id_pelapor']);
						$id_pelaporx = preg_replace('/\s+/', '', $id_pelapor);

						
						foreach($id_pelaporx as $id_pelapors){
							if ((strlen($id_pelapors) > 0)){
							$user = $this->user_model->get($id_pelapors);
							array_push($data['penyerah'],$user);
							}	
						}
				
		}

		foreach($dataIdPenerima as $dataIdPenerima){
				
						if (isset($dataIdPenerima['receiv'])) {
							$id_penerima = explode(",",$dataIdPenerima['receiv']);
							$id_penerimax = preg_replace('/\s+/', '', $id_penerima);

								
							foreach($id_penerimax as $id_penerimas){
								if ((strlen($id_penerimas) > 0)){
								$user = $this->user_model->get($id_penerimas);
									array_push($data['penerima'],$user);
								}	
							}
						}
				
		}

		foreach($dataIdMengetahui as $dataIdMengetahui){
				
						if (isset($dataIdMengetahui['appfinal'])) {
							$id_mengetahui = explode(",",$dataIdMengetahui['appfinal']);
							$id_mengetahuix = preg_replace('/\s+/', '', $id_mengetahui);
								
							foreach($id_mengetahuix as $id_mengetahuis){
								if ((strlen($id_mengetahuis) > 0)){
								$user = $this->user_model->get($id_mengetahuis);
									array_push($data['mengetahui'],$user);
								}	
							}
						}
				
		}




		
		//var_dump($data['penyerah']);

			$data['page_title'] = 'Daftar Sign Harian OPERATOR';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_sign_harian_operator', $data);
			$this->load->view('template/footer');
				
	}

	function signAppFinalHarianOPERATOR(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');

		$tanggal = $this->input->post('tanggal');
		$shift = $this->input->post('shift');
		$final1 ="";
		foreach($this->input->post('final_assign') as $final){
				$final1 .= $final.',';
		}

		$data['harian_operator']= $this->harian_operator_model->get_harian_operator_by_shift_date($tanggal,$shift);


		foreach($data['harian_operator'] as $harian_operator){
			$id_harian_operator = $harian_operator['id_harian_operator'];
	    	$this->harian_operator_model->update_data_assign_final($id_harian_operator,$final1);	
		}

	    //$alerts[] = array('message', 'Data berhasil disimpan!');

		$data['user'] = $this->task_model->get_all_user();

		
		$data['tanggalselect'] = $tanggal;
		$data['shiftselect'] = $shift;
		$data['tanggal'] = $this->harian_operator_model->get_tanggal_harian_operator();
		if ($id['id_role'] == "1" ||$id['id_role'] == "2" ){
			$data['tanggal'] = $this->harian_operator_model->get_tanggal_harian_operator_final_approve();
		}


		$dataIdPelapor= $this->harian_operator_model->get_penyerah_harian_operator_by_shift_date($tanggal,$shift);
		$dataIdPenerima= $this->harian_operator_model->get_penerima_harian_operator_by_shift_date($tanggal,$shift);
		$dataIdMengetahui= $this->harian_operator_model->get_mengetahui_harian_operator_by_shift_date($tanggal,$shift);



		$data['penyerah']= array();
		$data['penerima']= array();
		$data['mengetahui']= array();
		foreach($dataIdPelapor as $dataIdPelapor){
				
						$id_pelapor = explode(",",$dataIdPelapor['id_pelapor']);
						$id_pelaporx = preg_replace('/\s+/', '', $id_pelapor);

						
						foreach($id_pelaporx as $id_pelapors){
							if ((strlen($id_pelapors) > 0)){
							$user = $this->user_model->get($id_pelapors);
							array_push($data['penyerah'],$user);
							}	
						}
				
		}

		foreach($dataIdPenerima as $dataIdPenerima){
				
						if (isset($dataIdPenerima['receiv'])) {
							$id_penerima = explode(",",$dataIdPenerima['receiv']);
							$id_penerimax = preg_replace('/\s+/', '', $id_penerima);

								
							foreach($id_penerimax as $id_penerimas){
								if ((strlen($id_penerimas) > 0)){
								$user = $this->user_model->get($id_penerimas);
									array_push($data['penerima'],$user);
								}	
							}
						}
				
		}

		foreach($dataIdMengetahui as $dataIdMengetahui){
				
						if (isset($dataIdMengetahui['appfinal'])) {
							$id_mengetahui = explode(",",$dataIdMengetahui['appfinal']);
							$id_mengetahuix = preg_replace('/\s+/', '', $id_mengetahui);
								
							foreach($id_mengetahuix as $id_mengetahuis){
								if ((strlen($id_mengetahuis) > 0)){
								$user = $this->user_model->get($id_mengetahuis);
									array_push($data['mengetahui'],$user);
								}	
							}
						}
				
		}



		
		//var_dump($data['penyerah']);

			$data['page_title'] = 'Daftar Sign Harian OPERATOR';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_sign_harian_operator', $data);
			$this->load->view('template/footer');
				
	}


	function tambah_harian_operator()
	{

		$id = $this->session->userdata('user_data');

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
		$this->ckeditor->config['height'] = '200px';   
		$this->ckeditor->config['skin'] = 'office2013';         

		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
		
		$data['page_title'] = 'Form Tambah Harian OPERATOR';
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
			$data['harian_operator'] = $this->harian_operator_model->get_all_harian_operator();
			$data['user'] = $this->task_model->get_all_user();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_harian_operator', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_harian_operator($id_harian_operator)
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
	        $data['page_title'] = 'Form edit Harian OPERATOR';
	        $this->load->model('harian_operator_model');

	        $data['query']=  $this->harian_operator_model->get($id_harian_operator);
			$data['user'] = $this->task_model->get_all_user();
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_harian_operator', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
			
			$id = $this->session->userdata('user_data');
	        $this->load->model('harian_operator_model');
	        foreach($this->input->post('operator') as $operator){
				$operator1 .= $operator.',';
			}
	        $this->harian_operator_model->simpan_data($id['id_user'],$operator1);
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/harian_operator");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		

			$id = $this->session->userdata('user_data');
	        $this->load->model('harian_operator_model');
	        foreach($this->input->post('operator') as $operator){
				$operator1 .= $operator.',';
			}
	        $this->harian_operator_model->update_data($id['id_user'],$operator1);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/harian_operator");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_harian_operator)
        {
			$this->harian_operator_model->hapus($id_harian_operator);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/harian_operator");
        }
		
		
}

