<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
    {
        parent::__construct();
		$this->load->library('csrf');
		$this->load->model('perangkat_model');
		$this->load->model('user_model');
		$this->load->model('task_model');
		$this->load->model('team_model');
		$this->load->model('form_model');
		$this->load->model('balakar_model');
    }
	
	function input_dashboard()
	{
		$data['page_title'] = 'Form Input Dashboard';
		$this->load->view('template/header', $data);
		$this->load->view('form_update_dashboard',$data);
		$this->load->view('template/footer');
	
	}

	function dashboard2()
	{
		
		$data['page_title'] = 'Form Input Dashboard';

		$data['perangkat'] = $this->perangkat_model->get_nilai_dashboard();
		$data['user'] = $this->user_model->get_all_user();
		$data['userbycompany'] = $this->user_model->get_countuseridbycompany();

		$date = date('Y-m-d');

		$thismonth = date('Y-m');
		$month = date("Y-m", strtotime("first day of previous month"));
		$firstdateofpreviosmonth = date("Y-m", strtotime("first day of previous month"));
		//hapus 2 bulan sebelumnya pada tasklist hictorytemporary
		$this->task_model->deletehistorytemporary($firstdateofpreviosmonth);
		$time = date('Y-m-d H:i:s');
		//var_dump($time);
		$id = $this->session->userdata('user_data');


		$team = $this->team_model->get_allteam_in_history_task($month);
		$countuser = $this->task_model->get_countuseridby_period($month);
		$data['form_ups'] = $this->form_model->get_form_ups_limit5("1");
		$data['form_ups2'] = $this->form_model->get_form_ups_limit5("2");

		//var_dump($team);
		$data['countuser'] = $countuser;
		$data['team'] = $team;
		$data['value'] = "";
		$data['dataemployeepower'] = array();
		foreach($team as $teams){
			$task = $this->task_model->get_task_persen_by_period($thismonth,$teams['id_team']);
			//var_dump($task[$x]['tepatpersen']);
			array_push($data['dataemployeepower'],$task);
		}
		//var_dump($data['form_ups']);
		asort($data['dataemployeepower']);


		//$yesterday = date("Y-m-d", strtotime("yesterday"));

		$yesterday = $this->task_model->get_maxdate();
		$yesterday = $yesterday[0]['tanggal'];

		$teamyesterday =  $this->task_model->get_countidteambydatehistory($yesterday);
		$data['yesterday'] = $yesterday;
		$data['dataemployeepoweryesterday'] = array();
		//foreach($teamyesterday as $teamyesterdays){
		foreach($team as $teams){
			$cekteam = $this->task_model->get_cek_teamada($yesterday,$teams['id_team']);
			
			if($cekteam){
				$taskx = $this->task_model->get_task_persen_by_period_yes($yesterday,$teams['id_team']);
				array_push($data['dataemployeepoweryesterday'],$taskx);
				//var_dump($taskx);
			} else {
				$a[0] = array("team"=>$teams['nama'],"tepatpersen"=>"0","lambatpersen"=>"0");
				array_push($data['dataemployeepoweryesterday'],$a);
			}
			
		}
		//var_dump($data['form_ups']);
		asort($data['dataemployeepoweryesterday']);


		$tanggalPeriod = $this->task_model->get_tanggal_by_period($month); 

		$data['dataDate'] = array();
		foreach($tanggalPeriod as $tanggalPeriodS){
			$persenbydate = $this->task_model->get_task_persen_day_by_period($tanggalPeriodS['tanggal']);
			array_push($data['dataDate'],$persenbydate);
		}

		$data['public_note'] = $this->perangkat_model->get_public_note();
		$data['public_note_expired'] = $this->perangkat_model->get_public_note_expired();

		//var_dump($data['public_note']);

		$dateapp = date('Y-m-d');
		$g = date('G');
		if ($g < 8){
			$dateapp =  date('Y-m-d', strtotime('yesterday'));
		}

		$data['statusAppallday'] = $this->task_model->get_all_now_kabag_statusbribelumparaf($dateapp);
		$data['statusApp'] = $this->task_model->get_now_kabag_statusbribelumparaf($dateapp);
		$data['akses_kunjungan'] = $this->user_model->get_akses_kunjunganhariini($date);
		$data['akses_kunjungan_month'] = $this->user_model->get_akses_kunjungan($thismonth);
		$data['user_aktif'] = $this->user_model->get_kartu_aktif_innerjoin();

		$data['user_late_month'] = $this->user_model->get_countuseridLateby_period($thismonth);
		$data['user_late_today'] = $this->user_model->get_countuseridLateby_period($date);
		$temp_akses = $this->user_model->get_kartu_aktif_innerjoin();

		$data['employee_aktif_today'] = array();
			foreach($temp_akses as $temp_aksess){
				if ($temp_aksess['instansi'] == 'PT BRI SYARIAH'){
					$temp = $this->user_model->get_list_kartu_aktif_by_shiftforSyariah($temp_aksess['indeks_tamu'],$temp_aksess['jam_masuk'], $temp_aksess['nama'],$temp_aksess['jabatan'],$temp_aksess['instansi'],$temp_aksess['jam_masuk'],$temp_aksess['jam_keluar'],$temp_aksess['status'],$temp_aksess['id_kartu']);
					if ($temp){
					array_push($data['employee_aktif_today'],$temp);
					}
				}else {
					$temp = $this->user_model->get_list_kartu_aktif_by_shift($temp_aksess['indeks_tamu'],$temp_aksess['jam_masuk'], $temp_aksess['nama'],$temp_aksess['jabatan'],$temp_aksess['instansi'],$temp_aksess['jam_masuk'],$temp_aksess['jam_keluar'],$temp_aksess['status'],$temp_aksess['id_kartu']);
					if ($temp){
					array_push($data['employee_aktif_today'],$temp);
					}
				}
				
			}


		
		$data['user_earlyhome_month'] = $this->user_model->get_countuseridEHby_period($thismonth);
		$data['user_earlyhome_today'] = $this->user_model->get_countuseridEHby_period($date);
		$data['balakar'] = $this->balakar_model->get_all_balakar();
		
		$data['d1']=$data['perangkat'][7]['nilai'];
		$data['d2']=$data['perangkat'][6]['nilai'];
		$data['d3']=$data['perangkat'][5]['nilai'];
		$data['d4']=$data['perangkat'][4]['nilai'];
		$data['d5']=$data['perangkat'][3]['nilai'];
		$data['d6']=$data['perangkat'][2]['nilai'];
		$data['d7']=$data['perangkat'][1]['nilai'];
		$data['d8']=$data['perangkat'][0]['nilai'];
		//$this->load->view('template/header', $data);



		$this->load->library('ckeditor');
		$this->load->library('ckfinder');



		$this->ckeditor->basePath = base_url().'asset/ckeditor/';

		$this->ckeditor->config['language'] = 'us';
		$this->ckeditor->config['width'] = 'auto';
		$this->ckeditor->config['height'] = '100px';   
		$this->ckeditor->config['skin'] = 'office2013';         

		$data['page_title'] = 'Form Edit Risalah';
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

		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
		$this->load->view('dashboard2',$data);
		//$this->load->view('template/footer');
		
	//$this->load->view('sign_in');
	}
	
	function update_dashboard()
	{
		for($a = 1;$a<9;$a++){
		$this->perangkat_model->update_dashboard($a,$this->input->post($a));
		}
		redirect('home');
	}
	
	public function index()
	{
		$data['perangkat'] = $this->perangkat_model->get_nilai_dashboard();


	$this -> load -> library('Mobile_Detect');
    $detect = new Mobile_Detect();
    //var_dump($detect);
    //var_dump($detect->isMobile());
    if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
        $this->load->view('sign_in',$data);
    } else {
		  redirect('home/dashboard2'); 	
    	//$this->load->view('index_home',$data); 
    	//$this->load->view('sign_in',$data);
    }


		//$this->load->view('maintenance',$data);
	}
	
		public function index1()
	{	
		$data['avail_ac'] = $this->perangkat_model->get_avail_perperangkat_perarea(3,1);
		$perangkat = $this->perangkat_model->get_all_perperangkat_perarea(3,1);
		$template_perform_ac = $this->perangkat_model->get_template_perform(3);
		foreach($perangkat as $perangkat1){
			$data['perform_ac'][] = $this->perangkat_model->get_perform_perangkat($perangkat1['id_detil_perangkat']);
		}
		$nilai_akhir = 0;
		$parameter_ac = 0;
		$data['banyak_ac'] = sizeof($perangkat);
		foreach($data['perform_ac'] as $nilai_perform){
			if($nilai_perform != null){
				$parameter_ac += sizeof($nilai_perform);
				foreach($nilai_perform as $nilai_perform1){
					if((int)$nilai_perform1['nilai'] > (int)$template_perform_ac['normal_atas'] || (int)$nilai_perform1['nilai'] < (int)$template_perform_ac['normal_bawah']){
					$nilai_akhir += 0; 
					//var_dump($nilai_akhir);
					} else{
						$nilai_akhir += 100;
						}
				}
			}
		}
		$data['perform_ac_akhir'] = $nilai_akhir/$parameter_ac;
		$data['page_title'] = 'Home';
		$this->load->view('template/header', $data);
		$this->load->view('home',$data);
		$this->load->view('template/footer');
	}
	
	public function detil_perangkat_pertahun($jenisperangkat)
	{
			$data['page_title'] = 'Detil Perangkat';
			$tahun_now = date('Y');
			$bulan = array(
			'nama'=>array('January','February','March','April','May','June','July','August','September','October','November','Desember'),
			'angka'=>array('1','2','3','4','5','6','7','8','9','10','11','12')
			);
			
		$perangkat = $this->perangkat_model->get_all_perperangkat_perarea($jenisperangkat,1);
		$data['nama_perangkat'] = $perangkat[0]['nama_perangkat'];
		foreach($perangkat as $perangkat1){
			$data['perform_ac'][] = $this->perangkat_model->get_perform_perangkat($perangkat1['id_detil_perangkat']);
		}
			//var_dump($data['perform_ac']);
			$nilai_akhir = array('1'=>array(),'2'=>array(),'3'=>array(),'4'=>array(),'5'=>array(),'6'=>array(),'7'=>array(),'8'=>array(),'9'=>array(),'10'=>array(),'11'=>array(),'12'=>array());
			$jumlah_data = array('1'=>array(),'2'=>array(),'3'=>array(),'4'=>array(),'5'=>array(),'6'=>array(),'7'=>array(),'8'=>array(),'9'=>array(),'10'=>array(),'11'=>array(),'12'=>array());
		foreach($data['perform_ac'] as $nilai_perform){
			if($nilai_perform != null){
				foreach($nilai_perform as $nilai_perform1){
					$waktu = date_parse($nilai_perform1['waktu']);
					//var_dump($nilai_perform1['nilai']);
					//var_dump($waktu['month']);
					foreach($bulan['angka'] as $bulan1){
						if($waktu['month'] == $bulan1){
						//var_dump($waktu['month']);
							if($nilai_akhir[$bulan1] != null){
								$nilai_akhir[$bulan1] += $nilai_perform1['nilai'];
								$jumlah_data[$bulan1] += 1;
							}else{
								$nilai_akhir[$bulan1] = $nilai_perform1['nilai'];
								$jumlah_data[$bulan1] = 1;
								}
						}else{
							$nilai_akhir[$bulan1] = $nilai_akhir[$bulan1];
						}
						
					}
				}
			}
		}
		
		for($x = 1;$x < 13;$x++){
			if($nilai_akhir[$x] != null){
				$rata2[$x] = (int)$nilai_akhir[$x]/(int)$jumlah_data[$x];
			}else{
				$rata2[$x] = 0;
				}
		}
			$data['perform_perangkat'] = '';
			for($y = 1;$y < 13;$y++){
			$data['perform_perangkat'] .= '{ y: "'.$bulan['nama'][$y-1].'", a: '.$rata2[$y].'},';
			}
			$this->load->view('template/header', $data);
			$this->load->view('detil_perangkat', $data);
			$this->load->view('template/footer');
	
	}

	
	public function get_data_pendaftar($id)
	{
		$this->load->library('datatables');
		$this->datatables
			->select('id_pendaftar,no_urut, date_format(tanggal_daftar,"%d-%m-%Y") as tanggal_daftar,nama_lengkap, IF(jenis_kelamin=1, "Laki-laki", "Perempuan") as jenis_kelamin, kabupaten', false)
			->from('pendaftar ')
			->where('sekolah_tujuan',$id)
			->add_column('aksi', '<a href="'.site_url('pendaftar/detil/$1').'" data-toggle="ajaxModal" class="btn btn-xs btn-default"><i class="fa fa-picture-o" data-toggle="tooltip" data-original-title="Detil"></i></a>', 'id_pendaftar');			
		$res = $this->datatables->generate();
		echo $res;
	}


	function simpan_note()
		{
		
	        $this->load->model('perangkat_model');

			$id = $this->session->userdata('user_data');
	        $this->perangkat_model->simpan_public_note($id['id_user']);
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/home/dashboard2");
	        //$this->load->view('input/tambah',$data);
		
	    }

	function delete_note()
		{
		
	        $this->load->model('perangkat_model');

			$id = $this->session->userdata('user_data');
	        $this->perangkat_model->delete_public_note($id['id_user']);
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/home/dashboard2");
	        //$this->load->view('input/tambah',$data);
		
	    }

	function monitoring()
	    {
		
	        $data['page_title'] = 'Monitoring';
	        $this->load->view('template/header', $data);
	        $this->load->view('monitoring', $data);
	        $this->load->view('template/footer');
		
	    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */