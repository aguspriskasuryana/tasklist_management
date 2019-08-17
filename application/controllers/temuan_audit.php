<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temuan_audit extends CI_Controller {

	public function __construct()
    {
        parent::__construct();


		$this->load->helper(array('form', 'url'));
		
		$this->load->library('csrf');
		$this->load->model('temuan_audit_model');
    }
	
	public function index()
	{
			redirect(site_url()."/temuan_audit/get_list_temuan_audit");
	}


	


	public function get_list_temuan_audit(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['temuan_audit']= $this->temuan_audit_model->get_all_temuan_audit();
		$data['tanggal'] = date("Y-m-d");
		
			$data['page_title'] = 'Daftar';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_temuan_audit', $data);
			$this->load->view('template/footer');
				
	}

	public function get_list_temuan_audit_excel(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['temuan_audit']= $this->temuan_audit_model->get_all_temuan_audit();
		$data['tanggal'] = date("Y-m-d");
		
			//$data['page_title'] = 'Daftar';
			//$data['css_arr'] = array('datatables.css');
			//$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('list_temuan_audit_excel', $data);
			//$this->load->view('template/footer');
				
	}



	function tambah_temuan_audit()
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
		$this->ckeditor->config['height'] = '250px';   
		$this->ckeditor->config['skin'] = 'office2013';         

		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
		
		$data['page_title'] = 'Form Tambah Temuan Audit';
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
			$data['temuan_audit'] = $this->temuan_audit_model->get_all_temuan_audit();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_temuan_audit', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_temuan_audit($id_temuan_audit)
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
		$this->ckeditor->config['height'] = '250px';   
		$this->ckeditor->config['skin'] = 'office2013';         

		$data['page_title'] = 'Form Edit Temuan Audit';
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

		//Add Ckfinder to Ckeditor
			$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
	        $data['page_title'] = 'Form edit Temuan Audit';
	        $this->load->model('temuan_audit_model');

			$data['tlm'] = $this->temuan_audit_model->get_all_tlm($id_temuan_audit);

	        $data['query']=$this->temuan_audit_model->get($id_temuan_audit);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_temuan_audit', $data);
	        $this->load->view('template/footer');
		
	    }


	    function tambah_data_tlm()
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
		$this->ckeditor->config['height'] = '250px';   
		$this->ckeditor->config['skin'] = 'office2013';         

		$data['page_title'] = 'Form Edit Temuan Audit';
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

		//Add Ckfinder to Ckeditor
			$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
	        $data['page_title'] = 'Form edit Temuan Audit';
	        $this->load->model('temuan_audit_model');

			$id = $this->session->userdata('user_data');
	        $this->temuan_audit_model->simpan_data_tlm($id['id_user']);
	        $id_temuan_audit = $this->input->post('id_temuan_audit_modal');
	        $data['tlm'] = $this->temuan_audit_model->get_all_tlm($id_temuan_audit);
	        $data['query'] = $this->temuan_audit_model->get($id_temuan_audit);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_temuan_audit', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
			
			$id = $this->session->userdata('user_data');
	        $this->load->model('temuan_audit_model');
	        $this->temuan_audit_model->simpan_data($id['id_user']);
	        $list_id_temuan_audit = $this->temuan_audit_model->get_maxid();

	        $id_temuan_audit ="";
	        if ($list_id_temuan_audit){
		        foreach($list_id_temuan_audit as $list){
		        	$id_temuan_audit = $list['id_temuan_audit'];
		        }
		    }

				var_dump($id_temuan_audit);

	        $img = "./file/".$id_temuan_audit;
			//var_dump($img);
			if (file_exists($img."")) {
	        	unlink($img."");
	    	}
			$config['upload_path']          = './file/';
			$config['allowed_types']        = '*';
			$config['max_size']             = 10000;
			$config['max_width']            = 7224;
			$config['max_height']           = 4268;
			$config['file_name']            = $id_temuan_audit;
	 
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('file')){

				var_dump( array('error' => $this->upload->display_errors()));
				$error = array('error' => $this->upload->display_errors());
				//$this->load->view('v_upload', $error);
			}else{
				$data = array('upload_data' => $this->upload->data());
				$upload_data = $this->upload->data(); 
				$file_name = $upload_data['file_name'];
		        $this->temuan_audit_model->update_data_file($id_temuan_audit,$file_name);
				//$this->load->view('v_upload_sukses', $data);
			}


	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/temuan_audit");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		

			$id = $this->session->userdata('user_data');
	        $this->load->model('temuan_audit_model');
	        $this->temuan_audit_model->update_data($id['id_user']);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);


			$id_temuan_audit = $this->input->post('id_temuan_audit');
			$old_file = $this->input->post('old_file');
	        var_dump($id_temuan_audit);

	        $img = "./file/".$old_file;
			//var_dump($img);
			if (file_exists($img."")) {
	        	unlink($img."");
	    	}
			$config['upload_path']          = './file/';
			$config['allowed_types']        = '*';
			$config['max_size']             = 10000;
			$config['max_width']            = 7224;
			$config['max_height']           = 4268;
			$config['file_name']            = $id_temuan_audit;
	 
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('file')){

				var_dump( array('error' => $this->upload->display_errors()));
				$error = array('error' => $this->upload->display_errors());
				//$this->load->view('v_upload', $error);
			}else{
				$data = array('upload_data' => $this->upload->data());
				$upload_data = $this->upload->data(); 
				$file_name = $upload_data['file_name'];
		        $this->temuan_audit_model->update_data_file($id_temuan_audit,$file_name);
				//$this->load->view('v_upload_sukses', $data);
			}

	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/temuan_audit");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_temuan_audit)
        {
			$this->temuan_audit_model->hapus($id_temuan_audit);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/temuan_audit");
        }

         function hapustlm($id_temuan_tlm,$id_temuan_audit)
        {
			$this->temuan_audit_model->hapustlm($id_temuan_tlm);			
			
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
			$this->ckeditor->config['height'] = '250px';   
			$this->ckeditor->config['skin'] = 'office2013';         

		$data['page_title'] = 'Form Edit Temuan Audit';
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

		//Add Ckfinder to Ckeditor
			$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
	        $data['page_title'] = 'Form edit Temuan Audit';
	        $this->load->model('temuan_audit_model');

			$id = $this->session->userdata('user_data');
	        $this->temuan_audit_model->simpan_data_tlm($id['id_user']);
	        //$id_temuan_audit = $this->input->post('id_temuan_audit_modal');
	        $data['tlm'] = $this->temuan_audit_model->get_all_tlm($id_temuan_audit);
	        $data['query'] = $this->temuan_audit_model->get($id_temuan_audit);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_temuan_audit', $data);
	        $this->load->view('template/footer');
        }
		
		
}

