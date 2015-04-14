<?php
require 'class/User.php';


// print_r($_POST);

$user_function = new User;
$user_function->set_user_email($_POST['email']);
$user_function->set_user_password($_POST['password']);

// print_r( $user_function->get_user_email() );
// print_r( $user_function->get_user_password() );
// print_r( $user_function->get_user_id() );

if ($user_function->get_user_id() == null) {
	$res[] = "L'utilisateur n'existe pas, veuillez cr&eacute;er un nouveau compte";
}else{
	
	if( isset($_SESSION) )
	{
		session_start();
	}
	$_SESSION['id'] = $user_function->get_user_id();
	$_SESSION['email'] = $user_function->get_user_email();
	$_SESSION['status'] = true;
	
	$res["code_status"] = 0;
	$res["msg"] = "vous etes logu&eacute";
	$res["session"] = $_SESSION;
	//$res[] = "<A href='../html/'>Cliquer ici pour retourner &agrave; l'accueil.</a>";

}

print_r(json_encode($res));


