<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_Tape extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('inventory_tape_model');

    }
	
	public function index()
	{
		redirect(site_url()."/inventory_tape/get_list_inventory_tape");
	}
	function get_list_inventory_tape()
	{	

		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');

		$data['typ_tblselect'] = $this->input->post('btn_typ_tbl');
		//var_dump($this->input->post('xxx'));
		if (!($data['typ_tblselect'])){
			$data['typ_tblselect'] = '4';
		}

		$data['typ_tbl']= $this->inventory_tape_model->get_all_typ_tbl();

		

		$data['inventory_tape']= $this->inventory_tape_model->get_all_inventory_tapebytype($data['typ_tblselect']);

		$data['catridgeA3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'A.3');
		$data['catridgeB3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'B.3');
		$data['catridgeC3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'C.3');
		$data['catridgeD3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'D.3');
		$data['catridgeE3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'E.3');
		$data['catridgeF3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'F.3');
		$data['catridgeG3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'G.3');
		$data['catridgeH3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'H.3');
		$data['catridgeI3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'I.3');
		$data['catridgeJ3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'J.3');

		$data['catridgeA2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'A.2');
		$data['catridgeB2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'B.2');
		$data['catridgeC2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'C.2');
		$data['catridgeD2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'D.2');
		$data['catridgeE2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'E.2');
		$data['catridgeF2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'F.2');
		$data['catridgeG2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'G.2');
		$data['catridgeH2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'H.2');
		$data['catridgeI2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'I.2');
		$data['catridgeJ2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'J.2');

		$data['catridgeA1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'A.1');
		$data['catridgeB1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'B.1');
		$data['catridgeC1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'C.1');
		$data['catridgeD1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'D.1');
		$data['catridgeE1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'E.1');
		$data['catridgeF1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'F.1');
		$data['catridgeG1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'G.1');
		$data['catridgeH1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'H.1');
		$data['catridgeI1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'I.1');
		$data['catridgeJ1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'J.1');
		

		$data['count_silo']= $this->inventory_tape_model->get_count_by_loc(1,$data['typ_tblselect']);
		$data['count_library_catridge']= $this->inventory_tape_model->get_count_by_loc(2,$data['typ_tblselect']);
		$data['count_library_paper']= $this->inventory_tape_model->get_count_by_loc(3,$data['typ_tblselect']);
		//var_dump($data['inventory_tape']);
		
			$data['page_title'] = 'Daftar Inventory_Tape';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_inventory_tape', $data);
			$this->load->view('template/footer');
	
	}
	function tambah_inventory_tape()
	{
		
		$data['page_title'] = 'Form Tambah Inventory_Tape';
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


		$data['typ_tblselect'] = $this->input->post('btn_typ_tbl');
		//var_dump($this->input->post('xxx'));
		if (!($data['typ_tblselect'])){
			$data['typ_tblselect'] = '4';
		}

		$data['typ_tbl']= $this->inventory_tape_model->get_all_typ_tbl();

		

		$data['inventory_tape']= $this->inventory_tape_model->get_all_inventory_tapebytype($data['typ_tblselect']);

		$data['catridgeA3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'A.3');
		$data['catridgeB3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'B.3');
		$data['catridgeC3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'C.3');
		$data['catridgeD3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'D.3');
		$data['catridgeE3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'E.3');
		$data['catridgeF3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'F.3');
		$data['catridgeG3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'G.3');
		$data['catridgeH3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'H.3');
		$data['catridgeI3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'I.3');
		$data['catridgeJ3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'J.3');

		$data['catridgeA2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'A.2');
		$data['catridgeB2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'B.2');
		$data['catridgeC2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'C.2');
		$data['catridgeD2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'D.2');
		$data['catridgeE2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'E.2');
		$data['catridgeF2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'F.2');
		$data['catridgeG2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'G.2');
		$data['catridgeH2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'H.2');
		$data['catridgeI2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'I.2');
		$data['catridgeJ2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'J.2');

		$data['catridgeA1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'A.1');
		$data['catridgeB1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'B.1');
		$data['catridgeC1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'C.1');
		$data['catridgeD1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'D.1');
		$data['catridgeE1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'E.1');
		$data['catridgeF1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'F.1');
		$data['catridgeG1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'G.1');
		$data['catridgeH1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'H.1');
		$data['catridgeI1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'I.1');
		$data['catridgeJ1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'J.1');
		

		$data['count_silo']= $this->inventory_tape_model->get_count_by_loc(1,$data['typ_tblselect']);
		$data['count_library_catridge']= $this->inventory_tape_model->get_count_by_loc(2,$data['typ_tblselect']);
		$data['count_library_paper']= $this->inventory_tape_model->get_count_by_loc(3,$data['typ_tblselect']);
		
		//if(!$this->input->post()) {
			$data['typ_tbl'] = $this->inventory_tape_model->get_all_typ_tbl();
			$data['mch_tbl'] = $this->inventory_tape_model->get_all_mch_tbl();
			$data['medcls_tbl'] = $this->inventory_tape_model->get_all_medcls_tbl();
			$data['trans_tbl'] = $this->inventory_tape_model->get_all_trans_tbl();
			$data['loc_tbl'] = $this->inventory_tape_model->get_all_loc_tbl();

			//var_dump($data['typ_tbl']);

			$data['inventory_tape'] = $this->inventory_tape_model->get_all_inventory_tape();
			//var_dump($data['team']);
			$this->load->view('template/header', $data);
			$this->load->view('form_tambah_inventory_tape', $data);
			$this->load->view('template/footer');
			
		}
		
		function edit_inventory_tape($id_inventory_tape)
	    {
		
	        $data['page_title'] = 'Form edit Inventory_Tape';
	        $this->load->model('inventory_tape_model');

	        $data['query']=
	         $this->inventory_tape_model->get($id_inventory_tape);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('form_edit_inventory_tape', $data);
	        $this->load->view('template/footer');
		
	    }

	    function scan_inventory_tape()
	    {


			$id = $this->session->userdata('user_data');
		
	        $data['page_title'] = 'Form Search Tape By Code';
	        $this->load->model('inventory_tape_model');
	        $data['scannedQR']= "";
	        $data['inventory_tape']= "";
	        $data['loc_detail']= $this->input->post('loc_detail');
	        if ($this->input->post('scanned-QR')){
	        	$data['scannedQR']= $this->input->post('scanned-QR');
	        	$sqr = substr($data['scannedQR'],0,-1); 
				$data['inventory_tape']= $this->inventory_tape_model->get_all_inventory_tapebyvolid($sqr);

				if($data['inventory_tape']){
					foreach($data['inventory_tape'] as $list){
						$user_id= $id['id_user'];
						$tape_volid=$list['TAPE_VOLID'];
						$loc_detail=$list['LOC_DETAIL'];

	        			$this->inventory_tape_model->simpan_data_stock_opname($tape_volid,$user_id,$loc_detail);
						
					}
				}
	        }

			$data['loc_tbl'] = $this->inventory_tape_model->get_all_loc_tbl();
			$data['loc_detail_tbl'] = $this->inventory_tape_model->get_all_loc_detail_tbl();

			//$data['query']=$this->inventory_tape_model->get($id_inventory_tape);
	        //$this->load->helper('tanggal');
	        $this->load->view('template/header', $data);
	        $this->load->view('inventory_tape_scanner', $data);
	        $this->load->view('template/footer');
		
	    }

	    
		
		function simpan_data()
		{
		
	        $this->load->model('inventory_tape_model');
	        $this->inventory_tape_model->simpan_data();
	        $data['typ_tblselect'] = $this->input->post('typ_id');
		//var_dump($this->input->post('xxx'));
		if (!($data['typ_tblselect'])){
			$data['typ_tblselect'] = '4';
		}

		$data['typ_tbl']= $this->inventory_tape_model->get_all_typ_tbl();

		

		$data['inventory_tape']= $this->inventory_tape_model->get_all_inventory_tapebytype($data['typ_tblselect']);

		$data['catridgeA3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'A.3');
		$data['catridgeB3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'B.3');
		$data['catridgeC3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'C.3');
		$data['catridgeD3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'D.3');
		$data['catridgeE3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'E.3');
		$data['catridgeF3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'F.3');
		$data['catridgeG3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'G.3');
		$data['catridgeH3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'H.3');
		$data['catridgeI3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'I.3');
		$data['catridgeJ3'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'J.3');

		$data['catridgeA2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'A.2');
		$data['catridgeB2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'B.2');
		$data['catridgeC2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'C.2');
		$data['catridgeD2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'D.2');
		$data['catridgeE2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'E.2');
		$data['catridgeF2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'F.2');
		$data['catridgeG2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'G.2');
		$data['catridgeH2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'H.2');
		$data['catridgeI2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'I.2');
		$data['catridgeJ2'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'J.2');

		$data['catridgeA1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'A.1');
		$data['catridgeB1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'B.1');
		$data['catridgeC1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'C.1');
		$data['catridgeD1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'D.1');
		$data['catridgeE1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'E.1');
		$data['catridgeF1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'F.1');
		$data['catridgeG1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'G.1');
		$data['catridgeH1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'H.1');
		$data['catridgeI1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'I.1');
		$data['catridgeJ1'] = $this->inventory_tape_model->get_count_by_loc_detail(2,$data['typ_tblselect'],'J.1');
		

		$data['count_silo']= $this->inventory_tape_model->get_count_by_loc(1,$data['typ_tblselect']);
		$data['count_library_catridge']= $this->inventory_tape_model->get_count_by_loc(2,$data['typ_tblselect']);
		$data['count_library_paper']= $this->inventory_tape_model->get_count_by_loc(3,$data['typ_tblselect']);
		//var_dump($data['inventory_tape']);
		
			$data['page_title'] = 'Daftar Inventory_Tape';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_inventory_tape', $data);
			$this->load->view('template/footer');
		
	    }
	    function update_data()
		{
		
	        $this->load->model('inventory_tape_model');
	        $this->inventory_tape_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/inventory_tape");
	        //$this->load->view('input/tambah',$data);
		
	     }
		 
	    function hapus($id_inventory_tape)
        {
			$this->inventory_tape_model->hapus($id_inventory_tape);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/inventory_tape");
        }
		
		
}

