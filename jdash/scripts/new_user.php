<?php
require 'class/User.php';


// print_r($_POST);

$erreur = false;

$user_function = new User;
$user_function->set_user_pseudo($_POST['pseudo']);
$user_function->set_user_email($_POST['email']);




// print_r( $user_function->get_user_pseudo() );
// print_r( $user_function->get_user_email() );
// print_r( $user_function->get_user_password() );
// print_r( $user_function->get_user_id() );


if ($user_function->get_user_id() != null) {
	
	$res["msg"] = "L'utilisateur ".$_POST['pseudo']." existe d&eacute;j&agrave;";
	$res["code_status"] = 1;

}else{
	
	if( !($_POST['password'] == $_POST['password_bis']) )
	{
		
		$res["msg"] = 'le mot de passe n est pas correct';
		$res["code_status"] = 1;
	}
	else
	{
		$user_function->set_user_password($_POST['password']);
		$user_function->create_user();
		if( isset($_SESSION) )
		{
			session_start();
		}
		$_SESSION['id'] = $user_function->get_user_id();
		$_SESSION['pseudo'] = $user_function->get_user_pseudo();
		$_SESSION['email'] = $user_function->get_user_email();
		
		
		$res["session"] = $_SESSION;
		$res["msg"] = "Inscription effectu&eacute";
		$res["code_status"] = 0;
		//echo "<a href='../html'>Veuillez cliquer sur le liens si la redirection ne fonctionne pas.</a>";
	}

}

print_r(json_encode($res));
