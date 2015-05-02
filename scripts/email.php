<?php
// 33R7a>A>63
// print_r($_POST);

$name = $_POST["nom"];
$first_name = $_POST["prenom"];
$entreprise = $_POST["entreprise"];
$mail = $_POST["email"];
$phone = $_POST["telephone"];
$personnal_site = $_POST["site_web"];
$message = $_POST["message"];


//dans le cas ou les lignes comportes pus de 70 caracteres, nous les coupons en utilisant wordwrpa()
$message = wordwrap($message, 70, "\r\n");

ini_set('SMTP','mx1.hostinger.fr');
$to      = 'ileossa@jdash.esy.es';
$subject = 'Formulaire de contact';
$message = '<html>
 				Vous avez re&ccedil;us un nouveau message<br />
 				De: '.$name.' '.$first_name.'<br />
 				E-mail: '.$mail.'<br />
 				Entreprise: '.$entreprise.'<br />
 				Telephone: '.$phone.'<br />
 				<br />
 				<br />
        Pour le consulter : http://webmail.hostinger.fr <br />
 				Message: '.$message.'<br />
 			</html>
			';
$headers = "From: ".$mail." " . "\r\n" .
 			"Reply-To: ".$mail."" . "\r\n";



 $res["msg"]="email envoyé";
 $res["code_status"] = 0;



mail($to, $subject, $message, $headers);
json_encode($res);



?>
