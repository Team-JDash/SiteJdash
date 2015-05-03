<?php

require_once('Config/database.php');

/**
* Class Connection_BDD
*	Permet de fixer la methode de connection avec les principaux parametres
*
*	+connection_bdd()
*	+close_connection_bdd()
*/
/**
* 
*/
class Connection_BDD extends DATABASE_CONFIG{

	private $host_ ;
	private $dbname_ ;
	private $username_;
	private $password_ ;

	/**
	* Récupère les infos depuis le fichier Config/database.php
	*/
	function __construct()
	{
		$config = parent::__construct();
		// print_r($config);
		$this->host_ = $config['host'];
		$this->dbname_ = $config['dbname'];
		$this->username_ = $config['username'];
		$this->password_ = $config['password'];
	}

	
	/**
	* Demarre une nouvelle instance de connection BDD
	*/
	public function connection_bdd(){
		
		
		try {
			$dbh = new PDO("mysql:host=".$this->host_.";dbname=".$this->dbname_."", $this->username_, $this->password_);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (PDOException $e) {
		 	die("Impossible de se connecter: " . $e->getMessage());
		}
		
		return $dbh;
	}

	/**
	* Ferme l'instance de la bdd courante
	*/
	public function close_connection_bdd($instance_bdd){
		$instance_bdd = null;
	}


	public function get_name_bdd(){
		return $this->dbname_;
	}


}

?>
