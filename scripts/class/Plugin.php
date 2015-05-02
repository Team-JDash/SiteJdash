<?php

require_once('Connection_BDD.php');


/**
* Class User
*	Permet d'effectuer des actions sur la table plugin
*/
class Plugin extends Connection_BDD{
	
	private $name_bdd;
	private $name_table = "plugin";

	private $plugin_id_user;
	private $plugin_name;
	private $plugin_categorie;
	private $plugin_categorie_id;
	private $plugin_description;


	function _construct() {
		$this->name_bdd = parent::get_name_bdd();
	}


	/**
	* Attribut la valeur du nom pour le plugin
	* @param valeur d'entrée pour la description pour l'application
	*
	*/
	public function set_plugin_name( $plugin_name_in ){
		$this->plugin_name = $plugin_name_in;
	}

	/**
	* Recupere l'attribution  du nom pour le plugin
	*
	*/
	public function get_plugin_name(){
		return $this->plugin_name;
	}

	/**
	* Attribut la valeur la categorie pour le plugin
	* @param valeur d'entrée pourla categorie pour le plugin
	*
	*/
	public function set_plugin_categorie( $plugin_categorie_in ){
		$this->plugin_categorie = $plugin_categorie_in;
		self::set_plugin_categorie_id( $plugin_categorie_in );
	}

	/**
	* Recupere l'attribution de la categorie pour le plugin
	*
	*/
	public function get_plugin_categorie(){
		return $this->plugin_categorie;
	}

	/**
	* Attribut la valeur id de la categorie pour le plugin
	* @param valeur d'entrée  id de la categorie pour le plugin
	*
	*/
	public function set_plugin_categorie_id( $plugin_categorie_in ){
		if(empty($this->plugin_categorie)){
			$this->plugin_categorie = $plugin_categorie_in;
		}
		try
		{
			$bdh = parent::connection_bdd();
			$stmp = $bdh->prepare('SELECT * FROM '.$this->name_table.' WHERE nom = "'.$this->plugin_categorie.'"');
			
			$stmp->execute();
			$result_row = $stmp->fetch();

			parent::close_connection_bdd($bdh);

		}
		catch( Execption $e)
		{
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}

		
		$this->plugin_categorie_id = $result_row['NoCategorie'];
		return $this->plugin_categorie_id;
	}

	/**
	* Recupere l'id de la categorie pour le plugin
	*
	*/
	public function get_plugin_categorie_id(){
		return $this->plugin_categorie_id;
	}

	/**
	* Attribut la valeur de la description pour le plugin
	* @param valeur d'entrée pour la la description pour le plugin
	*
	*/
	public function set_plugin_description( $plugin_description_in ){
		$this->plugin_description = $plugin_description_in;
	}

	/**
	* Recupere l'attribution de la la description le plugin
	*
	*/
	public function get_plugin_description(){
		return $this->plugin_description;
	}

	/**
	* Attribut la valeur l'id user du plugin
	* @param valeur d'entrée pour l'id user du plugin
	*
	*/
	public function set_plugin_id_user( $plugin_id_user_in ){
		$this->plugin_id_user = $plugin_id_user_in;
	}

	/**
	* Recupere l'id user du plugin
	*
	*/
	public function get_plugin_id_user(){
		return $this->plugin_id_user;
	}


	/**
	* Update les informations du plugin dans la BDD
	*/
	public function update_plugin(){
		try {
			$bdh = parent::connection_bdd();
			$stmp = $bdh->prepare('UPDATE '.$this->name_bdd.'.'.$this->name_table.' SET `nom` = '.$this->plugin_name.', `description` = '.$this->plugin_description.', `NoCategorie`='.$this->plugin_categorie_id.' WHERE `plugin`.`NoPlugin` = 1');

			$stmp->execute();
			parent::close_connection_bdd($bdh);
		} catch( Execption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}
	}



	/**
	* Ajoute un pluging dans la BDD
	*/
	public function new_plugin(){
		
		try {
			$bdh = parent::connection_bdd();

			$stmp = $bdh->prepare('INSERT INTO '.$this->name_table.' (`NoPlugin`, `NoCategorie`, `nom`, `description`, `NoUtilisateur`) VALUES (NULL, :id_categorie, :name, :description, :id_user)');
			$stmp->bindParam(':id_categorie', $id_categorie);
			$stmp->bindParam(':name', $name);
			$stmp->bindParam(':description', $description);
			$stmp->bindParam(':id_user', $id_user);

			$id_categorie = $this->plugin_categorie;
			$name = $this->plugin_name;
			$description = $this->plugin_description;
			$id_user = $this->plugin_id_user;

			
			$stmp->execute();
			parent::close_connection_bdd($bdh);
		} catch( Execption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}
	}
}

