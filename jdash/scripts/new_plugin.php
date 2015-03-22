<?php
require 'class/Plugin.php'; 

print_r($_POST);
print_r($_FILES);

if(!isset($_SESSION)){
	echo "<a href='../html/connexion.html'>Merci de vous connecter.</a>";
}

$plugin = new Plugin();
$plugin->set_plugin_id_user($_SESSION['id']);
$plugin->set_plugin_name($_POST['name']);
$plugin->set_plugin_categorie($_POST['categorie']);
$plugin->set_plugin_description($_POST['description']);

//$plugin->new_plugin();
