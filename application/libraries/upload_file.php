<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Author: Fachri Hilmi
 * energeek 2014
 * http://id.linkedin.com/in/fhr93/
*/

class Upload_file {

	/*protected $csrf_token_name = 'csrf_token';
	protected $csrf_hash;
	protected $CI;*/
	
	public function __construct()
    {
		$this->CI  =& get_instance();
		//$this->CI->load->library('session');
		$this->CI->load->helper('file');
		//$this->CI->load->database();
    }
	
	public function do_upload($field)
	{
		//$this->load->helper('file');
		
		$dir = 'foto';
		if(!is_dir($dir)) {
			mkdir($dir, 0777, true);
			//copy('foto/index.html', 'foto/index.html');
			//copy('foto/index.html', $dir.'/index.html');
		}
		if(!is_dir($dir.'/thumb')) {
			mkdir($dir.'/thumb', 0777, true);
			//copy('foto/index.html', $dir.'/thumb/index.html');
		}
		
		$config['upload_path'] = $dir;
		$config['encrypt_name'] = true;
		$config['remove_spaces'] = true;
		$config['allowed_types'] = '*';
		
		$this->CI->load->library('upload', $config);
		$this->CI->upload->initialize($config);
		if($this->CI->upload->do_multi_upload($field)) {
			$list_uploaded = $this->CI->upload->get_multi_upload_data();
			// bikin thumbnail
			$config['image_library'] = 'gd2';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 150;
			$config['height']	= 100;
			$this->CI->load->library('image_lib', $config);
			
			foreach($list_uploaded as $uploaded) {
				if($uploaded['is_image']) {
					$config['source_image']	= $uploaded['full_path'];
					$config['new_image']	= $uploaded['file_path'].'/thumb/'.$uploaded['file_name'];
					
					$this->CI->image_lib->initialize($config);
					
					if( ! $this->CI->image_lib->resize()) {
						echo $this->CI->image_lib->display_errors();
					}
				}
			}
			return $list_uploaded;
		}
		else{
			return false;
		}
	}
	
}