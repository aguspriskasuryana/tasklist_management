<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perangkat_non_inventaris extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('perangkat_non_inventaris_model');
		$this->load->model('user_model');
    }
	
	public function index()
	{
			var_dump("expression");
			redirect(site_url()."/perangkat_non_inventaris/get_list_perangkat_non_inventaris");
	}
	public function get_list_perangkat_non_inventaris()
	{	

		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['perangkat_non_inventaris']= $this->perangkat_non_inventaris_model->get_all_perangkat_non_inventaris();
		//var_dump($data['perangkat_non_inventaris']);
			$data['page_title'] = 'Daftar Perangkat_non_inventaris';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_perangkat_non_inventaris', $data);
			$this->load->view('template/footer');
	
	}
	function tambah_perangkat_non_inventaris()
	{
		
			$data['page_title'] = 'Form Tambah Perangkat_non_inventaris';
	        $this->load->model('perangkat_non_inventaris_model');
			$data['list_user'] = $this->user_model->get_all_user();
			$data['list_item_type'] = $this->perangkat_non_inventaris_model->get_all_item_type();
			
			$data['list_perangkat_non_inventaris_desain_dan_spesifikasi'] = $this->perangkat_non_inventaris_model->get_all_perangkat_non_inventaris_desain_dan_spesifikasi($id_perangkat_non_inventaris);

			$list_new = $this->perangkat_non_inventaris_model->get_new_file('new add');
			if ($list_new){
				$data['query']= $this->perangkat_non_inventaris_model->get($list_new['id_perangkat_non_inventaris']);
			} else {
				$this->perangkat_non_inventaris_model->simpan_data_new();
				$list_new = $this->perangkat_non_inventaris_model->get_new_file('new add');

				if ($data['list_new']){
					$data['query']= $this->perangkat_non_inventaris_model->get($list_new['id_perangkat_non_inventaris']);
				} 
			}
	        


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
			$this->ckeditor->config['width'] = '500px';
			$this->ckeditor->config['height'] = '250px';   
			$this->ckeditor->config['skin'] = 'office2013';         

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

		  
	        $data['performance'] = array('Worst', 'Bad', 'Warning', 'Good', 'Excellent');

	        

	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_perangkat_non_inventaris', $data);
	        $this->load->view('template/footer');
			
		}
		
		function edit_perangkat_non_inventaris($id_perangkat_non_inventaris)
	    {
		
	        $data['page_title'] = 'Form edit Perangkat_non_inventaris';
	        $this->load->model('perangkat_non_inventaris_model');
			$data['list_user'] = $this->user_model->get_all_user();

			$data['list_item_type'] = $this->perangkat_non_inventaris_model->get_all_item_type();

			$data['list_manufacture'] = $this->perangkat_non_inventaris_model->get_all_manufacture();
			$data['list_perangkat_non_inventaris_desain_dan_spesifikasi'] = $this->perangkat_non_inventaris_model->get_all_perangkat_non_inventaris_desain_dan_spesifikasi($id_perangkat_non_inventaris);


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
			$this->ckeditor->config['width'] = '500px';
			$this->ckeditor->config['height'] = '250px';   
			$this->ckeditor->config['skin'] = 'office2013';         

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

		  
	        $data['performance'] = array('Worst', 'Bad', 'Warning', 'Good', 'Excellent');

	        $data['query']= $this->perangkat_non_inventaris_model->get($id_perangkat_non_inventaris);

	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_perangkat_non_inventaris', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $this->perangkat_non_inventaris_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/perangkat_non_inventaris");
	        //$this->load->view('input/tambah',$data);
		
	    }

	    function update_data_umum($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $this->perangkat_non_inventaris_model->update_data_umum($id_perangkat_non_inventaris);
	        
	        redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
	    }

	     function update_data_umum_desain_dan_spesifikasi($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $this->perangkat_non_inventaris_model->update_data_umum_desain_dan_spesifikasi($id_perangkat_non_inventaris);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);

			redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
	    }

	     function update_data_umum_setup_configuration($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $this->perangkat_non_inventaris_model->update_data_umum_setup_configuration($id_perangkat_non_inventaris);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);

			redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
		
	    }

	    

	    function update_data_gambar($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $id = $this->session->userdata('user_data');

		
		$img = "./perangkatni/".$id_perangkat_non_inventaris;
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
		$config['upload_path']          = './perangkatni/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 7224;
		$config['max_height']           = 4268;
		$config['file_name']            = $id_perangkat_non_inventaris;
 
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('img_file')){
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];
	        $this->perangkat_non_inventaris_model->update_data_gambar($id_perangkat_non_inventaris,$file_name);
			//$this->load->view('v_upload_sukses', $data);
		}


	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);

			redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
		
	    }


	    function update_data_file_desain_dan_spesifikasi($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $id = $this->session->userdata('user_data');

		
		$img = "./perangkatni/".$id_perangkat_non_inventaris.'dds';
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
    	if (file_exists($img.".pdf")) {
        	unlink($img.".pdf");
    	}
    	if (file_exists($img.".doc")) {
        	unlink($img.".doc");
    	}
		$config['upload_path']          = './perangkatni/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
		$config['max_size']             = 10000;
		$config['max_width']            = 7224;
		$config['max_height']           = 4268;
		$config['file_name']            = $id_perangkat_non_inventaris.'dds';
 
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file_desain_dan_spesifikasi')){
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];
	        $this->perangkat_non_inventaris_model->update_data_file_desain_dan_spesifikasi($id_perangkat_non_inventaris,$file_name);
			//$this->load->view('v_upload_sukses', $data);
		}


	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);

			redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
		
	    }


	    function update_data_file_setup_configuration($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $id = $this->session->userdata('user_data');

		
		$img = "./perangkatni/".$id_perangkat_non_inventaris.'sc';
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
    	if (file_exists($img.".pdf")) {
        	unlink($img.".pdf");
    	}
    	if (file_exists($img.".doc")) {
        	unlink($img.".doc");
    	}
		$config['upload_path']          = './perangkatni/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
		$config['max_size']             = 10000;
		$config['max_width']            = 7224;
		$config['max_height']           = 4268;
		$config['file_name']            = $id_perangkat_non_inventaris.'sc';
 
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file_setup_configuration')){
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];
	        $this->perangkat_non_inventaris_model->update_data_file_setup_configuration($id_perangkat_non_inventaris,$file_name);
			//$this->load->view('v_upload_sukses', $data);
		}


	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);

			redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
		
	    }

