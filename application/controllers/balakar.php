<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Balakar extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('balakar_model');
    }
	
	public function index()
	{
			redirect(site_url()."/balakar/get_list_balakar");
	}
	public function get_list_balakar()
	{	

		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');
		$data['balakar']= $this->balakar_model->get_all_balakar();
		//var_dump($data['balakar']);
		
			$data['page_title'] = 'Daftar Balakar';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_balakar', $data);
			$this->load->view('template/footer');
	
	}
	function tambah_balakar()
	{
		
		$data['page_title'] = 'Form Tambah Balakar';
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
			$data['balakar'] = $this->balakar_model->get_all_balakar();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_balakar', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_balakar($id_balakar)
	    {
		
	        $data['page_title'] = 'Form edit Balakar';
	        $this->load->model('balakar_model');

	        $data['query']=
	         $this->balakar_model->get($id_balakar);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_balakar', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('balakar_model');
	        $this->balakar_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/balakar");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('balakar_model');
	        $this->balakar_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/balakar");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_balakar)
        {
			$this->balakar_model->hapus($id_balakar);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/balakar");
        }
		
		
}

