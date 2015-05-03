<?php

/**
* Config pour l acces a la base de donnée
*/
class DATABASE_CONFIG
{
	
	private $SERVER_NAME = array(	    
	    "jdash.olympe.in" => array(
			'host' => 'sql2.olympe.in',
			'dbname' => 'u4kztq8m',
			'username' => 'u4kztq8m',
			'password' => '123'
			),
	    '127.0.0.1' => array(
			'host' => '127.0.0.1',
			'dbname' => 'jdash',
			'username' => 'root',
			'password' => ''
			),
	    'localhost' => array(
			'host' => '127.0.0.1',
			'dbname' => 'jdash',
			'username' => 'root',
			'password' => ''
	    )
	);

	public function __construct() {	
		return $this->SERVER_NAME[$_SERVER['SERVER_NAME']];	        
    }	

}

