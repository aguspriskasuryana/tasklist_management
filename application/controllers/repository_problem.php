<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Repository_problem extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('repository_problem_model');
		$this->load->model('user_model');
    }
	
	public function index()
	{
			
			redirect(site_url()."/repository_problem/get_list_repository_problem");
	}
	public function get_list_repository_problem()
	{	

		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['repository_problem']= $this->repository_problem_model->get_all_repository_problem();
		//var_dump($data['repository_problem']);
			$data['page_title'] = 'Daftar Keluarga';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_repository_problem', $data);
			$this->load->view('template/footer');
	}
	
	function tambah_repository_problem()
	{
		
		$data['page_title'] = 'Form Tambah Repository_problem';
		$data['repository_problem']= $this->repository_problem_model->get_all_repository_problem();
		
		$data['page_title'] = 'Daftar Repository_problem';
			//$data['css_arr'] = array('datatables.css');
			//$data['js_arr'] = array('datatables/jquery.dataTables.min.js');



		$this->load->library('ckeditor');
		$this->load->library('ckfinder');



		$this->ckeditor->basePath = base_url().'asset/ckeditor/';
		$this->ckeditor->config['toolbar'] = 
		


		$this->ckeditor->config['language'] = 'us';
		$this->ckeditor->config['width'] = '600px';
		$this->ckeditor->config['height'] = '150px';   
		$this->ckeditor->config['skin'] = 'office2013';         

		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
		
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

			$data['repository_problem'] = $this->repository_problem_model->get_all_repository_problem();
			$data['list_user'] = $this->user_model->get_all_user();

			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_repository_problem', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_repository_problem($id_repository_problem)
	    {
		
	        $data['page_title'] = 'Form edit Repository_problem';
	        $this->load->model('repository_problem_model');
			$data['list_user'] = $this->user_model->get_all_user();

			$data['repository_problem']= $this->repository_problem_model->get_all_repository_problem();
		
		$data['page_title'] = 'Daftar Repository_problem';
			//$data['css_arr'] = array('datatables.css');
			//$data['js_arr'] = array('datatables/jquery.dataTables.min.js');



		$this->load->library('ckeditor');
		$this->load->library('ckfinder');



		$this->ckeditor->basePath = base_url().'asset/ckeditor/';
		$this->ckeditor->config['toolbar'] = 
		


		$this->ckeditor->config['language'] = 'us';
		$this->ckeditor->config['width'] = '600px';
		$this->ckeditor->config['height'] = '150px';   
		$this->ckeditor->config['skin'] = 'office2013';         

		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
		
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


	        $data['query']= $this->repository_problem_model->get($id_repository_problem);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_repository_problem', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('repository_problem_model');
	        $this->repository_problem_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/repository_problem");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('repository_problem_model');
	        $this->repository_problem_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/repository_problem");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_repository_problem)
        {
			$this->repository_problem_model->hapus($id_repository_problem);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/repository_problem");
        }
		
		
}

