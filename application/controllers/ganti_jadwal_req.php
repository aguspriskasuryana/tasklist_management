<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ganti_jadwal_req extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('ganti_jadwal_req_model');
		$this->load->model('task_model');
		$this->load->model('user_model');
    }
	
	public function index()
	{
			$data['page_title'] = 'Daftar Ganti Jadwal';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_ganti_jadwal_req', $data);
			$this->load->view('template/footer');
	}
	public function get_list_ganti_jadwal_req()
	{	

		//if($this->session->teamdata('role')){
		//$data['role0'] = $this->session->teamdata('role');
		$this->load->library('datatables');
		$this->datatables
			//->add_column('detail', '<a href="'.site_url('ganti_jadwal_req/edit_ganti_jadwal_req/$1').'" class="btn btn-xs btn-info" data-toggle="tooltip" data-original-title="Edit Ganti Jadwal Req" ><i class="fa fa-edit"></i></a>&nbsp<a href="'.site_url('ganti_jadwal_req/hapus/$1').'" class="btn detail_icon btn-xs btn-danger btn-delete-role" data-toggle="tooltip" data-original-title="Delete Ganti Jadwal"><i class="fa fa-trash-o"></i></a>', 'id_ganti_jadwal_req')
			//->select('id_task_list,id_user,jam_awal,jam_baru,tanggal_lama,tanggal_baru,status,id_approval,date_req, id_ganti_jadwal_req',false)
			//->from('ganti_jadwal_req');


			//->add_column('detail', '<a href="'.site_url('ganti_jadwal_req/edit_ganti_jadwal_req/$1').'" class="btn btn-xs btn-info" data-toggle="tooltip" data-original-title="Edit Task" ><i class="fa fa-edit"></i></a>&nbsp<a href="'.site_url('ganti_jadwal_req/hapus/$1').'" class="btn detail_icon btn-xs btn-danger btn-delete-ganti_jadwal_req" data-toggle="tooltip" data-original-title="Delete Req"><i class="fa fa-trash-o"></i></a>', 'id_ganti_jadwal_req')

			->add_column('detail', '<a href="'.site_url('ganti_jadwal_req/hapus/$1').'" class="btn detail_icon btn-xs btn-danger btn-delete-ganti_jadwal_req" data-toggle="tooltip" data-original-title="Delete Req"><i class="fa fa-trash-o"></i></a>', 'id_ganti_jadwal_req')
			->select('g.id_ganti_jadwal_req as id_ganti_jadwal_req, t.aktifitas, u.nama_lengkap, g.jam_awal, g.jam_baru, g.tanggal_lama, g.tanggal_baru,g.date_req, a.nama_lengkap as nama_paraf, g.time_paraf',false)
			->from('ganti_jadwal_req as g')
			->join('master_user as u','u.id_user=g.id_user','left')
			->join('master_user as a','a.id_user=g.id_paraf','left')
			->join('task_list as t','t.id_task_list=g.id_task_list','inner')
			->where('g.id_paraf =',0);
			//->where('g.id_team !=',0);

		$res = $this->datatables->generate();
		echo $res;
	}


	function list_approved_form_req(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');

		$data['query']=
	         $this->ganti_jadwal_req_model->get_list_approved_form_req();
		$data['page_title'] = 'Daftar Form';
		$data['css_arr'] = array('datatables.css');
		$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
		$this->load->view('template/header', $data);
		$this->load->view('list_approved_form_req', $data);
		$this->load->view('template/footer');

	}

	function list_form_req(){
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');

		$data['query']=
	         $this->ganti_jadwal_req_model->get_all_ganti_jadwal_req();
		$data['page_title'] = 'Daftar Aktifitas';
		$data['css_arr'] = array('datatables.css');
		$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
		$this->load->view('template/header', $data);
		$this->load->view('list_form_jadwal_req', $data);
		$this->load->view('template/footer');

	}

	function get_data_jam(){
		$fuck =$this->input->get('id_task');
		$id = $this->session->userdata('user_data');
		$datajam=$this->task_model->get_jam_of_task_list($fuck);
		//var_dump($datajam);
		$jamx = explode(",",$datajam['jam']);
//var_dump($jamx);
		echo json_encode($jamx);
	}

	function get_data_tanggal(){
		$fuck =$this->input->get('id_task');
		$id = $this->session->userdata('user_data');
		$datatanggal=$this->task_model->get_tanggal_of_task_list($fuck);
		//var_dump($datajam);
		$tanggalx = explode(",",$datatanggal['tanggal']);
//var_dump($jamx);
		echo json_encode($tanggalx);
	}

	function tambah_ganti_jadwal_req()
	{
		
		$id = $this->session->userdata('user_data');
		$data['page_title'] = 'Form Tambah Ganti Jadwal';
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
			$data['ganti_jadwal_req'] = $this->ganti_jadwal_req_model->get_all_ganti_jadwal_req();
			$data['task_list_team'] = $this->task_model->get_task_where_idteam($id['id_team']);
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_ganti_jadwal_req', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_ganti_jadwal_req($id_ganti_jadwal_req)
	    {
		
		$id = $this->session->userdata('user_data');
	        $data['page_title'] = 'Form edit ganti jadwal req';
	        $this->load->model('ganti_jadwal_req_model');

	        $data['query']=
	         $this->ganti_jadwal_req_model->get($id_ganti_jadwal_req);

			$data['task_list_team'] = $this->task_model->get_task_where_idteam($id['id_team']);
			$data['user_req'] = $this->user_model->get($data['query']['id_user']);
			$data['user_paraf'] = $this->user_model->get($data['query']['id_paraf']);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_ganti_jadwal_req', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('ganti_jadwal_req_model');
	        $this->ganti_jadwal_req_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/ganti_jadwal_req");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('ganti_jadwal_req_model');
	        $this->ganti_jadwal_req_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/ganti_jadwal_req");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_ganti_jadwal_req)
        {
			$this->ganti_jadwal_req_model->hapus($id_ganti_jadwal_req);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/id_ganti_jadwal_req");
        }


        function input_paraf($status){
		//echo $this->input->get('id_act');
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');


		if($status == 1){
		
		//$this->task_list_model->update_ganti_jadwal_req(1,$this->input->get('id_ganti_jadwal_req'),$id['id_user'],$time);
		

		//update status paraf di tb ganti jadwal req
		$this->ganti_jadwal_req_model->update_ganti_jadwal_req(1,$this->input->get('id_ganti_jadwal_req'),$id['id_user'],$time);
		//var_dump($id['id_user']);
		//var_dump($this->input->get('id_ganti_jadwal_req'));
		//if($id['id_role']==4){
		//$this->input_paraf(1);
		//}
		//if($id['id_role']==3){
		//$this->input_paraf(1);
		//$this->input_paraf(2);
		//}
		}else{
			//$this->task_model->update_pelaksanaan_activity(2,$this->input->get('id_act'),$this->input->get('alasan'),$id['id_user'],$time);
		}
	}
		
		
}

