<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth_hook {

	 private $CI;
	
	function __construct()
	{
        $this->CI =& get_instance();
		$this->CI->load->library('session');
		$this->CI->load->library('uri');
		$this->CI->load->library('user_agent');
		$this->CI->load->helper('url');
		$this->CI->config->load('privileges');
    }
	
	function check_auth()
	{
		$privileges = $this->CI->config->item('privileges');
		if(!empty($privileges[$this->CI->uri->rsegment(1)])) {
			if(!empty($privileges[$this->CI->uri->rsegment(1)][$this->CI->uri->rsegment(2)])) {
				if(!in_array('*', $privileges[$this->CI->uri->rsegment(1)][$this->CI->uri->rsegment(2)])) {
					if($user_data = $this->CI->session->userdata('user_data')) {
						if(!in_array($user_data['id_role'], $privileges[$this->CI->uri->rsegment(1)][$this->CI->uri->rsegment(2)])) {
							redirect('error/e403');
						}
					}
					else {
						//var_dump($user_data);
						redirect('home?dst='.rawurlencode(current_url()));
					}
				}
			}
			else redirect('error/e401');
		}
		else redirect('error/e401');
	}
	
	function no_back()
	{
		$this->CI->load->library('output');
		$this->CI->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->CI->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->CI->output->set_header('Pragma: no-cache');
		$this->CI->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
		$this->CI->output->set_output($this->CI->output->get_output());
		$this->CI->output->_display();
	}

}