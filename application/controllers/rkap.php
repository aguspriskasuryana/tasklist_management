<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rkap extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('rkap_model');
		$this->load->model('user_model');
		$this->load->model('biaya_model');
    }
	
	public function index()
	{
			redirect(site_url()."/rkap/get_list_rkap");
	}
	public function get_list_rkap()
	{	

		$time = date('Y-m-d H:i:s');
		//var_dump($time);

		$data['list_user'] = $this->user_model->get_all_user();
		$id = $this->session->userdata('user_data');
		$data['rkap']= $this->rkap_model->get_all_rkap();

		$data['par_rek']= $this->biaya_model->get_all_par_rek();
		//var_dump($data['gangguan']);
		
			$data['page_title'] = 'Daftar RKAP';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_rkap', $data);
			$this->load->view('template/footer');
	
	}
	function tambah_rkap()
	{
		
		$data['page_title'] = 'Form Tambah RKAP';
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

			
			$data['par_rek']= $this->biaya_model->get_all_par_rek();
			$data['rkap'] = $this->rkap_model->get_all_rkap();
			//$data['x'] = $this->rkap_model->get_walldisplay();
			//var_dump($data['x']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_rkap', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_rkap($id_rkap)
	    {
		
	        $data['page_title'] = 'Form edit RKAP';
	        $this->load->model('rkap_model');

			$data['par_rek']= $this->biaya_model->get_all_par_rek();
	        $data['query']=$this->rkap_model->get($id_rkap);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_rkap', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
			
			$id = $this->session->userdata('user_data');
	        $this->load->model('rkap_model');
	        $this->rkap_model->simpan_data($id['id_user']);
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/rkap");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
			$id = $this->session->userdata('user_data');
	        $this->load->model('rkap_model');
	        $this->rkap_model->update_data($id['id_user']);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/rkap");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_rkap)
        {
			$this->rkap_model->hapus($id_rkap);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/rkap");
        }
		
		
}

