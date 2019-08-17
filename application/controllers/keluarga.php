<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keluarga extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('keluarga_model');
		$this->load->model('user_model');
    }
	
	public function index()
	{
			
			redirect(site_url()."/keluarga/get_list_keluarga");
	}
	public function get_list_keluarga()
	{	

		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['keluarga']= $this->keluarga_model->get_all_keluarga();
		$data['hubungan']=  array("Kakek", "Nenek", "Ayah", "Ibu", "Paman", "Bibi", "Kakak", "Adik");
		//var_dump($data['keluarga']);
			$data['page_title'] = 'Daftar Keluarga';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_keluarga', $data);
			$this->load->view('template/footer');
	
	}
	function tambah_keluarga()
	{
		
		$data['page_title'] = 'Form Tambah Keluarga';
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
			$data['keluarga'] = $this->keluarga_model->get_all_keluarga();
			$data['list_user'] = $this->user_model->get_all_user();

		    $data['hubungan']=  array("Kakek", "Nenek", "Ayah", "Ibu", "Paman", "Bibi", "Kakak", "Adik", "Suami", "Istri", "Anak");
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_keluarga', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_keluarga($id_keluarga)
	    {
		
	        $data['page_title'] = 'Form edit Keluarga';
	        $this->load->model('keluarga_model');
			$data['list_user'] = $this->user_model->get_all_user();

		    $data['hubungan']=  array("Kakek", "Nenek", "Ayah", "Ibu", "Paman", "Bibi", "Kakak", "Adik", "Suami", "Istri", "Anak");

	        $data['query']= $this->keluarga_model->get($id_keluarga);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_keluarga', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('keluarga_model');
	        $this->keluarga_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/keluarga");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('keluarga_model');
	        $this->keluarga_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/keluarga");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_keluarga)
        {
			$this->keluarga_model->hapus($id_keluarga);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/keluarga");
        }
		
		
}

