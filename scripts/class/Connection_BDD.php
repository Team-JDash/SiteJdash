<?php

/**
* Class Connection_BDD
*	Permet de fixer la methode de connection avec les principaux parametres
*
*	+connection_bdd()
*	+close_connection_bdd()
*/
class Connection_BDD{

	private $servername_ = "sql2.olympe.in";
	private $dbname_ = "u4kztq8m";
	private $username_ = "u4kztq8m";
	private $password_ = "123";


	// private $servername_ = "127.0.0.1";
	// private $dbname_ = "jdash";
	// private $username_ = "root";
	// private $password_ = "";
	// private $port_serveur = "3306";

	/**
	* Demarre une nouvelle instance de connection BDD
	*/
	public function connection_bdd(){
		
		
		try {
			$dbh = new PDO("mysql:host=".$this->servername_.";dbname=".$this->dbname_."", $this->username_, $this->password_);
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
