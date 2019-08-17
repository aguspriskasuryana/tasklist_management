<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('form_model');
		$this->load->model('task_model');
    }
	
	public function index()
	{
			$data['page_title'] = 'Daftar Form';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			$this->load->view('template/header', $data);
			$this->load->view('list_form', $data);
			$this->load->view('template/footer');
	}

	

	function getlistformups(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['ups']= $this->form_model->get_form_ups_complete();
		$data['tanggal'] = date("Y-m-d");
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
		
			$data['page_title'] = 'Daftar UPS';
			$this->load->view('template/header', $data);
			$this->load->view('list_form_ups', $data);
			$this->load->view('template/footer');
				
	}

	function getlistformupsmb2(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['ups']= $this->form_model->get_form_ups_mb2_complete();
		$data['tanggal'] = date("Y-m-d");
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
		
			$data['page_title'] = 'Daftar UPS';
			$this->load->view('template/header', $data);
			$this->load->view('list_form_ups_mb2', $data);
			$this->load->view('template/footer');
				
	}

	function getlistformupsexcel(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['tanggal'] = date("Y-m-d");

		$start 	= $this->input->post('tglstart');
		$end 	= $this->input->post('tglend');

		
		$data['ups']= $this->form_model->get_form_ups_complete();
		if ($start && $end){
			$data['ups']= $this->form_model->get_form_ups_complete_byrange($start,$end);
		}
		
		
			$data['page_title'] = 'Daftar UPS';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('list_form_ups_excel', $data);
			//$this->load->view('template/footer');
				
	}


	function getlistformupsmb2excel(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['ups']= $this->form_model->get_form_ups_mb2_complete();
		$data['tanggal'] = date("Y-m-d");

		$start 	= $this->input->post('tglstart');
		$end 	= $this->input->post('tglend');

		
		$data['ups']= $this->form_model->get_form_ups_mb2_complete();
		if ($start && $end){
			$data['ups']= $this->form_model->get_form_ups_mb2_complete_byrange($start,$end);
		}
		
		
			$data['page_title'] = 'Daftar UPS';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('list_form_ups_mb2_excel', $data);
			//$this->load->view('template/footer');
				
	}

	function modalformups(){
		$time = date('Y-m-d H:i:s');
			$id = $this->session->userdata('user_data');
			$data['id'] = $id;
			$id_form = $this->input->post('id');
	        $data['query']=$this->form_model->getformups($id_form);
		
			$data['page_title'] = 'Daftar UPS';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('modalformups', $data);
			//$this->load->view('template/footer');
				
	}

	function modalformupsmb2(){
		$time = date('Y-m-d H:i:s');
			$id = $this->session->userdata('user_data');
			$data['id'] = $id;
			$id_form = $this->input->post('id');
	        $data['query']=$this->form_model->getformupsmb2($id_form);
		
			$data['page_title'] = 'Daftar UPS MB2';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('modalformupsmb2', $data);
			//$this->load->view('template/footer');
				
	}

	function hapusformgenset($id_form_genset)
        {
			$this->form_model->hapusgenset($id_form_genset);	
			redirect('form/getlistformgenset');
        }


    function getlistformgenset(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['genset']= $this->form_model->get_form_genset_complete();
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
			$data['page_title'] = 'Daftar GENSET';
			$this->load->view('template/header', $data);
			$this->load->view('list_form_genset', $data);
			$this->load->view('template/footer');
				
	}

	function modalformgenset(){
		$time = date('Y-m-d H:i:s');
			$id = $this->session->userdata('user_data');
			$data['id'] = $id;
			$id_form = $this->input->post('id');
	        $data['query']=$this->form_model->getformgenset($id_form);
		// var_dump($data['query']);
			$data['page_title'] = 'Daftar Genset';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('modalformgenset', $data);
			//$this->load->view('template/footer');
				
	}

	
	function getlistformacliebert(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['acliebert']= $this->form_model->get_form_acliebert_complete();
		$data['tanggal'] = date("Y-m-d");
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
			$data['page_title'] = 'Daftar AC Liebert';
			$this->load->view('template/header', $data);
			$this->load->view('list_form_acliebert', $data);
			$this->load->view('template/footer');
				
	}

	function getlistformacliebertexcel(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['tanggal'] = date("Y-m-d");

		$start 	= $this->input->post('tglstart');
		$end 	= $this->input->post('tglend');

		
		$data['acliebert']= $this->form_model->get_form_acliebert_complete();
		if ($start && $end){
			$data['acliebert']= $this->form_model->get_form_acliebert_complete_byrange($start,$end);
		}
		
		
			$data['page_title'] = 'Daftar AC Liebert';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('list_form_acliebert_excel', $data);
			//$this->load->view('template/footer');
				
	}

	function getlistformacliebertmb2(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['ac_liebert_mb2_no']=  array("Data Center", "Geolokasi", "VSat");
		$data['acliebert']= $this->form_model->get_form_acliebert_mb2_complete();
		$data['tanggal'] = date("Y-m-d");
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
			$data['page_title'] = 'Daftar AC Liebert MB2';
			$this->load->view('template/header', $data);
			$this->load->view('list_form_acliebert_mb2', $data);
			$this->load->view('template/footer');
				
	}

	function modalformacliebert(){
		$time = date('Y-m-d H:i:s');
			$id = $this->session->userdata('user_data');
			$data['id'] = $id;
			$id_form = $this->input->post('id');
	        $data['query']=$this->form_model->getformacliebert($id_form);
		
			$data['page_title'] = 'Daftar Ac Liebert';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('modalformacliebert', $data);
				
	}

	function modalformacliebertmb2(){
		$time = date('Y-m-d H:i:s');
			$id = $this->session->userdata('user_data');
			$data['id'] = $id;
			$id_form = $this->input->post('id');

			
			$data['ac_liebert_mb2_no']=  array("Data Center", "Geolokasi", "VSat");
	        $data['query']=$this->form_model->getformacliebertmb2($id_form);
		
			$data['page_title'] = 'Daftar Ac Liebert MB2';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('modalformacliebertmb2', $data);
				
	}

	function hapusformacliebert($id_form_acliebert)
        {
			$this->form_model->hapusacliebert($id_form_acliebert);	
			
			redirect('form/getlistformacliebert');
        }

    function getlistformlvmdp(){
		$time = date('Y-m-d H:i:s');

		$data['tanggal'] = date("Y-m-d");
		$id = $this->session->userdata('user_data');
		$data['lvmdp']= $this->form_model->get_form_lvmdp_complete();

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
		
			$data['page_title'] = 'Daftar LVMDP';
			$this->load->view('template/header', $data);
			$this->load->view('list_form_lvmdp', $data);
			$this->load->view('template/footer');
				
	}

	function getlistformlvmdpexcel(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['tanggal'] = date("Y-m-d");

		$start 	= $this->input->post('tglstart');
		$end 	= $this->input->post('tglend');
		
		$data['lvmdp']= $this->form_model->get_form_lvmdp_complete();
		if ($start && $end){
			$data['lvmdp']= $this->form_model->get_form_lvmdp_complete_byrange($start,$end);
		}
		
		
			$data['page_title'] = 'Daftar AC Liebert';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('list_form_lvmdp_excel', $data);
			//$this->load->view('template/footer');
				
	}

	function modalformlvmdp(){
		$time = date('Y-m-d H:i:s');
			$id = $this->session->userdata('user_data');
			$data['id'] = $id;
			$id_form = $this->input->post('id');
	        $data['query']=$this->form_model->getformlvmdp($id_form);
		
			$data['page_title'] = 'Daftar LVMDP';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('modalformlvmdp', $data);
				
	}
	
	function hapusformlvmdp($id_form_lvmdp)
        {
			$this->form_model->hapuslvmdp($id_form_lvmdp);	
			
			redirect('form/getlistformlvmdp');
        }

    function getlistformkwh(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['kwh']= $this->form_model->get_form_kwh_complete();
		$data['tanggal'] = date("Y-m-d");
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
			$data['page_title'] = 'Daftar KWH';
			$this->load->view('template/header', $data);
			$this->load->view('list_form_kwh', $data);
			$this->load->view('template/footer');
				
	}

	function getlistformkwhexcel(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['tanggal'] = date("Y-m-d");

		$start 	= $this->input->post('tglstart');
		$end 	= $this->input->post('tglend');

		
		$data['kwh']= $this->form_model->get_form_kwh_complete();
		if ($start && $end){
			$data['kwh']= $this->form_model->get_form_kwh_complete_byrange($start,$end);
		}
		
		
			$data['page_title'] = 'Daftar KWH';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('list_form_kwh_excel', $data);
			//$this->load->view('template/footer');
				
	}

	function modalformkwh(){
		$time = date('Y-m-d H:i:s');
			$id = $this->session->userdata('user_data');
			$data['id'] = $id;
			$id_form = $this->input->post('id');
	        $data['query']=$this->form_model->getformkwh($id_form);
			$data['lokasi'] = $this->task_model->get_all_lokasi();
			$data['page_title'] = 'Daftar KWH';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('modalformkwh', $data);
				
	}
	
	function hapusformkwh($id_form_kwh)
        {
			$this->form_model->hapuskwh($id_form_kwh);	
			
			redirect('form/getlistformkwh');
        }


    function getlistformtangki(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['tangki']= $this->form_model->get_form_tangki_complete();

		$data['tanggal'] = date("Y-m-d");
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


		$data['x5'] = 0;
		$data['slr'] = 0;
		$b=null; // alas
		$r=null; // miring
		$br=null; // b/r
		$sj=null; // sudut juring
		$t=null; // panjang tabung
		if (($this->input->post('slr'))){
			$slr = $this->input->post('slr');
			$data['slr'] = $this->input->post('slr');
			  $r=145/2; // konstant 72.5
			  $t=304;
			  // =IF(AND(C11>=0,C11<=C13),C13-C11,IF(AND(C11>C13,C11<2*C13),C11-C13,C13))
			  // C11=$slr, C13=$r, C12=$b, C14=$br, C16=$t, E19= $ls ,F19=$vs,
			  // $br=C12/C13
			  // $sj=DEGREES(ACOS($br))*2
			  if($slr >= 0 && $slr <= $r){
			    $b=$r-$slr;
			    }
			  elseif($slr > $r && $slr < (2*$r)){
			    $b=$slr-$r;
			    }
			  else{
			    $b=$r;
			    }
			  $br=$b/$r;
			  $sj=rad2deg(acos($br))*2;
			  // (22/7)/360*2*(DEGREES(ACOS(C12/C13)))*(C13^2)
			  $lj= (22/7)/360*($sj*($r*$r)); // E18
			  // =E18*$C$16
			  $vj = $lj*$t;
			  // F18/1000 => liter juring
			  $ltj= $vj/1000;
			  /* luas sgt = 
			     2*( (1/2)*C12*C13* (SIN(RADIANS(DEGREES(ACOS(C12/C13))))) )
			  */
			  $ls = 2*(0.5*$b*$r*(sin(deg2rad(rad2deg(acos($br)))))); // E19
			  // v sgt = E19*$C$16
			  $vs=$ls*$t;
			  // l sgt = F19/1000
			  $lsg=$vs/1000;
			  // luas temberang : E18-E19
			  $lt= $lj-$ls; // E20
			  // volum temberang : E20*$C$16
			  $vt=$lt*$t; // F20
			  // liter temberang : F20/1000
			  $ltt=$vt/1000;
			  // luas lingkar : (22/7)*(C13^2)
			  $ll = (22/7)*($r*$r); // E21
			  //volum lingkaran = E21*$C$16
			  $vl = $ll*$t; // F21
			  // liter lingkaran = F21/1000
			  $ltl = $vl/1000; // G21
			  // ls > r   ==> L.Lingkaran - L.Temberang  = E21-E20
			  $x1= $ll-$lt;
			  // ls = r   ==> 1/2 L.Lingkaran = E21/2
			  $x2=$ll/2;
			  // luas daerah ukur = IF(C11=2*C13,E21,IF(AND(C11<2*C13,C11>C13),E21-E20,IF(C11=C13,E21/2,IF(AND(C11<C13,C11>0),E20,E21))))
			  if($slr==(2*$r)){
			    $x3=$ll;
				}
			  elseif(($slr<(2*$r)) && ($slr > $r)){
			    $x3=$ll-$lt;
				} 
			  elseif($slr == $r){
			    $x3=$ll/2;
				}
			  elseif($slr < $r && $slr > 0){
			    $x3=$lt;
			    }
			  else{
			    $x3=$ll; // E28
				}
			  // volum daerah ukur : E28*$C$16
			  $x4=$x3*$t; // F28
			  // liter daerah ukur : F28/1000	
			  $x5=$x4/1000;	

			  $data['x5'] = $x5;
			  }




		$data['v'] = 0;
		$data['slrh'] = 0; 
		$z=null;
		$v=null;
			if (($this->input->post('slrh'))){
				$slrh = $this->input->post('slrh');
				$data['slrh'] = $this->input->post('slrh');
				
				$r=60;
				$m=100;
				$t=1000;
				if($slrh >= 0 && $slrh <= $v){
					$v=($slrh*$r*$m)/$t;
				}	
					$v=($slrh*$r*$m)/$t;
					
				$data['v'] = $v;
			 }
		
			$data['page_title'] = 'Daftar Tangki';
			$this->load->view('template/header', $data);
			$this->load->view('list_form_tangki', $data);
			$this->load->view('template/footer');
				
	}

	function getlistformtangkiexcel(){
		$time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('user_data');
		$data['tanggal'] = date("Y-m-d");

		$start 	= $this->input->post('tglstart');
		$end 	= $this->input->post('tglend');

		
		$data['tangki']= $this->form_model->get_form_tangki_complete();
		if ($start && $end){
			$data['tangki']= $this->form_model->get_form_tangki_complete_byrange($start,$end);
		}
		
		
			$data['page_title'] = 'Daftar Tangki';
			$data['css_arr'] = array('datatables.css');
			$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
			//$this->load->view('template/header', $data);
			$this->load->view('list_form_tangki_excel', $data);
			//$this->load->view('template/footer');
				
	}
	
	function hapusformtangki($id_form_tangki)
        {
			$this->form_model->hapustangki($id_form_tangki);	
			
			redirect('form/getlistformtangki');
        }

	public function get_list_form()
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
			$data['role'] = $this->role_model->get_all_role();
			//var_dump($data['team']);
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

	    function simpan_data_acliebert_mb2()
		{
		
	        $this->load->model('role_model');
	        $id = $this->session->userdata('user_data');
			$id_user = $id['id_user'];
			$id_team = $id['id_team'];
			$tanggal = date("Y-m-d");
	        $this->form_model->simpan_data_acliebert_mb2($id_user,$id_team,$tanggal);
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/form/getlistformacliebertmb2");
	        //$this->load->view('input/tambah',$data);
		
	    }

	    function simpan_data_tangki()
		{
		
	        $this->load->model('role_model');
	        $id = $this->session->userdata('user_data');
			$id_user = $id['id_user'];
			$id_team = $id['id_team'];
			$tanggal = date("Y-m-d");
	        $this->form_model->simpan_data_tangki($id_user,$id_team,$tanggal);
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/form/getlistformtangki");
	        //$this->load->view('input/tambah',$data);
		
	    }

	     function simpan_data_genset()
		{
		
	        $this->load->model('role_model');
	        $id = $this->session->userdata('user_data');
			$id_user = $id['id_user'];
			$id_team = $id['id_team'];
			$tanggal = date("Y-m-d");
	        $this->form_model->simpan_data_genset($id_user,$id_team,$tanggal);
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/form/getlistformgenset");
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

