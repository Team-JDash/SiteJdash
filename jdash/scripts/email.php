<?php

print_r($_POST);

$name = $_POST["nom"];
$first_name = $_POST["prenom"];
$entreprise = $_POST["entreprise"];
$mail = $_POST["email"];
$phone = $_POST["telephone"];
$personnal_site = $_POST["site_web"];
$message = $_POST["message"];


//dans le cas ou les lignes comportes pus de 70 caracteres, nous les coupons en utilisant wordwrpa()
$message = wordwrap($message, 70, "\r\n");


 $to      = 'vincnet.iam@gmail.com';
 $subject = 'Formulaire de contact';
 $message = '<html>
 				Vous avez re&ccedil;us un nouveau message<br />
 				De: '.$name.' '.$first_name.'<br />
 				E-mail: '.$mail.'<br />
 				Entreprise: '.$entreprise.'<br />
 				Telephone: '.$phone.'<br />
 				<br />
 				<br />
 				Message: '.$message.'<br />
 			</html>
			';
 $headers = "From: ".$mail." " . "\r\n" .
 			"Reply-To: ".$mail."" . "\r\n";

mail($to, $subject, $message, $headers);

?>