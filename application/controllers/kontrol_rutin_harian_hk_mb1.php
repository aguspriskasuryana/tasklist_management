<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontrol_rutin_harian_hk_mb1 extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('kontrol_rutin_harian_hk_mb1_model');
		$this->load->model('task_model');
    }
	
	public function index()
	{
			redirect(site_url()."/kontrol_rutin_harian_hk_mb1/get_list_kontrol_rutin_harian_hk_mb1");
	}
	
	public function get_list_kontrol_rutin_harian_hk_mb1()
	{	

		$tanggal = date('Y-m-d');
		$shift = "1";
		$id = $this->session->userdata('user_data');

		if ($this->input->post('tanggal')){
			$tanggal = $this->input->post('tanggal');
		}
		if ($this->input->post('shift')){
			$shift = $this->input->post('shift');
		}
		

		$data['tanggalselect'] = $tanggal;
		$data['shiftselect'] = $shift;
		
		$data['tanggal'] = $this->kontrol_rutin_harian_hk_mb1_model->get_tanggal_kontrol_rutin_harian_hk_mb1();
		
		var_dump($data['tanggal'] );
		//generate
		$data =  $this->kontrol_rutin_harian_hk_mb1_model->getbytanggal($tanggal);
		if (!($data)){
			$this->kontrol_rutin_harian_hk_mb1_model->generate($tanggal, "09:00:00");
			$this->kontrol_rutin_harian_hk_mb1_model->generate($tanggal, "10:00:00");
			$this->kontrol_rutin_harian_hk_mb1_model->generate($tanggal, "11:00:00");
			$this->kontrol_rutin_harian_hk_mb1_model->generate($tanggal, "13:00:00");
			$this->kontrol_rutin_harian_hk_mb1_model->generate($tanggal, "14:00:00");
			$this->kontrol_rutin_harian_hk_mb1_model->generate($tanggal, "17:00:00");
			$this->kontrol_rutin_harian_hk_mb1_model->generate($tanggal, "18:00:00");
			$this->kontrol_rutin_harian_hk_mb1_model->generate($tanggal, "19:00:00");
			$this->kontrol_rutin_harian_hk_mb1_model->generate($tanggal, "20:00:00");
			$this->kontrol_rutin_harian_hk_mb1_model->generate($tanggal, "21:00:00");
		}
		//var_dump($time);
		$id = $this->session->userdata('user_data');
		$data['kontrol_rutin_harian_hk_mb1']= $this->kontrol_rutin_harian_hk_mb1_model->get_all_kontrol_rutin_harian_hk_mb1();
		//var_dump($data['kontrol_rutin_harian_hk_mb1']);
			$data['user'] = $this->task_model->get_all_user();
			$data['page_title'] = 'Daftar Kontrol_rutin_harian_hk_mb1';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_kontrol_rutin_harian_hk_mb1', $data);
			$this->load->view('template/footer');
	
	}

	function input_pelaksanaan($lokasi){
		echo $this->input->get('id_act');
		$time = date('Y-m-d H:i:s');
		echo $lokasi;
		
		$id = $this->session->userdata('user_data');
		
		if($lokasi == 1){
			$this->kontrol_rutin_harian_hk_mb1_model->update_lokasi_1($this->input->get('id_act'),$id['id_user']);
		}
		if($lokasi == 2){
			$this->kontrol_rutin_harian_hk_mb1_model->update_lokasi_2($this->input->get('id_act'),$id['id_user']);
		}
		if($lokasi == 3){
			$this->kontrol_rutin_harian_hk_mb1_model->update_lokasi_3($this->input->get('id_act'),$id['id_user']);
		}
		if($lokasi == 4){
			$this->kontrol_rutin_harian_hk_mb1_model->update_lokasi_4($this->input->get('id_act'),$id['id_user']);
		}
		if($lokasi == 5){
			$this->kontrol_rutin_harian_hk_mb1_model->update_lokasi_5($this->input->get('id_act'),$id['id_user']);
		}
		
	}

	function tambah_kontrol_rutin_harian_hk_mb1()
	{
		
		$data['page_title'] = 'Form Tambah Kontrol_rutin_harian_hk_mb1';
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
			$data['kontrol_rutin_harian_hk_mb1'] = $this->kontrol_rutin_harian_hk_mb1_model->get_all_kontrol_rutin_harian_hk_mb1();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_kontrol_rutin_harian_hk_mb1', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_kontrol_rutin_harian_hk_mb1($id_kontrol_rutin_harian_hk_mb1)
	    {
		
	        $data['page_title'] = 'Form edit Kontrol_rutin_harian_hk_mb1';
	        $this->load->model('kontrol_rutin_harian_hk_mb1_model');

	        $data['query']=
	         $this->kontrol_rutin_harian_hk_mb1_model->get($id_kontrol_rutin_harian_hk_mb1);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_kontrol_rutin_harian_hk_mb1', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('kontrol_rutin_harian_hk_mb1_model');
	        $this->kontrol_rutin_harian_hk_mb1_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/kontrol_rutin_harian_hk_mb1");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('kontrol_rutin_harian_hk_mb1_model');
	        $this->kontrol_rutin_harian_hk_mb1_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/kontrol_rutin_harian_hk_mb1");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_kontrol_rutin_harian_hk_mb1)
        {
			$this->kontrol_rutin_harian_hk_mb1_model->hapus($id_kontrol_rutin_harian_hk_mb1);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/kontrol_rutin_harian_hk_mb1");
        }
		
		
}

