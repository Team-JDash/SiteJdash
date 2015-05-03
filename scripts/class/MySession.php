<?php

require_once('User.php');


/**
* 
*/
class MySession extends User 
{
	
	function __construct()
	{
		
		if(self::is_session_started() == FALSE)
			session_start();
		else
			session_regenerate_id();
	}


	/**
	* Demarre une nouvelle session
	* @return bool
	*/
	function is_session_started()
	{
	    if ( php_sapi_name() !== 'cli' ) {
	        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
	            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
	        } else {
	            return session_id() === '' ? FALSE : TRUE;
	        }
	    }
	    return FALSE;
	}


	/**
	* Arrete la session courante
	*/
	public function user_logout()
	{
		if( isset($_SESSION) ){
			$_SESSION[parent::get_user_token()] = null;
		}
	}

	

	public function add_session($id, $val)
	{
		$_SESSION[parent::get_user_token()][$id] = $val;
	}




}
?>