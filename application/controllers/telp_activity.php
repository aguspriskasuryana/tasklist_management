<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telp_activity extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('telp_activity_model');
    }
	
	public function index()
	{
			redirect(site_url()."/telp_activity/get_list_telp_activity");
	}
	public function get_list_telp_activity()
	{	

		$month = date('Y-m');
		if ($this->input->post('tgl')){
			$month = $this->input->post('tgl');
		}
		$id = $this->session->userdata('user_data');
		$data['telp_activity']= $this->telp_activity_model->get_all_telp_activity($month);
		$data['tgl']=$month;
		//var_dump($data['telp_activity']);
			$data['page_title'] = 'Daftar Telp Activity';		
			$data['css_arr'] = array(
			'datatables.css',
			'fuelux.css',
			'select2.css',
			'datepicker.css',
			'rab.css',
			'fileinput.css',
			'dropzone.css',
			'jquery-ui-autocomplete.css'
		);
		$data['js_arr'] = array(
			'datatables/jquery.dataTables.min.js',
			'parsley/parsley.min.js',
			'parsley/parsley.extend.js',
			'select2/select2.min.js',
			'datepicker/bootstrap-datepicker.js',
			'fileinput.min.js',
			'dropzone.min.js',
			'jquery-ui-autocomplete.js'
		);

			$this->load->view('template/header', $data);
			$this->load->view('list_telp_activity', $data);
			$this->load->view('template/footer');
	
	}


	function tambah_telp_activity()
	{
		
		$data['page_title'] = 'Form Tambah Telp_activity';
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
			$data['telp_activity'] = $this->telp_activity_model->get_all_telp_activity();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_telp_activity', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_telp_activity($id_telp_activity)
	    {
		
	        $data['page_title'] = 'Form edit Telp_activity';
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
	        $this->load->model('telp_activity_model');

	        $data['query']= $this->telp_activity_model->get($id_telp_activity);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_telp_activity', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('telp_activity_model');
	        $this->telp_activity_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/telp_activity");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('telp_activity_model');
	        $this->telp_activity_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/telp_activity");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_telp_activity)
        {
			$this->telp_activity_model->hapus($id_telp_activity);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/telp_activity");
        }
		
		
}

