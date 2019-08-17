<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('team_model');
    }
	
	public function index()
	{
			$data['page_title'] = 'Daftar Team';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_team', $data);
			$this->load->view('template/footer');
	}
	public function get_list_team()
	{	

		//if($this->session->teamdata('role')){
		//$data['role0'] = $this->session->teamdata('role');
		$this->load->library('datatables');
		$this->datatables
			->add_column('detail', '<a href="'.site_url('team/edit_team/$1').'" class="btn btn-xs btn-info" data-toggle="tooltip" data-original-title="Edit Team" ><i class="fa fa-edit"></i></a>&nbsp<a href="'.site_url('team/hapus/$1').'" class="btn detail_icon btn-xs btn-danger btn-delete-team" data-toggle="tooltip" data-original-title="Delete Team"><i class="fa fa-trash-o"></i></a>', 'id_team')
			->select('nama, keterangan, jabatan, id_team',false)
			->from('master_team');
		$res = $this->datatables->generate();
		echo $res;
	
	}
	function tambah_team()
	{
		
		$data['page_title'] = 'Form Tambah Team';
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
			$data['team'] = $this->team_model->get_all_team();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_team', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_team($id_team)
	    {
		
	        $data['page_title'] = 'Form edit Team';
	        $this->load->model('team_model');

	        $data['query']=
	         $this->team_model->get($id_team);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_team', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('team_model');
	        $this->team_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/team");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('team_model');
	        $this->team_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/team");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_team)
        {
			$this->team_model->hapus($id_team);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/team");
        }
		
		
}

