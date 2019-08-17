<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_storage extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		//$this->load->library('qrlib');
		$this->load->model('form_storage_model');
    }
	
	public function index()
	{
			redirect(site_url()."/form_storage/get_list_form_storage");
	}
	

	public function get_list_form_storage_history($id_form_storage)
	{	

		$time = date('Y-m-d H:i:s');
		$data['tipe']=  $this->form_storage_model->get_all_form_storage_listroom();
		$id = $this->session->userdata('user_data');
		$data['form_storage']= $this->form_storage_model->get_all_form_storage_history($id_form_storage);
	    $data['query']= $this->form_storage_model->get($id_form_storage);
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//var_dump($data['form_storage']);
			$data['page_title'] = 'Daftar ';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_form_storage_history', $data);
			$this->load->view('template/footer');
	
	}

	public function get_list_form_storage()
	{	

		$time = date('Y-m-d H:i:s');

		$id = $this->session->userdata('user_data');
		$data['tipe']=  $this->form_storage_model->get_all_form_storage_listroom();
		$data['form_storage']= $this->form_storage_model->get_all_form_storage_inner_join();
		$data['form_storage_no_img']= $this->form_storage_model->get_all_form_storage_inner_join_no_img();
		//load library
		//var_dump($data['form_storage_no_img']);
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');

				$this->load->library('ciqrcode'); //pemanggilan library QR CODE

				$config['cacheable']	= true; //boolean, the default is true
				$config['cachedir']		= './asset/'; //string, the default is application/cache/
				$config['errorlog']		= './asset/'; //string, the default is application/logs/
				$config['imagedir']		= './asset/images/'; //direktori penyimpanan qr code
				$config['quality']		= true; //boolean, the default is true
				$config['size']			= '1024'; //interger, the default is 1024
				$config['black']		= array(224,255,255); // array, default is array(255,255,255)
				$config['white']		= array(70,130,180); // array, default is array(0,0,0)
				$this->ciqrcode->initialize($config);
				

				/*
				foreach($data['form_storage_no_img'] as $list){
					if ($list['qr_code'] == "") {
						//var_dump($list['id_form_storage']);
						$id= $list['id_form_storage'];
						$image_name=$id.'.png'; //buat name dari qr code sesuai dengan nim

						$params['data'] = $id; //data yang akan di jadikan QR CODE
						$params['level'] = 'H'; //H=High
						$params['size'] = 10;
						$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
						$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

	        			$this->form_storage_model->update_data_qrcode($id);
					}
				}
				*/
				
				
				
			//var_dump($data['form_storage_no_img']);
			$data['page_title'] = 'Daftar ';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_form_storage', $data);
			$this->load->view('template/footer');
	
	}

	public function get_list_form_storage2()
	{	

		$time = date('Y-m-d H:i:s');
$data['tipe']=  $this->form_storage_model->get_all_form_storage_listroom();
		$id = $this->session->userdata('user_data');
		
		$data['scannedQR'] ='';
		if($this->input->post('scanned-QR')){
			$data['scannedQR'] = $this->input->post('scanned-QR');
		}
		
		$data['form_storage'] = $this->form_storage_model->get_all_form_storagebyid($data['scannedQR']);
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//var_dump($data['form_storage']);
			$data['page_title'] = 'Daftar ';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_form_storage_2', $data);
			$this->load->view('template/footer');
	
	}


	public function get_list_form_storage_keluar()
	{	

		$time = date('Y-m-d H:i:s');
		$data['tipe']=  $this->form_storage_model->get_all_form_storage_listroom();
		$id = $this->session->userdata('user_data');
		
		$data['scannedQR'] ='';
		if($this->input->post('scanned-QR')){
			$data['scannedQR'] = $this->input->post('scanned-QR');
		}
		
		$data['form_storage'] = $this->form_storage_model->get_storage_keluar();
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//var_dump($data['form_storage']);
			$data['page_title'] = 'Daftar ';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_form_storage_keluar', $data);
			$this->load->view('template/footer');
	
	}

	public function get_list_form_storage_masuk()
	{	

		$time = date('Y-m-d H:i:s');
		$data['tipe']=  $this->form_storage_model->get_all_form_storage_listroom();
		$id = $this->session->userdata('user_data');
		
		$data['scannedQR'] ='';
		if($this->input->post('scanned-QR')){
			$data['scannedQR'] = $this->input->post('scanned-QR');
		}
		
		$data['form_storage'] = $this->form_storage_model->get_storage_masuk();
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//var_dump($data['form_storage']);
			$data['page_title'] = 'Daftar ';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_form_storage_masuk', $data);
			$this->load->view('template/footer');
	
	}

	function tambah_form_storage()
	{
		
		$data['page_title'] = 'Form Tambah Form_storage';
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
		//$data['tipe']=  array("","On Rack", "In Box", "Out Storage", "Gudang MB", "Library Paper");

		$data['tipe']=  $this->form_storage_model->get_all_form_storage_listroom();
		
			$data['tipe_surat']=  array("Surat Keluar", "Surat Masuk");
			$data['form_storage'] = $this->form_storage_model->get_all_form_storage();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_form_storage', $data);
			$this->load->view('template/footer');
			
		}
	function qrcodegenerator($code)
	{
		
		//$this->load->library('qrlib');
		$data['page_title'] = 'Form Tambah Form_storage';
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
		
		$data['tipe']=  $this->form_storage_model->get_all_form_storage_listroom();
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		$data['code']=$code;
		//generate barcode
		
		
			//$data['tipe_surat']=  array("Surat Keluar", "Surat Masuk");
			//$data['form_storage'] = $this->form_storage_model->get_all_form_storage();
			//var_dump($data['team']);
			//$this->load->libraries('qrlib', $data);
			//$this->load->view('template/header', $data);
			$this->load->view('qrcodegenerator', $data);
			//$this->load->view('template/footer');
			
		}
		
		function edit_form_storage($id_form_storage)
	    {
		
	        $data['page_title'] = 'Form edit Form_storage';
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
		$data['tipe']=  $this->form_storage_model->get_all_form_storage_listroom();
	        $this->load->model('form_storage_model');

			$data['tipe_surat']=  array("Surat Keluar", "Surat Masuk");

	        $data['query']= $this->form_storage_model->get($id_form_storage);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_form_storage', $data);
	        $this->load->view('template/footer');
		
	    }

	    function edit_form_storage_masuk($id_form_storage)
	    {
		
	        $data['page_title'] = 'Form Storage Masuk';
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
		$data['tipe']=  $this->form_storage_model->get_all_form_storage_listroom();
	        $this->load->model('form_storage_model');

			$data['tipe_surat']=  array("Surat Keluar", "Surat Masuk");

	        $data['query']= $this->form_storage_model->get($id_form_storage);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_form_storage_mutasi_masuk', $data);
	        $this->load->view('template/footer');
		
	    }

	    function edit_form_storage_keluar($id_form_storage)
	    {
		
	        $data['page_title'] = 'Form Storage Masuk';
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
		$data['tipe']=  $this->form_storage_model->get_all_form_storage_listroom();
	        $this->load->model('form_storage_model');

			$data['tipe_surat']=  array("Surat Keluar", "Surat Masuk");

	        $data['query']= $this->form_storage_model->get($id_form_storage);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_form_storage_mutasi_keluar', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
			$id = $this->session->userdata('user_data');
	        $this->load->model('form_storage_model');
	        $this->form_storage_model->simpan_data($id['id_user']);
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/form_storage");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
			$id = $this->session->userdata('user_data');
		
	        $this->load->model('form_storage_model');
	        $this->form_storage_model->update_data($id['id_user']);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/form_storage");
	        //$this->load->view('input/tambah',$data);
		
	     }

	    function update_data_masuk()
		{
			$id = $this->session->userdata('user_data');
		
	        $this->load->model('form_storage_model');
	        $this->form_storage_model->update_data_masuk($id['id_user']);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/form_storage");
	        //$this->load->view('input/tambah',$data);
		
	     }

	     function update_data_keluar()
		{
			$id = $this->session->userdata('user_data');
		
	        $this->load->model('form_storage_model');
	        $this->form_storage_model->update_data_keluar($id['id_user']);
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/form_storage");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_form_storage)
        {
			$this->form_storage_model->hapus($id_form_storage);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/form_storage");
        }
		
		
}

