<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		
		$this->load->library('csrf');
		$this->load->model('account_model');
    }

	function registration($status = 0)
	{
		$data['page_title'] = 'Daftar User';
		$data['css_arr'] = array(
			'fuelux.css',
			'select2.css',
			'datepicker.css'
		);
		$data['js_arr'] = array(
			'parsley/parsley.min.js',
			'parsley/parsley.extend.js',
			'select2/select2.min.js',
		);
		
		
				$id_user = $this->account_model->add_user($this->input->post('username'), $this->input->post('password'), 1);
				$this->account_model->add_perusahaan($id_user, $this->input->post('nama_perusahaan'), $this->input->post('nama_pj'), $this->input->post('email'));
				
				$user_data = $this->account_model->login($this->input->post('username'), $this->input->post('password'));
				unset($user_data['password']);
				$this->session->set_userdata($user_data);
				$alerts[] = array('message', 'Hai '.$user_data['username'].', Welcome!');
				$this->session->set_flashdata('alerts', $alerts);
				redirect('perusahaan/perusahaan/add_perusahaan');
				

	}
	
	public function lupa_password()
	{
		$data['page_title'] = 'Lupa Password';		
		$this->load->view('modal_lupa_password', $data);	
	}
	
	
	
}
