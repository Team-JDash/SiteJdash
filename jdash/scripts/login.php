<?php
require 'class/User.php';


// print_r($_POST);

$user_function = new User;
$user_function->set_user_email($_POST['email']);
$user_function->set_user_password($_POST['password']);

// print_r( $user_function->get_user_email() );
// print_r( $user_function->get_user_password() );
// print_r( $user_function->get_user_id() );

if (!$user_function->get_user_id()) {
	echo "<a href='../html/inscription.html'>L'utilisateur n'existe pas, veuillez cr&eacute;er un nouveau compte</a>";
}else{
	echo "<h1>vous etes logu&eacute;<br /></h1>";
	if( isset($_SESSION) )
	{
		session_start();
	}
	$_SESSION['id'] = $user_function->get_user_id();
	$_SESSION['email'] = $user_function->get_user_email();
	$_SESSION['status'] = true;
	print_r($_SESSION);
	echo "<A href='../html/'>Cliquer ici pour retourner &agrave; l'accueil.</a>";

}

//$user_function->create_user();