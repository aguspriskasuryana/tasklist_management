<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Phonebook extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('phonebook_model');
    }
	
	public function index()
	{
			$data['page_title'] = 'Daftar Phonebook';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_phonebook', $data);
			$this->load->view('template/footer');
	}
	public function get_list_phonebook()
	{	

		//if($this->session->teamdata('phonebook')){
		//$data['phonebook0'] = $this->session->teamdata('phonebook');
		$this->load->library('datatables');
		$this->datatables
			->add_column('detail', '<a href="'.site_url('phonebook/edit_phonebook/$1').'" class="btn btn-xs btn-info" data-toggle="tooltip" data-original-title="Edit Phonebook" ><i class="fa fa-edit"></i></a>&nbsp<a href="'.site_url('phonebook/hapus/$1').'" class="btn detail_icon btn-xs btn-danger btn-delete-phonebook" data-toggle="tooltip" data-original-title="Delete Phonebook"><i class="fa fa-trash-o"></i></a>', 'id_phonebook')
			->select('*, id_phonebook',false)
			->from('phonebook');
		$res = $this->datatables->generate();
		echo $res;
	
	}
	function tambah_phonebook()
	{
		
		$data['page_title'] = 'Form Tambah Phonebook';
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
			$data['phonebook'] = $this->phonebook_model->get_all_phonebook();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_phonebook', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_phonebook($id_phonebook)
	    {
		
	        $data['page_title'] = 'Form edit Phonebook';
	        $this->load->model('phonebook_model');

	        $data['query']=
	         $this->phonebook_model->get($id_phonebook);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_phonebook', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('phonebook_model');
	        $this->phonebook_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/phonebook");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('phonebook_model');
	        $this->phonebook_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/phonebook");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_phonebook)
        {
			$this->phonebook_model->hapus($id_phonebook);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/phonebook");
        }
		
		
}

