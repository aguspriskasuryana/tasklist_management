<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

	public function index()
	{
	//	redirect('auth/login');
	}
	
	public function e401() {
		$this->load->view('error/401');
	}
	
	public function e403() {
		$this->load->view('error/403');
	}	
	
	public function e404() {		
		$this->load->view('error/404');
	}
	
}

/* End of file mater_perencana.php */
/* Location: ./application/controllers/master/master_perencana.php */