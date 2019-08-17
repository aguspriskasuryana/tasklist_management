<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_sksm extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('form_sksm_model');
    }
	
	public function index()
	{
			redirect(site_url()."/form_sksm/get_list_form_sksm");
	}
	public function get_list_form_sksm()
	{	

		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['form_sksm']= $this->form_sksm_model->get_all_form_sksm();
		//var_dump($data['form_sksm']);
			$data['page_title'] = 'Daftar Telp Activity';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_form_sksm', $data);
			$this->load->view('template/footer');
	
	}


	function tambah_form_sksm()
	{
		
		$data['page_title'] = 'Form Tambah Form_sksm';
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
		$Y = date('Y');

		
			$data['new_no_sk'] = $this->form_sksm_model->get_new_no_sk($Y);
			$data['tipe_surat']=  array("Surat Keluar", "Surat Masuk");
			$data['form_sksm'] = $this->form_sksm_model->get_all_form_sksm();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_form_sksm', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_form_sksm($id_form_sksm)
	    {
		
	        $data['page_title'] = 'Form edit Form_sksm';
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
	        $this->load->model('form_sksm_model');

			$data['tipe_surat']=  array("Surat Keluar", "Surat Masuk");

	        $data['query']= $this->form_sksm_model->get($id_form_sksm);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_form_sksm', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('form_sksm_model');
	        $this->form_sksm_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/form_sksm");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('form_sksm_model');
	        $this->form_sksm_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/form_sksm");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_form_sksm)
        {
			$this->form_sksm_model->hapus($id_form_sksm);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/form_sksm");
        }
		
		
}

