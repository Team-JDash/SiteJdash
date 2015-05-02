<?php

require_once('class/Plugin.php');


 if (!isset($_SESSION)) 
 {
 	print_r($_SESSION);
 	print_r($_POST);
	print_r($_FILES);

	if(!isset($_SESSION)){
		echo "<a href='../html/connexion.html'>Merci de vous connecter.</a>";
	}

	$plugin = new Plugin();
	// $plugin->set_plugin_id_user($_SESSION['id']);
	$plugin->set_plugin_id_user(9);
	$plugin->set_plugin_name($_POST['nom']);
	$plugin->set_plugin_categorie($_POST['categorie']);
	$plugin->set_plugin_description($_POST['description']);


	$plugin->update_plugin();
 	
 }
 else
 {
	echo "<a href='../html/connexion.html'>Merci de vous connecter</a>";
 	exit();
 }

