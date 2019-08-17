<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('role_model');
    }
	
	public function index()
	{
			$data['page_title'] = 'Daftar Role';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_role', $data);
			$this->load->view('template/footer');
	}
	public function get_list_role()
	{	

		//if($this->session->teamdata('role')){
		//$data['role0'] = $this->session->teamdata('role');
		$this->load->library('datatables');
		$this->datatables
			->add_column('detail', '<a href="'.site_url('role/edit_role/$1').'" class="btn btn-xs btn-info" data-toggle="tooltip" data-original-title="Edit Role" ><i class="fa fa-edit"></i></a>&nbsp<a href="'.site_url('role/hapus/$1').'" class="btn detail_icon btn-xs btn-danger btn-delete-role" data-toggle="tooltip" data-original-title="Delete Role"><i class="fa fa-trash-o"></i></a>', 'id_role')
			->select('nama_role, id_role',false)
			->from('user_role');
		$res = $this->datatables->generate();
		echo $res;
	
	}
	function tambah_role()
	{
		
		$data['page_title'] = 'Form Tambah Role';
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

			//
			$data['role'] = $this->role_model->get_all_role();
			//$data['x'] = $this->role_model->get_walldisplay();
			//var_dump($data['x']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_role', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_role($id_role)
	    {
		
	        $data['page_title'] = 'Form edit Role';
	        $this->load->model('role_model');

	        $data['query']=
	         $this->role_model->get($id_role);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_role', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('role_model');
	        $this->role_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/role");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('role_model');
	        $this->role_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/role");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_role)
        {
			$this->role_model->hapus($id_role);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/role");
        }
		
		
}

