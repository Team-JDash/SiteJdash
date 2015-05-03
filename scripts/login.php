<?php

require_once('class/User.php');
require_once('class/MySession.php');
session_start();




$user_function = new User;
$user_function->set_user_email($_POST['email']);
$user_function->set_user_password($_POST['password']);






if( !$user_function->user_exist() ) {
	$res["msg"] = "L'utilisateur n'existe pas, veuillez créer un nouveau compte";

}else{

	$session = new MySession();		
	

	$_SESSION['id'] = $user_function->get_user_id();
	$_SESSION['email'] = $user_function->get_user_email();
	$_SESSION['status'] = true;
	$_SESSION["token"] = $user_function->get_user_token();

	$res["code_status"] = 0;
	$res["msg"] = "vous etes logué";
	$res[$user_function->get_user_token()] = $_SESSION;

	

}

json_encode($res);


echo "<script type='text/javascript'>alert('".$res['msg']."')</script>";
header('Location: ../');
exit();
