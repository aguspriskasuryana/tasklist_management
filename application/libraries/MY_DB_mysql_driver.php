<?php if(!defined("BASEPATH")){ exit("No direct script access allowed"); }

class MY_DB_mysql_driver extends CI_DB_mysql_driver 
{       
    public function __construct($params) 
    {
		parent::__construct($params);
		//var_dump(get_class_methods($this));
    }
    /** 
     * This function will allow you to do complex group where clauses in to c and (a AND b) or ( d and e)
     * This function is needed as else the where clause will append an automatic AND in front of each where Thus if you wanted to do something
     * like a AND ((b AND c) OR (d AND e)) you won't be able to as the where would insert it as a AND (AND (b...)) which is incorrect. 
     * Usage: start_group_where(key,value)->where(key,value)->close_group_where() or complex queries like
     *        open_bracket()->start_group_where(key,value)->where(key,value)->close_group_where()
     *        ->start_group_where(key,value,'','OR')->close_group_where()->close_bracket() would produce AND ((a AND b) OR (d))
     * @param $key mixed the table columns prefix.columnname
     * @param $value mixed the value of the key
     * @param $escape string any escape as per CI
     * @param $type the TYPE of query. By default it is set to 'AND' 
     * @return db object.  
     */
    function start_group_where($key,$value=NULL,$escape,$type="AND")
    {
        $this->open_bracket_where($type); 
        return parent::_where($key, $value,'',$escape); 
    }

    /**
     * Strictly used to have a consistent close function as the start_group_where. This essentially callse the close_bracket() function. 
     */
    function end_group_where()
    {
        return $this->close_bracket_where();  
    }
	
	function start_group_like($field, $match = '', $side = 'both', $type="AND")
    {
        $this->open_bracket_like($type); 
        return parent::_like($field, $match, '', $side, ''); 
    }
	
	function end_group_like()
    {
        return $this->close_bracket_like();  
    }

    /**
     * Allows to place a simple ( in a query and prepend it with the $type if needed. 
     * @param $type string add a ( to a query and prepend it with type. Default is $type. 
     * @param $return db object. 
     */
    function open_bracket_where($type="AND")
    {
        $this->ar_where[] = $type . " (";
        return $this;  
    }   

    /**
     * Allows to place a simple ) to a query. 
     */
    function close_bracket_where()
    {
        $this->ar_where[] = ")"; 
        return $this;       
    }
	
	function open_bracket_like($type="AND")
    {
        $this->ar_like[] = $type . " (";
        return $this;  
    }
	
	function close_bracket_like()
    {
        $this->ar_like[] = ")"; 
        return $this;       
    }
	
}