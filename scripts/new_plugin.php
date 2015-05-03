<?php

require_once('class/Plugin.php');
require_once('class/User.php');
require_once('class/MySession.php');
$session = new MySession();




$user = new User();
echo $user->set_user_token($_SESSION['token']);

$plugin = new Plugin();
$plugin->set_plugin_id_user($_SESSION['id']);
$plugin->set_plugin_name($_POST['name']);
$plugin->set_plugin_categorie($_POST['categorie']);
$plugin->set_plugin_description($_POST['description']);

$plugin->new_plugin();


$res['code_status'] = 1;


$dossier = '../plugins/';
$fichier = basename($_FILES['file_upload']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['file_upload']['tmp_name']);
$extensions = array('.zip', '.7z', '.tar');
$extension = strrchr($_FILES['file_upload']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $res['msg'] = 'Vous devez uploader un fichier de type .zip ou .tar';
}
if($taille>$taille_maxi)
{
     $res['msg'] = 'Le fichier est trop gros...';
}
if(!isset($res['msg'])) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          $res['msg'] = 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          $res['msg'] = 'Echec de l\'upload !';
     }
}
else
{
     // echo $erreur;
}

json_encode($res);
echo "<script type='text/javascript'>alert('".$res['msg']."')</script>";
header('Location: ../');
exit();
?>