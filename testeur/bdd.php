<?php
static $servername = "sql2.olympe.in";
static $dbname = "u4kztq8m";
static $username = "u4kztq8m";
static $password = "123";


/*try {
    $conn = new PDO("mysql:host=$servername;dbname=u228546755_jdash", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }*/






try{
	$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 

		
	$stmp = $dbh->prepare("INSERT INTO `$dbname`.`utilisateur`
				(NoUtilisateur, nom, prenom, login, password, mail) VALUES (NULL, :lastName, :firstName, :pseudo, :password, :mail )");

	$stmp->bindParam(':lastName', $lastName);
	$stmp->bindParam(':firstName', $firstName);
	$stmp->bindParam(':pseudo', $pseudo);
	$stmp->bindParam(':password', $password);
	$stmp->bindParam(':mail', $mail);
	
	$lastName = $_POST['prenom'];
	$firstName = $_POST['nom'];
	$pseudo = $_POST['pseudo'];
	$password = $_POST['password'];
	$mail = $_POST['email'];

			
	$res = $stmp->execute();
	print_r($res);
	$dbh=null;

}catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}

    
	



		
?>

