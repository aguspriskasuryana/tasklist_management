<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		//parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('csrf');
		$this->load->model('user_model');
		$this->load->model('team_model');
		$this->load->model('company_model');
		$this->load->model('role_model');
    }
	
	public function index()
	{
			$data['page_title'] = 'Daftar User';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_user', $data);
			$this->load->view('template/footer');
	}
	public function get_list_user()
	{	

		//if($this->session->userdata('role')){
		//$data['role0'] = $this->session->userdata('role');
		//<img src="'.base_url('./images/$2/$3').'" height="100" width="100" alt="" >images/$2/$3
	            
		$this->load->library('datatables');
		$this->datatables
			->add_column('detail', '<a href="'.site_url('user/edit_user_detail/$1').'" class="btn btn-xs btn-info" data-toggle="tooltip" data-original-title="Edit User detail" ><i class="fa fa-edit"></i></a>&nbsp<a href="'.site_url('user/edit_user/$1').'" class="btn btn-xs btn-info" data-toggle="tooltip" data-original-title="Edit User Password" ><i class="fa fa-key"></i></a>&nbsp
				<a href="'.site_url('user/hapus/$1').'" class="btn detail_icon btn-xs btn-danger btn-delete-user" data-toggle="tooltip" data-original-title="Delete User"><i class="fa fa-trash-o"></i></a>', 'id_user,team,img')
			->select('u.id_user as id_user, u.nama_lengkap,u.id_kartu, u.username, i.nama_role as role, t.nama as team, u.img_file as img, c.nama_company as nama_company',false)
			->from('master_user as u')
			->join('user_role as i','i.id_role=u.id_role','left')
			->join('master_team as t','t.id_team=u.id_team','left')
			->join('master_company as c','c.id_company=u.id_company','left')
			->where('u.id_role !=',0);
		$res = $this->datatables->generate();
		echo $res;
	
	}
	
	function tambah_user()
	{
		
		$data['page_title'] = 'Form Tambah User';
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
			//$data['team'] = $this->user_model->get_all_team();
			$data['team'] = $this->team_model->get_all_team();
			$data['role'] = $this->user_model->get_all_role();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_user', $data);
			$this->load->view('template/footer');
			
	}
		
		function edit_user($id_user)
	    {
		
	        $data['page_title'] = 'Form edit User';
	        $this->load->model('user_model');

	        $data['query']=
	            $this->user_model->get($id_user);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_user', $data);
	        $this->load->view('template/footer');
		
	    }

	    function edit_user_detail($id_user)
	    {
		

		$id = $this->session->userdata('user_data');
		$data['team'] = $this->team_model->get_all_team();
		$data['company'] = $this->company_model->get_all_company();
		$data['role'] = $this->role_model->get_all_role();
	        $data['page_title'] = 'Form edit User';
	        $this->load->model('user_model');

	        $data['query']=  $this->user_model->get($id_user);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_user_detail', $data);
	        $this->load->view('template/footer');
		
	    }

	    function edit_user_detail_password()
	    {
		

			$id = $this->session->userdata('user_data');
			$data['team'] = $this->team_model->get_all_team();
			$data['role'] = $this->role_model->get_all_role();
	        $data['page_title'] = 'Form edit User Detail Password';
	        $this->load->model('user_model');

	        $data['query']=  $this->user_model->get($id['id_user']);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_user_detail_password', $data);
	        $this->load->view('template/footer');
		
	    }
		

	    function list_my_team()
	    {
		
			$id = $this->session->userdata('user_data');
			$data['team'] = $this->team_model->get_all_team();
			$data['company'] = $this->company_model->get_all_company();
			$data['role'] = $this->role_model->get_all_role();
	        $data['page_title'] = 'My Team';
	        $this->load->model('user_model');
	        $data['user'] = $this->user_model->get_all_user_complete();

	        $data['query']=  $this->user_model->get($id['id_user']);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('list_my_team', $data);
	        $this->load->view('template/footer');
		
	    }

		function aksi_upload(){
		$id = $this->session->userdata('user_data');

		
		$img = "./images/".$id['id_user'];
		//var_dump($img);
		if (file_exists($img.".jpg")) {
        	unlink($img.".jpg");
    	}
    	if (file_exists($img.".png")) {
        	unlink($img.".png");
    	}
    	if (file_exists($img.".gif")) {
        	unlink($img.".gif");
    	}
		$config['upload_path']          = './images/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 7224;
		$config['max_height']           = 4268;
		$config['file_name']            = $id['id_user'];
 
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];
	        $this->user_model->update_data_detail_photos($id['id_user'],$file_name);
			//$this->load->view('v_upload_sukses', $data);
		}

			
			$data['team'] = $this->team_model->get_all_team();
			$data['company'] = $this->company_model->get_all_company();
			$data['role'] = $this->role_model->get_all_role();
	        $data['page_title'] = 'Form edit User';
	        $this->load->model('user_model');

	        $data['query']= $this->user_model->get($id['id_user']);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_user_detail', $data);
	        $this->load->view('template/footer');

 
		
	}

		function simpan_data()
		{
		
	        $this->load->model('user_model');
			$username = $this->user_model->cek_username($this->input->post('nama_user'));
			if($username){
			//$data['notifikasi']='Username sudah digunakan, coba username lain!';
			}else{
	        $this->user_model->simpan_data();
			}
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/user");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('user_model');
	        $this->user_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/user");
	        //$this->load->view('input/tambah',$data);
		
	     }

	      function update_data_detail_password()
		{
		
	        $this->load->model('user_model');
	        $this->user_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/user/update_data_detail");
	        //$this->load->view('input/tambah',$data);
		
	     }

	     function update_data_detail()
		{
		
	        $this->load->model('user_model');
	        $this->user_model->update_data_detail();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        //redirect(site_url()."/user/update_data_detail");
	        //$this->load->view('input/tambah',$data);
	        $id = $this->session->userdata('user_data');
			$data['team'] = $this->team_model->get_all_team();
			$data['company'] = $this->company_model->get_all_company();
			$data['role'] = $this->role_model->get_all_role();
	        $data['page_title'] = 'Form edit User';
	        $this->load->model('user_model');

	        $data['query']=  $this->user_model->get($id['id_user']);
		
			//$this->load->view('template/header', $data);
	        //$this->load->view('form_edit_user_detail', $data);
	        //$this->load->view('template/footer');

	        redirect(site_url()."/user");
	     }
		 
	    function hapus($id_user)
        {
			$this->user_model->hapus($id_user);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/user");
        }
		
		function cek_username(){
			$data = $this->user_model->cek_username($this->input->get('username'));
			echo json_encode($data);
		}
		
		
}

