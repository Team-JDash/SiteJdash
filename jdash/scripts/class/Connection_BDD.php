<?php

/**
* Class Connection_BDD
*	Permet de fixer la methode de connection avec les principaux parametres
*	
*	+connection_bdd()
*	+close_connection_bdd()
*/
class Connection_BDD{
	
	private $ip_serveur = "127.0.0.1";
	private $dbname = "jdash";
	private $user_serveur = "root";
	private $password_serveur = "";
	private $port_serveur = "3306";

	/**
	* Demarre une nouvelle instance de connection BDD
	*/
	public function connection_bdd(){
		try {
			$dbh = new PDO('mysql:host='.$this->ip_serveur.';dbname='.$this->dbname.'', $this->user_serveur, $this->password_serveur);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (Exception $e) {
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


}