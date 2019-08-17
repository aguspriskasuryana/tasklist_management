<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

	public function __construct() 
    {
		parent::__construct();
    }

	/**
     * Database Loader
     *
     * @access    public
     * @param    string    the DB credentials
     * @param    bool    whether to return the DB object
     * @param    bool    whether to enable active record (this allows us to override the config setting)
     * @return    object
     */
    function database($params = '', $return = FALSE, $active_record = TRUE)
    {
		// Do we even need to load the database class?
		if (class_exists('CI_DB') AND $return == FALSE AND $active_record == FALSE)
		{
		return FALSE;
		}

		require_once(BASEPATH.'database/DB'.EXT);

		// Load the DB class
		$db =& DB($params, true);
		$my_driver = config_item('subclass_prefix').'DB_'.$db->dbdriver.'_driver';
		$my_driver_file = APPPATH.'libraries/'.$my_driver.EXT;

		if (file_exists($my_driver_file))
		{
			require_once($my_driver_file);
			$db = new $my_driver(get_object_vars($db));
		}

		if ($return === TRUE)
		{
			return $db;
		}
		// Grab the super object
		$CI =& get_instance();

		// Initialize the db variable.  Needed to prevent
		// reference errors with some configurations
		$CI->db = '';
		$CI->db = $db;
		// Assign the DB object to any existing models
		//$this->_ci_assign_to_models();
    }
}