<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biaya extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('biaya_model');
		$this->load->model('user_model');
    }
	
	public function index()
	{
			
			redirect(site_url()."/biaya/get_list_biaya");
	}
	public function get_list_biaya()
	{	

		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['tanggal'] = date("Y-m");
		$data['biaya']= $this->biaya_model->get_all_biaya();
		$data['par_rek']= $this->biaya_model->get_all_par_rek();
		//var_dump($data['biaya']);
			$data['page_title'] = 'Daftar Biaya';
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
			$this->load->view('list_biaya', $data);
			$this->load->view('template/footer');
	
	}

		public function get_list_biaya_excel()
	{	

		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['tanggal'] = date("Y-m");
		if ($this->input->post('tgl')){
 			$data['tanggal'] = $this->input->post('tgl');	
		}
		
		$data['biaya']= $this->biaya_model->get_all_biaya_excel($data['tanggal']);
		$data['par_rek']= $this->biaya_model->get_all_par_rek();
		//var_dump($data['biaya']);
			//$this->load->view('template/header', $data);
			$this->load->view('list_biaya_excel', $data);
			//$this->load->view('template/footer');
	
	}

	function tambah_biaya()
	{
		
		$data['page_title'] = 'Form Tambah Biaya';
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
			$data['biaya'] = $this->biaya_model->get_all_biaya();
			$data['list_user'] = $this->user_model->get_all_user();

			$data['par_rek']= $this->biaya_model->get_all_par_rek();

		    //$data['hubungan']=  array("Kakek", "Nenek", "Ayah", "Ibu", "Paman", "Bibi", "Kakak", "Adik", "Suami", "Istri", "Anak");
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_biaya', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_biaya($id_biaya)
	    {
		
	        $data['page_title'] = 'Form edit Biaya';
	        $this->load->model('biaya_model');
			$data['biaya'] = $this->biaya_model->get_all_biaya();
			$data['list_user'] = $this->user_model->get_all_user();

			$data['par_rek']= $this->biaya_model->get_all_par_rek();

	        $data['query']= $this->biaya_model->get($id_biaya);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_biaya', $data);
	        $this->load->view('template/footer');
		
	    }

	    function rka()
	    {
		
	        $data['page_title'] = 'RKA';
	        $this->load->model('biaya_model');
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('RKA', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('biaya_model');
	        $this->biaya_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/biaya");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('biaya_model');
	        $this->biaya_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/biaya");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_biaya)
        {
			$this->biaya_model->hapus($id_biaya);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/biaya");
        }
		
		
}

