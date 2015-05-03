<?php

require_once('class/User.php');


$user_function = new User;
$user_function->set_user_pseudo($_POST['pseudo']);
$user_function->set_user_email($_POST['email']);
$user_function->set_user_firstName($_POST['prenom']);
$user_function->set_user_lastName($_POST['nom']);
$user_funtion->set_user_token($_POST['token']);


if ( ($user_function->user_exist()) == TRUE) {

	$res["msg"] = "l'email ".$_POST['email']." existe déjà";
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
			$user_function->start_session();
		}
		$user_function->add_session( 'id', $user_function->get_user_id(););
		$user_function->add_session( 'pseudo', $user_function->get_user_pseudo(););
		$user_function->add_session( 'email', $user_function->get_user_email(););
		$user_function->add_session( 'firstName', $user_function->get_user_firstName(););
		$user_function->add_session( 'lastName', $user_function->get_user_lastName(););

		


		$res["session"] = $user_function->get_user_session();
		$res["msg"] = "Inscription effectué";
		$res["code_status"] = 0;
	}

}

json_encode($res);

?>
