<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('login_page');
	}
	
	public function login()
	{
		if(!$this->input->post()) {
			$this->load->view('login_page');
		}
		else {
			$this->load->model('account_model');
			$user_data = $this->account_model->login($this->input->post('username'), $this->input->post('pwd'));
			if(!empty($user_data)) {
				unset($user_data['password']);
				$this->session->set_userdata('user_data', $user_data);
				$alerts[] = array('message', 'Hai '.$user_data['username'].', Welcome back!');
				$this->session->set_flashdata('alerts', $alerts);
				if($this->input->get('dst')) {
					redirect(rawurldecode($this->input->get('dst')));
				}
				redirect('home/dashboard2');
				//redirect('home');
			}
			else {
				$alerts[] = array('error', 'Username dan Password tidak cocok');
				$this->session->set_flashdata('alerts', $alerts);
				if($this->input->get('dst')) {
					redirect('auth/login?dst='.$this->input->get('dst'));
				}
				else {
					redirect('auth/login');
				}
			}
			
		}
		
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
	
	public function check_sess_ajax()
	{
		if($this->session->userdata('user_data')) {
			echo json_encode(true);
		}
		else {
			echo json_encode(false);
		}
	}
	
	public function cek_login(){
		echo json_encode(false);
	}
	
	public function modal_login()
	{
		if(!$this->input->post()) {
			$this->load->view('modal_login');
		}
		else {
			$this->load->model('account_model');
			$user_data = $this->account_model->login($this->input->post('username'), $this->input->post('pwd'));
			//$user_data = $this->account_model->loginXXX($this->input->post('username'));
			if(!empty($user_data)) {
				unset($user_data['password']);
				$this->session->set_userdata('user_data', $user_data);

				$this->load->library('Mobile_Detect');
    			$detect = new Mobile_Detect();
    			if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
					$this->account_model->login_log("1");
				} else {
					$this->account_model->login_log("0");
				}
				if ($this->input->post('newdashboard')){
				redirect('home/dashboard2');
				}else {
				echo json_encode(true);					
				}
			}
			else {
				if ($this->input->post('newdashboard')){
				redirect('home/dashboard2');
				}else {
				echo json_encode(false);				
				}
			}
		}
	}
	
}

/* End of file mater_perencana.php */
/* Location: ./application/controllers/master/master_perencana.php */