<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$this->load->model('report_model');
		date_default_timezone_set('Asia/Jakarta');
    }
	
	function index()
	{	
		$data['page_title'] = 'Report Task';
		$data['css_arr'] = array(
			'datepicker.css',
			'datatables.css'
		);
		$data['js_arr'] = array(
			'datatables/jquery.dataTables.min.js',
			'datepicker/bootstrap-datepicker.js'
			
		);
		$this->load->view('template/header', $data);
		$this->load->view('report_task', $data);
		$this->load->view('template/footer');
	}

	function get_data(){
		$hasil = $this->report_model->get_data(date('Y-m-d',strtotime($this->input->get('tgl'))));
		echo json_encode($hasil);
	}

	function hop(){
		$data['page_title'] = 'HOP';
		$data['css_arr'] = array(
			'datepicker.css',
			'datatables.css'
		);
		$data['js_arr'] = array(
			'datatables/jquery.dataTables.min.js',
			'datepicker/bootstrap-datepicker.js'
			
		);
		$this->load->view('template/header', $data);
		$this->load->view('hop', $data);
		$this->load->view('template/footer');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */