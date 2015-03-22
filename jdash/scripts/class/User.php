<?php
require 'Connection_BDD.php'; 


/**
* Class User
*	Permet d'effectuer des actions sur la table user
*
*	-set_user_id()
*	
*	+set_user_pseudo()
*	+set_user_password()
*	+set_user_email()
*	+get_user_pseudo()
*	+get_user_password()
*	+get_user_email()
*	+get_user_id()
*	+create_user()
*	+update_user_profil()
*	+find_user_profil()
*	+start_session()
*	+user_logout()
*/
class User extends Connection_BDD{

	private $user_pseudo;
	private $user_email;
	private $user_password;
	private $user_id;

	public $name_bdd = "jdash";
	public $name_table_user = "utilisateur";

	/**
	* Attribut la valeur du pseudo 
	* @param valeur d'entrée du pseudo utilisateur
	*
	*/
	public function set_user_pseudo( $pseudo_enter ){
		if( isset($_POST['pseudo']) || isset($user_pseudo) ){
			$this->user_pseudo = $pseudo_enter;
		}
	}

	/**
	* Attribut la valeur de l email 
	* @param valeur d'entrée de l email utilisateur
	*
	*/
	public function set_user_email( $email_enter ){
		if( isset($_POST['email']) || isset($email_pseudo) ){
			$this->user_email = $email_enter;
		}
	}

	/**
	* Attribut la valeur du password
	* @param valeur d'entrée du password utilisateur
	*
	*/
	public function set_user_password( $password_enter ){
		if( isset($_POST['password']) || isset($user_password) ){
			$this->user_password = $password_enter;
		}
	}

	/**
	* Attribut la valeur de l'id user de la bdd
	* @param besoin d'avoir definie le pseudo et le password
	* @return int: l'id de l'urilisateur si exist dans la BDD
	*/
	private function set_user_id(){
		try {
			$bdh = parent::connection_bdd();
			$stmp = $bdh->prepare('SELECT * FROM '.$this->name_table_user.' WHERE mail = "'.$this->user_email.'" AND password = "'.$this->user_password.'" ');
			// print_r($stmp);
			$stmp->execute();
			$result_row = $stmp->fetch();

			parent::close_connection_bdd($bdh);

		} catch( Execption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}

		// print_r($result_row);
		$this->user_id = $result_row['NoUtilisateur'];
		return $this->user_id;
	}

	/**
	* Recupere la valeur du pseudo 
	* @return string: la valeur du pseudo
	*
	*/
	public function get_user_pseudo(){
		return $this->user_pseudo;
	}

	/**
	* Recupere la valeur de l email
	* @return string: la valeur de l email
	*
	*/
	public function get_user_email(){
		return $this->user_email;
	}

	/**
	* Recupere la valeur du password
	* @return string: la valeur du password
	*
	*/
	public function get_user_password(){
		return $this->user_password;
	}

	/**
	* Recupere la valeur de l'id user bdd
	* @return int: la valeur de l id
	*
	*/
	public function get_user_id(){
		if( isset($this->user_id) || $this->user_id == NULL )
			self::set_user_id();
		return $this->user_id;
	}

	/**
	* Insert dans la bdd les valeur de pseudo et password 
	*/
	public function create_user(){

		try {
			$bdh = parent::connection_bdd();
			$stmp = $bdh->prepare('INSERT INTO '.$this->name_bdd.'.'.$this->name_table_user.' (`NoUtilisateur`, `login`, `password`, `mail`) VALUES (NULL, :pseudo, :password, :mail)');
			$stmp->bindParam(':pseudo', $pseudo);
			$stmp->bindParam(':password', $password);
			$stmp->bindParam(':mail', $mail);

			$pseudo = $this->user_pseudo;
			$password = $this->user_password;
			$mail = $this->user_email;
			// print_r($stmp);
			$stmp->execute();
			parent::close_connection_bdd($bdh);
		} catch( Execption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}
	}

	/**
	* Update dans la bdd les valeur de pseudo et password avec l' id user
	*/
	public function update_user_profil(){
		
		try {
			$bdh = parent::connection_bdd();
			$stmp = $bdh->prepare('UPDATE '.$this->name_bdd.'.'.$this->name_table_user.' SET login = ":pseudo", password = ":password" WHERE login.id = :id_user');
			$stmp->bindParam(':pseudo', $pseudo);
			$stmp->bindParam(':password', $password);
			$stmp->bindParam(':id_user', $id);

			$pseudo = $this->user_pseudo;
			$password = $this->user_password;
			$id = $this->id_user;
			
			$stmp->execute();
			parent::close_connection_bdd($bdh);
		} catch( Execption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}
	}

	/**
	* Recherche l'utilsateur avec son id bdd
	*/
	public function find_user_profil(){
		
		try {
			$bdh = parent::connection_bdd();
			$stmp = $bdh->prepare('SELECT * FROM '.$this->name_table_user.' WHERE id = ":id" ');
			
			$stmp->bindParam(':id_user', $id);
			
			$id = $this->get_user_id();
			
			$stmp->execute();
			parent::close_connection_bdd($bdh);
		} catch( Execption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}
	}

	/**
	* Demarre une nouvelle session
	*/
	public function start_session(){
		if( isset($_SESSION) ){
			session_start();
		}
	}

	/**
	* Arrete la session courante
	*/
	public function user_logout(){
		if( isset($_SESSION) ){
			session_destroy();		
		}
	}
}