<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Author: Fachri Hilmi
 * energeek 2014
 * http://id.linkedin.com/in/fhr93/
*/

class Csrf {

	protected $csrf_token_name = 'csrf_token';
	protected $csrf_hash;
	protected $CI;
	
	public function __construct()
    {
		$this->CI  =& get_instance();
		$this->CI->load->library('session');
		$this->CI->load->library('user_agent');
		$this->CI->load->database();
    }

	public function get_hash()
	{
		if(empty($this->csrf_hash)) $this->set_hash();
		return $this->csrf_hash;
	}
	
	protected function set_hash()
	{
		$this->csrf_hash = md5(uniqid(rand(), TRUE));
		$this->insert_to_db();
	}
	
	public function verify($redirect = null)
	{
		// If it's not a POST request we will set the CSRF cookie
		if ( ! (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST'))
		{
			return false;
		}

		// Do the tokens exist in both the _POST and _COOKIE arrays?
		if ( ! isset($_POST[$this->csrf_token_name]) )
		{
			$this->show_error();
		}
		
		// Do the tokens match?
		if (! $this->check_in_db($_POST[$this->csrf_token_name]) )
		{
			if($redirect != null)
				redirect($redirect);
			else 
				redirect($this->CI->agent->referrer());			
			
		}

		// Nothing should last forever
		$this->delete_from_db($_POST[$this->csrf_token_name]);
		
		// We kill this since we're done and we don't want to
		// polute the _POST array
		unset($_POST[$this->csrf_token_name]);
		
		log_message('debug', 'CSRF token verified');

		return true;
	}
	
	public function get_html()
	{
		if(empty($this->csrf_hash)) $this->set_hash();
		return '<input type="hidden" name="'.$this->csrf_token_name.'" value="'.$this->csrf_hash.'">';
	}
	
	public function show_error()
	{
		show_error('The action you have requested is not allowed.');
	}
	
	protected function insert_to_db()
	{
		$this->CI->db->insert('app_csrf', array('csrf_hash' => $this->csrf_hash));
	}
	
	protected function check_in_db($csrf_hash)
	{
		$this->CI->db->select('*')->from('app_csrf')->where('csrf_hash', $csrf_hash);	
		$query = $this->CI->db->get();
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}
	
	protected function delete_from_db($csrf_hash)
	{
		$this->CI->db->delete('app_csrf', array('csrf_hash' => $csrf_hash));
	}

	
}