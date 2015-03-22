<?php
require 'Connection_BDD.php';


/**
* Class Fonctions
*	Permet de realiser de appels pour la recherche des applications user
*	dans la base de donnée.
*
*	+set_name_application()
*	+get_name_application()
*	+find_application()
*/
class Functions extends Connection_BDD{

	private $name_bdd = "jdash";
	private $name_table = "plugin";

	private $search_application;
	private $search_categorie;

	/**
	* Attribut la valeur de recherche pour l'application
	* @param valeur d'entrée pour la recherche de l application
	*
	*/
	public function set_name_application( $search_app_in ){
		$this->search_application = $search_app_in;
	}

	/**
	* Recupere l'attribution de la valeur de recherche
	*
	*/
	public function get_name_application(){
		return $this->search_application;
	}

	/**
	* Attribut la valeur categoriesur la recherche
	* @param valeur d'entrée pour la categorie de l application recherche
	*
	*/
	public function set_categorie( $search_categorie_in ){
		$this->search_categorie = $search_categorie_in;
	}

	/**
	* Recupere l'attribution de la valeur de la categorie
	*
	*/
	public function get_categorie(){
		return $this->search_categorie;
	}

	/**
	* Permet de faire la recherche de l'application dans la base de donnée
	*
	*
	*/
	public function find_application(){
		try {
			$instance_bdd = parent::connection_bdd();
			//last requete 
			//SELECT * FROM '.$this->name_table_application.' WHERE nom LIKE '%':name_application'%''
			$stmp = $instance_bdd->prepare("SELECT *  FROM ".$this->name_table." WHERE `nom` LIKE '%".$this->search_application."%' ");
			
			$stmp->execute();

			$result_row = $stmp->fetch();
			print_r($result_row);
			return $result_row;
			
			close_connection_bdd($instance_bdd);
			
		}catch( Execption $e) {
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}
	}
}

