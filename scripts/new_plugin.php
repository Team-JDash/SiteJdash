<?php

require_once('class/Plugin.php');
require_once('class/User.php');

print_r($_POST);
print_r($_COOKIE);
// print_r($_SESSION);
print_r($_FILES);

$user = new User();
$user->set_user_token($_POST['token']);

$plugin = new Plugin();
$plugin->set_plugin_id_user($user->get_user_id());
$plugin->set_plugin_name($_POST['name']);
$plugin->set_plugin_categorie($_POST['categorie']);
$plugin->set_plugin_description($_POST['description']);

$plugin->new_plugin();


$res['code_status'] = 1;
// Copie dans le repertoire du script avec un nom
// incluant l'heure a la seconde pres 
$repertoireDestination = "../plugins/";
$nomDestination        = $_FILES["file_upload"]['name'];


if (is_uploaded_file($_FILES["file_upload"]["tmp_name"])) {
    if (rename($_FILES["file_upload"]["tmp_name"], $repertoireDestination.$nomDestination)) {
        $res['msg'] = "Le fichier ".$_FILES["file_upload"]["name"]." a été correctement téléchargé et déplacé vers ".$repertoireDestination.$nomDestination;
        $res['code_status'] = 0;
    } else {
        $res['msg'] = "Le déplacement du fichier a échoué vérifiez l'existence du répertoire ".$repertoireDestination;
    }          
} else {
    $res['msg'] = "Le fichier n'a pas été uploadé. Vérifier le format du fichier, uniquement ZIP !!";
}

print_r(json_encode($res));

?>