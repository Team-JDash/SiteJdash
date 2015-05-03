<?php
require_once('Connection_BDD.php');
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

	private $user_pseudo_;
	private $user_email_;
	private $user_password_;
	private $user_id_;
	private $user_firstName_;
	private $user_lastName_;
	private $token_ = 0;



	private $name_bdd_;
	public $name_table_user_ = "utilisateur";


	function _construct() {
		$this->name_bdd_ = parent::get_name_bdd();
	}

	/**
	* Attribut la valeur du pseudo
	* @param valeur d'entrée du pseudo utilisateur
	*
	*/
	public function set_user_pseudo( $pseudo_enter ){
		if( isset($_POST['pseudo']) || isset($user_pseudo) ){
			$this->user_pseudo_ = $pseudo_enter;
		}
	}

	/**
	* Attribut la valeur de l email
	* @param valeur d'entrée de l email utilisateur
	*
	*/
	public function set_user_email( $email_enter ){
		if( isset($_POST['email']) || isset($email_pseudo) ){
			$this->user_email_ = $email_enter;
		}
	}

	/**
	* Attribut la valeur du password
	* @param valeur d'entrée du password utilisateur
	*
	*/
	public function set_user_password( $password_enter ){
		if( isset($_POST['password']) || isset($user_password) ){
			$this->user_password_ = md5($password_enter);
		}
	}

	/**
	* Attribut la valeur du prénom
	* @param valeur d'entrée du prénom utilisateur
	*
	*/
	public function set_user_firstName( $firstName_enter ){
			$this->user_firstName_ = $firstName_enter;		
	}


	/**
	* Attribut la valeur du nom
	* @param valeur d'entrée du nom utilisateur
	*
	*/
	public function set_user_lastName( $lastName_enter ){
			$this->user_lastName_ = $lastName_enter;
	}

	/**
	* Attribut la valeur de l'id user de la bdd
	* @param besoin d'avoir definie le pseudo et le password
	* @return int: l'id de l'urilisateur si exist dans la BDD
	*/
	private function set_user_id(){
		// print_r($this->user_password_);
		try {
			$bdh = parent::connection_bdd();
			$statement = $bdh->prepare("SELECT * FROM `".$this->name_table_user_."` WHERE token = :token");

			$statement->bindParam(':token', $this->token_);

			$statement->execute();
			$res = $statement->fetch();

			parent::close_connection_bdd($bdh);
			
			$val= $res['NoUtilisateur'];
			$this->user_id_ = $val;
			// print_r(" res".$val."____");
			

		} catch( PDOExecption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}

		
		// $this->user_id_ = $res;
		// return $res;
	}

	public function set_user_token($token){
		$this->token_ = $token;
	}

	/**
	* Recupere la valeur du pseudo
	* @return string: la valeur du pseudo
	*
	*/
	public function get_user_pseudo(){
		return $this->user_pseudo_;
	}

	/**
	* Recupere la valeur de l email
	* @return string: la valeur de l email
	*
	*/
	public function get_user_email(){
		return $this->user_email_;
	}

	/**
	* Recupere la valeur du password
	* @return string: la valeur du password
	*
	*/
	public function get_user_password(){
		return $this->user_password_;
	}

	/**
	* Recupere la valeur de l'id user bdd
	* @return int: la valeur de l id
	*
	*/
	public function get_user_id(){
		return $this->user_id_;
	}

	/**
	* Recupere la valeur du prénom
	* @return string: la valeur du prénom
	*
	*/
	public function get_user_firstName(){
		return $this->user_firstName_;
	}

	/**
	* Recupere la valeur du nom
	* @return string: la valeur du nom
	*
	*/
	public function get_user_lastName(){
		return $this->user_lastName_;
	}

	public function get_user_token(){
		if( $this->token_ == 0 )
			self::find_user_profil();
		return $this->token_;
	}

	/**
	* Insert dans la bdd les valeur de pseudo et password
	*/
	public function create_user(){
		$name_bdd = $this->name_bdd_;
		$name_table_user = $this->name_table_user_;
		try {
			$bdh = parent::connection_bdd();
			$stmp = $bdh->prepare("INSERT INTO $name_bdd.$name_table_user
						(NoUtilisateur, nom, prenom, login, password, mail, token) VALUES (NULL, :lastName, :firstName, :pseudo, :password, :mail, :token )");

			$stmp->bindParam(':lastName', $lastName);
			$stmp->bindParam(':firstName', $firstName);
			$stmp->bindParam(':pseudo', $pseudo);
			$stmp->bindParam(':password', $password);
			$stmp->bindParam(':mail', $mail);
			$stmp->bindParam(':token', $token);
			
			$lastName = $this->user_lastName_;
			$firstName = $this->user_firstName_;
			$pseudo = $this->user_pseudo_;
			$password = $this->user_password_;
			$mail = $this->user_email_;
			$token = $this->token_;
			
			$res = $stmp->execute();
		
			parent::close_connection_bdd($bdh);
			return $res;
		} catch( PDOExecption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}
	}

	/**
	* Update dans la bdd les valeur de pseudo et password avec l' id user
	*/
	public function update_user_profil(){
		$name_bdd = $this->name_bdd_;
		$name_table_user = $this->name_table_user_;
		try {
			$bdh = parent::connection_bdd();
			$stmp = $bdh->prepare('UPDATE $name_bdd.$name_table_user SET login = :pseudo, password = :password WHERE login.id = :id_user');
			$stmp->bindParam(':pseudo', $pseudo);
			$stmp->bindParam(':password', $password);
			$stmp->bindParam(':id_user', $id);

			$pseudo = $this->user_pseudo_;
			$password = $this->user_password_;
			$id = $this->id_user;

			$stmp->execute();
			parent::close_connection_bdd($bdh);
		} catch( PDOExecption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}
	}

	/**
	* Recherche l'utilsateur avec son id bdd
	*/
	public function find_user_profil(){

		try {
			$bdh = parent::connection_bdd();
			$stmp = $bdh->prepare('SELECT * FROM '.$this->name_table_user_.' WHERE NoUtilisateur = :id_user ');

			$stmp->bindParam(':id_user', $this->user_id_);

			

			$stmp->execute();
			$res = $stmp->fetch();
			parent::close_connection_bdd($bdh);
			
			$this->token_ = $res['token'];
			$this->user_pseudo_ = $res['login'];
			$this->user_email_ = $res['mail'];
			$this->user_password_ = $res['password'];
			// $this->user_id_ = $res['NoUtilisateur'];
			$this->user_firstName_ = $res['prenom'];
			$this->user_lastName_ = $res['nom'];
			
			

		} catch( PDOExecption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}
	}

	/**
	* Recherche un utilisateur enregistré
	*@return true si l'utilisateur existe dans la BDD
	*/
	public function user_exist(){
		try{
			$bdh = parent::connection_bdd();
			$stmp = $bdh->prepare('SELECT mail, NoUtilisateur FROM '.$this->name_table_user_.' WHERE mail = :mail LIMIT 1');

			$stmp->bindParam(':mail', $mail);

			$mail = $this->get_user_email();

			$stmp->execute();
			$res = $stmp->fetch();
			// print_r($res);
			parent::close_connection_bdd($bdh);

			$this->user_id_ = $res['NoUtilisateur'];
			self::find_user_profil();

			if (!empty($res))
				return TRUE;
			else
				return FALSE;
		} catch( PDOExecption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}
	}


	public function get_user_object(){
		try {
			$bdh = parent::connection_bdd();
			$stmp = $bdh->prepare('SELECT * FROM '.$this->name_table_user_.' WHERE email = ":email" ');

			$stmp->bindParam(':email', $this->user_email_);

			
			$stmp->execute();
			parent::close_connection_bdd($bdh);
		} catch( PDOExecption $e){
			exit('<b>Catched exception( cf. class User) at line '. $e->getLine() .' :</b> '. $e->getMessage());
		}
	}


	/**
	* Génère le token lors de l'inscription de l'utilisateur
	* @return token de 11 caractère alphanumérique
	*/
	public function createToken(){
		return md5(uniqid(mt_rand(), true));
	}






}

?>
