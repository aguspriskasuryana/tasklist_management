<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel_sdp extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('panel_sdp_model');
    }
	
	public function index()
	{
			redirect(site_url()."/panel_sdp/get_list_panel_sdp");
	}
	public function get_list_panel_sdp()
	{	
		$this->load->model('panel_sdp_model');


		$data['tanggal_ready']= $this->panel_sdp_model->get_all_tanggalready();
		$month = date('Y-m-d');
		if ($data['tanggal_ready']){
			$month = $data['tanggal_ready'][0]['tanggal'];
		}
		if ($this->input->post('tgl')){
			$month = $this->input->post('tgl');
		}

		$nama_perangkat = "";
		if ($this->input->post('nama_perangkat')){
			$nama_perangkat = $this->input->post('nama_perangkat');
		}

		$nama_panel = "";
		if ($this->input->post('nama_panel')){
			$nama_panel = $this->input->post('nama_panel');
		}

		$mcb = "";
		if ($this->input->post('mcb')){
			$mcb = $this->input->post('mcb');
		}

		$koordinat_rak = "";
		if ($this->input->post('koordinat_rak')){
			$koordinat_rak = $this->input->post('koordinat_rak');
		}

		$phase = "";
		if ($this->input->post('phase')){
			$phase = $this->input->post('phase');
		}

		$nama_phase = "";
		if ($this->input->post('nama_phase')){
			$nama_phase = $this->input->post('nama_phase');
		}

//var_dump($nama_perangkat);

		$id = $this->session->userdata('user_data');

		$data['nama_panel']= $this->panel_sdp_model->get_all_nama_panel($month);		
		$data['nama_perangkat']= $this->panel_sdp_model->get_all_nama_perangkat($month);
		$data['mcb']= $this->panel_sdp_model->get_all_mcb();
		$data['koordinat_rak']= $this->panel_sdp_model->get_all_koordinat_rak($month);
		$data['phase']= $this->panel_sdp_model->get_all_phase($month);
		$data['nama_phase']= $this->panel_sdp_model->get_all_nama_phase($month);


		$data['panel_sdp']= $this->panel_sdp_model->get_all_panel_sdp($month,$nama_perangkat,$nama_panel,$mcb,$koordinat_rak,$phase,$nama_phase);


		$data['tgl']=$month;
		$data['nama_panel_select']=$nama_panel;
		$data['nama_perangkat_select']=$nama_perangkat;
		$data['mcb_select']=$mcb;
		$data['koordinat_rak_select']=$koordinat_rak;
		$data['phase_select']=$phase;
		$data['nama_phase_select']=$nama_phase;
		//var_dump($data['panel_sdp']);
			$data['page_title'] = 'Daftar Panel';		
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
			$this->load->view('list_panel_sdp', $data);
			$this->load->view('template/footer');
	
	}

	public function get_list_panel_sdp_excel()
	{	

		$data['tanggal_ready']= $this->panel_sdp_model->get_all_tanggalready();
		$month = date('Y-m-d');
		if ($data['tanggal_ready']){
			$month = $data['tanggal_ready'][0]['tanggal'];
		}
		if ($this->input->post('tgl')){
			$month = $this->input->post('tgl');
		}

		$nama_perangkat = "";
		if ($this->input->post('nama_perangkat')){
			$nama_perangkat = $this->input->post('nama_perangkat');
		}

		$nama_panel = "";
		if ($this->input->post('nama_panel')){
			$nama_panel = $this->input->post('nama_panel');
		}

		$mcb = "";
		if ($this->input->post('mcb')){
			$mcb = $this->input->post('mcb');
		}

		$koordinat_rak = "";
		if ($this->input->post('koordinat_rak')){
			$koordinat_rak = $this->input->post('koordinat_rak');
		}

		$phase = "";
		if ($this->input->post('phase')){
			$phase = $this->input->post('phase');
		}
		$nama_phase = "";
		if ($this->input->post('nama_phase')){
			$nama_phase = $this->input->post('nama_phase');
		}

//var_dump($nama_perangkat);

		$id = $this->session->userdata('user_data');

		$data['nama_panel']= $this->panel_sdp_model->get_all_nama_panel($month);		
		$data['nama_perangkat']= $this->panel_sdp_model->get_all_nama_perangkat($month);
		$data['mcb']= $this->panel_sdp_model->get_all_mcb();
		$data['koordinat_rak']= $this->panel_sdp_model->get_all_koordinat_rak($month);
		$data['phase']= $this->panel_sdp_model->get_all_phase($month);
		$data['nama_phase']= $this->panel_sdp_model->get_all_nama_phase($month);


		$data['panel_sdp']= $this->panel_sdp_model->get_all_panel_sdp($month,$nama_perangkat,$nama_panel,$mcb,$koordinat_rak,$phase,$nama_phase);


		$data['tgl']=$month;
		$data['nama_panel_select']=$nama_panel;
		$data['nama_perangkat_select']=$nama_perangkat;
		$data['mcb_select']=$mcb;
		$data['koordinat_rak_select']=$koordinat_rak;
		$data['phase_select']=$phase;
		$data['nama_phase_select']=$phase;
		//var_dump($data['panel_sdp']);
			$data['page_title'] = 'Daftar Panel';		
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

			//$this->load->view('template/header', $data);
			$this->load->view('list_panel_sdp_excel', $data);
			//$this->load->view('template/footer');
	
	}

	public function get_list_panel_sdp_detail_kpi()
	{	

		$data['tanggal_ready']= $this->panel_sdp_model->get_all_tanggalready();
		$month = date('Y-m-d');
		if ($data['tanggal_ready']){
			$month = $data['tanggal_ready'][0]['tanggal'];
		}
		if ($this->input->post('tgl')){
			$month = $this->input->post('tgl');
		}

		$nama_perangkat = "";
		if ($this->input->post('nama_perangkat')){
			$nama_perangkat = $this->input->post('nama_perangkat');
		}

		$data['nama_perangkat']= $this->panel_sdp_model->get_all_nama_perangkat($month);
		
		$data['panel_sdp_detail_kpi_perangkat']= $this->panel_sdp_model->get_all_panel_sdp_detail_kpi_with_nama_perangkat($month, $nama_perangkat);	

		//var_dump($data['panel_sdp_detail_kpi_perangkat']);
		$data['panel_sdp_detail_kpi']= $this->panel_sdp_model->get_all_panel_sdp_detail_kpi($month);


		$data['panel_sdp_detail_kpi_mcb_amount']= $this->panel_sdp_model->get_all_panel_sdp_detail_kpi_mcb_amount($month);
		


		$data['tgl']=$month;
		$data['nama_perangkat_select']=$nama_perangkat;
		//var_dump($data['panel_sdp']);
			$data['page_title'] = 'Daftar Panel';		
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
			$this->load->view('list_panel_sdp_detail_kpi', $data);
			$this->load->view('template/footer');
	
	}

	public function get_list_panel_sdp_detail_kpi_excel($tgl)
	{	

		$data['tanggal_ready']= $this->panel_sdp_model->get_all_tanggalready();
		$month = date('Y-m-d');
		if ($data['tanggal_ready']){
			$month = $data['tanggal_ready'][0]['tanggal'];
		}
		if ($this->input->post('tgl')){
			$month = $this->input->post('tgl');
		}

		$nama_perangkat = "";
		if ($this->input->post('nama_perangkat')){
			$nama_perangkat = $this->input->post('nama_perangkat');
		}

		$data['nama_perangkat']= $this->panel_sdp_model->get_all_nama_perangkat($month);
		
		$data['panel_sdp_detail_kpi_perangkat']= $this->panel_sdp_model->get_all_panel_sdp_detail_kpi_with_nama_perangkat($month, $nama_perangkat);	

		$data['panel_sdp_detail_kpi_mcb_amount']= $this->panel_sdp_model->get_all_panel_sdp_detail_kpi_mcb_amount($month);
		
		//var_dump($data['panel_sdp_detail_kpi_perangkat']);
		$data['panel_sdp_detail_kpi']= $this->panel_sdp_model->get_all_panel_sdp_detail_kpi($month);
		


		$data['tgl']=$month;
		$data['nama_perangkat_select']=$nama_perangkat;
		//var_dump($data['panel_sdp']);
			$data['page_title'] = 'Daftar Panel';		
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

			//$this->load->view('template/header', $data);
			$this->load->view('list_panel_sdp_detail_kpi_excel', $data);
			//$this->load->view('template/footer');
	
	}

	//tambah_data_panel_sdp

	public function get_list_panel_sdp_tambah()
	{	

		$data['tanggal_ready']= $this->panel_sdp_model->get_all_tanggalready();
		$month = date('Y-m-d');
		if ($data['tanggal_ready']){
			$month = $data['tanggal_ready'][0]['tanggal'];
		}
		if ($this->input->post('tgl')){
			$month = $this->input->post('tgl');
		}

		$nama_perangkat = "";
		if ($this->input->post('nama_perangkat')){
			$nama_perangkat = $this->input->post('nama_perangkat');
		}

		$nama_panel = "";
		if ($this->input->post('nama_panel')){
			$nama_panel = $this->input->post('nama_panel');
		}

		$mcb = "";
		if ($this->input->post('mcb')){
			$mcb = $this->input->post('mcb');
		}

		$koordinat_rak = "";
		if ($this->input->post('koordinat_rak')){
			$koordinat_rak = $this->input->post('koordinat_rak');
		}

		$phase = "";
		if ($this->input->post('phase')){
			$phase = $this->input->post('phase');
		}

		$nama_phase = "";
		if ($this->input->post('nama_phase')){
			$nama_phase = $this->input->post('nama_phase');
		}

//var_dump($nama_perangkat);

		$id = $this->session->userdata('user_data');

		$data['nama_panel']= $this->panel_sdp_model->get_all_nama_panel($month);		
		$data['nama_perangkat']= $this->panel_sdp_model->get_all_nama_perangkat($month);
		$data['mcb']= $this->panel_sdp_model->get_all_mcb();
		$data['koordinat_rak']= $this->panel_sdp_model->get_all_koordinat_rak($month);
		$data['phase']= $this->panel_sdp_model->get_all_phase($month);
		$data['tanggal_ready']= $this->panel_sdp_model->get_all_tanggalready();


		$data['panel_sdp_cek']= $this->panel_sdp_model->get_all_panel_sdp($month,$nama_perangkat,$nama_panel,$mcb,$koordinat_rak,$phase,$nama_phase);

		$data['panel_sdp_temp']= $this->panel_sdp_model->get_all_panel_sdp_template();
		var_dump($data['panel_sdp_cek']);
		if($data['panel_sdp_cek']){
		}else {

			foreach($data['panel_sdp_temp'] as $list){
				$this->panel_sdp_model->simpan_data($list['nama_panel'],$list['mcb'],$list['load'],$list['phase'],$list['nama_phase'],$list['nama_perangkat'],$list['koordinat_rak'],$list['koordinat_legrand'],0,0,$list['daya_semu'],$list['daya'],0,$list['cos_phi'],$list['daya_semu'],$list['daya'],$list['status'],$month);
			}
		}

		$data['tanggal_ready']= $this->panel_sdp_model->get_all_tanggalready();
		$data['panel_sdp']= $this->panel_sdp_model->get_all_panel_sdp($month,$nama_perangkat,$nama_panel,$mcb,$koordinat_rak,$phase,$nama_phase);

		$data['tgl']=$month;
		$data['nama_panel_select']=$nama_panel;
		$data['nama_perangkat_select']=$nama_perangkat;
		$data['mcb_select']=$mcb;
		$data['koordinat_rak_select']=$koordinat_rak;
		$data['phase_select']=$phase;
		$data['nama_phase_select']=$nama_phase;
		//var_dump($data['panel_sdp']);
			$data['page_title'] = 'Daftar Panel';		
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
			$this->load->view('list_panel_sdp', $data);
			$this->load->view('template/footer');
	
	}

	function tambah_panel_sdp()
	{
		
		$data['page_title'] = 'Form Tambah Panel_sdp';
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
			$data['panel_sdp'] = $this->panel_sdp_model->get_all_panel_sdp();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_panel_sdp', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_panel_sdp($id_panel_sdp)
	    {
		
	        $data['page_title'] = 'Form edit Panel_sdp';
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
	        $this->load->model('panel_sdp_model');

	        $data['query']= $this->panel_sdp_model->get($id_panel_sdp);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_panel_sdp', $data);
	        $this->load->view('template/footer');
		
	    }
		
		function simpan_data()
		{
		
	        $this->load->model('panel_sdp_model');
	        $this->panel_sdp_model->simpan_data();
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/panel_sdp");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data_list()
		{
		
        $this->load->model('panel_sdp_model');

		$data['tanggal_ready']= $this->panel_sdp_model->get_all_tanggalready();
		$month = date('Y-m-d');
		if ($data['tanggal_ready']){
			$month = $data['tanggal_ready'][0]['tanggal'];
		}
		if ($this->input->post('tgl')){
			$month = $this->input->post('tgl');
		}
		

		$nama_perangkat = "";
		if ($this->input->post('nama_perangkat')){
			$nama_perangkat = $this->input->post('nama_perangkat');
		}

		$nama_panel = "";
		if ($this->input->post('nama_panel')){
			$nama_panel = $this->input->post('nama_panel');
		}

		$mcb = "";
		if ($this->input->post('mcb')){
			$mcb = $this->input->post('mcb');
		}

		$koordinat_rak = "";
		if ($this->input->post('koordinat_rak')){
			$koordinat_rak = $this->input->post('koordinat_rak');
		}

		$phase = "";
		if ($this->input->post('phase')){
			$phase = $this->input->post('phase');
		}
		$nama_phase = "";
		if ($this->input->post('nama_phase')){
			$nama_phase = $this->input->post('nama_phase');
		}


		$id = $this->session->userdata('user_data');

		$data['panel_sdp']= $this->panel_sdp_model->get_all_panel_sdp($month,$nama_perangkat,$nama_panel,$mcb,$koordinat_rak,$phase,$nama_phase);

		if($data['panel_sdp']){

			foreach($data['panel_sdp'] as $list){
				$current_amperex = $this->input->post($list['id_panel_sdp'].'_current_ampere');
				$voltage_1_phasex = $this->input->post($list['id_panel_sdp'].'_voltage_1_phase');
				$daya_semux = $this->input->post($list['id_panel_sdp'].'_daya_semu');
				$dayax = $this->input->post($list['id_panel_sdp'].'_daya');
				$phasex = $this->input->post($list['id_panel_sdp'].'_phase');
				$groundingx = $this->input->post($list['id_panel_sdp'].'_grounding');
				$boolean = false;


				if (($current_amperex) && ($current_amperex != $list['current_ampere'])){
					$boolean = true;
				}
				if (($voltage_1_phasex) && ($voltage_1_phasex != $list['voltage_1_phase'])){
					$boolean = true;
				}
				if (($daya_semux) && ($daya_semux != $list['daya_semu'])){
					$boolean = true;
				}
				if (($dayax) && ($dayax != $list['daya'])){
					$boolean = true;
				}
				if(($groundingx != $list['grounding']) && ($groundingx != $list['grounding'])){
					$boolean = true;
				}
				if(($phasex) && ($phasex != $list['phase'])){
					$boolean = true;
				}
				if ($boolean){
				$this->panel_sdp_model->update_data_list($list['id_panel_sdp'], $current_amperex, $voltage_1_phasex, $daya_semux, $dayax, $groundingx);					
				}
				
			}

		}


		$data['panel_sdp']= $this->panel_sdp_model->get_all_panel_sdp($month,$nama_perangkat,$nama_panel,$mcb,$koordinat_rak,$phase,$nama_phase);

		$data['nama_panel']= $this->panel_sdp_model->get_all_nama_panel($month);		
		$data['nama_perangkat']= $this->panel_sdp_model->get_all_nama_perangkat($month);
		$data['mcb']= $this->panel_sdp_model->get_all_mcb();
		$data['koordinat_rak']= $this->panel_sdp_model->get_all_koordinat_rak($month);
		$data['phase']= $this->panel_sdp_model->get_all_phase($month);
		$data['nama_phase']= $this->panel_sdp_model->get_all_nama_phase($month);
		$data['tanggal_ready']= $this->panel_sdp_model->get_all_tanggalready();

		$data['tgl']=$month;
		$data['nama_panel_select']=$nama_panel;
		$data['nama_perangkat_select']=$nama_perangkat;
		$data['mcb_select']=$mcb;
		$data['koordinat_rak_select']=$koordinat_rak;
		$data['phase_select']=$phase;
		$data['nama_phase_select']=$nama_phase;
		
		//var_dump($phase);

	        $this->panel_sdp_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        
	    $data['page_title'] = 'Daftar Panel';		
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
			$this->load->view('list_panel_sdp', $data);
			$this->load->view('template/footer');
		
	     }

	      function update_data_list_panel()
		{
		
	        $this->load->model('panel_sdp_model');
	        $this->panel_sdp_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/panel_sdp");
	        //$this->load->view('input/tambah',$data);
		
	     }

	     
		 
	    function hapus($id_panel_sdp)
        {
			$this->panel_sdp_model->hapus($id_panel_sdp);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/panel_sdp");
        }
		
		
}