function update_data_umum_availability($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $this->perangkat_non_inventaris_model->update_data_umum_availability($id_perangkat_non_inventaris);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);

			redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
	    }

function update_data_file_availability($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $id = $this->session->userdata('user_data');

		
		$img = "./perangkatni/".$id_perangkat_non_inventaris.'av';
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
    	if (file_exists($img.".pdf")) {
        	unlink($img.".pdf");
    	}
    	if (file_exists($img.".doc")) {
        	unlink($img.".doc");
    	}
		$config['upload_path']          = './perangkatni/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
		$config['max_size']             = 10000;
		$config['max_width']            = 7224;
		$config['max_height']           = 4268;
		$config['file_name']            = $id_perangkat_non_inventaris.'av';
 
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file_availability')){
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];
	        $this->perangkat_non_inventaris_model->update_data_file_availability($id_perangkat_non_inventaris,$file_name);
			//$this->load->view('v_upload_sukses', $data);
		}


	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);

			redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
		
	    }

function update_data_umum_reliability($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $this->perangkat_non_inventaris_model->update_data_umum_reliability($id_perangkat_non_inventaris);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);

			redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
	    }

function update_data_file_reliability($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $id = $this->session->userdata('user_data');

		
		$img = "./perangkatni/".$id_perangkat_non_inventaris.'re';
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
    	if (file_exists($img.".pdf")) {
        	unlink($img.".pdf");
    	}
    	if (file_exists($img.".doc")) {
        	unlink($img.".doc");
    	}
		$config['upload_path']          = './perangkatni/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
		$config['max_size']             = 10000;
		$config['max_width']            = 7224;
		$config['max_height']           = 4268;
		$config['file_name']            = $id_perangkat_non_inventaris.'re';
 
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file_reliability')){
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];
	        $this->perangkat_non_inventaris_model->update_data_file_reliability($id_perangkat_non_inventaris,$file_name);
			//$this->load->view('v_upload_sukses', $data);
		}


	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);

			redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
		
	    }

function update_data_umum_performance($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $this->perangkat_non_inventaris_model->update_data_umum_performance($id_perangkat_non_inventaris);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);

			redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
	    }

function update_data_file_performance($id_perangkat_non_inventaris)
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $id = $this->session->userdata('user_data');

		
		$img = "./perangkatni/".$id_perangkat_non_inventaris.'re';
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
    	if (file_exists($img.".pdf")) {
        	unlink($img.".pdf");
    	}
    	if (file_exists($img.".doc")) {
        	unlink($img.".doc");
    	}
		$config['upload_path']          = './perangkatni/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
		$config['max_size']             = 10000;
		$config['max_width']            = 7224;
		$config['max_height']           = 4268;
		$config['file_name']            = $id_perangkat_non_inventaris.'re';
 
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file_performance')){
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];
	        $this->perangkat_non_inventaris_model->update_data_file_performance($id_perangkat_non_inventaris,$file_name);
			//$this->load->view('v_upload_sukses', $data);
		}


	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);

			redirect(site_url()."/perangkat_non_inventaris/edit_perangkat_non_inventaris/".$id_perangkat_non_inventaris);
		
		
	    }


	    function update_data()
		{
		
	        $this->load->model('perangkat_non_inventaris_model');
	        $this->perangkat_non_inventaris_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/perangkat_non_inventaris");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_perangkat_non_inventaris)
        {
			$this->perangkat_non_inventaris_model->hapus($id_perangkat_non_inventaris);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/perangkat_non_inventaris");
        }
		
		
}

