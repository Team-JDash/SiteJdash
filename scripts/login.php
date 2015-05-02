<?php

require_once('class/User.php');


// print_r($_POST);

$user_function = new User;
$user_function->set_user_email($_POST['email']);
$user_function->set_user_password($_POST['password']);

// print_r( $user_function->get_user_email() );
// print_r( $user_function->get_user_password() );




if( !$user_function->user_exist() ) {
	$res["msg"] = "L'utilisateur n'existe pas, veuillez créer un nouveau compte";
}else{

	if( isset($_SESSION) )
	{
		session_start();
	}
	$_SESSION['id'] = $user_function->get_user_id();
	$_SESSION['email'] = $user_function->get_user_email();
	$_SESSION['status'] = true;
	$_SESSION["token"] = $user_function->get_user_token();

	$res["code_status"] = 0;
	$res["msg"] = "vous etes logué";
	$res["session"] = $_SESSION;
}

print_r(json_encode($res));
