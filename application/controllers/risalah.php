<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Risalah extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('risalah_model');
    }
	
	public function index()
	{
			$data['page_title'] = 'Daftar Risalah';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_risalah', $data);
			$this->load->view('template/footer');
	}
	public function get_list_risalah()
	{	

		//if($this->session->teamdata('role')){
		//$data['role0'] = $this->session->teamdata('role');
		$this->load->library('datatables');
		$this->datatables
			->add_column('detail', '<a href="'.site_url('risalah/edit_risalah/$1').'" class="btn btn-xs btn-info" data-toggle="tooltip" data-original-title="Edit Risalah" ><i class="fa fa-edit"></i></a>&nbsp<a href="'.site_url('risalah/hapus/$1').'" class="btn detail_icon btn-xs btn-danger btn-delete-risalah" data-toggle="tooltip" data-original-title="Delete Risalah"><i class="fa fa-trash-o"></i></a>', 'id_risalah')
			->select('tanggal, judul, data, id_risalah',false)
			->from('risalah');
		$res = $this->datatables->generate();
		echo $res;
	
	}
	function tambah_risalah()
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
		$this->ckeditor->config['height'] = '350px';   
		$this->ckeditor->config['skin'] = 'office2013';         

		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
		
		$data['page_title'] = 'Form Tambah Risalah';
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
			$data['risalah'] = $this->risalah_model->get_all_risalah();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_risalah', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_risalah($id_risalah)
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

		$data['page_title'] = 'Form Edit Risalah';
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
	        $data['page_title'] = 'Form edit Risalah';
	        $this->load->model('risalah_model');

	        $data['query']=$this->risalah_model->get($id_risalah);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_risalah', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
			
			$id = $this->session->userdata('user_data');
	        $this->load->model('risalah_model');
	        $this->risalah_model->simpan_data($id['id_user']);
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/risalah");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		

			$id = $this->session->userdata('user_data');
	        $this->load->model('risalah_model');
	        $this->risalah_model->update_data($id['id_user']);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/risalah");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_risalah)
        {
			$this->risalah_model->hapus($id_risalah);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/risalah");
        }
		
		
}

