<?php
require_once('../scripts/class/MySession.php');
$session = new MySession();



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jdash">
    <meta name="author" content="">
    <link rel="icon" href="ressources/favicon.ico">

    <title>Jdash web site</title>

    <!-- Bootstrap core CSS -->
      <link href="../css/bootstrap.min.css" rel="stylesheet" />
      <link href="../css/contact.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
      <link href="../css/justified-nav.css" rel="stylesheet" />


  </head>
  <body>
    <div class="container">
        <!-- CONNEXION BAAAAR -->
      <div class="masthead">
        <nav>
          <ul class="nav nav-justified">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="jdash.php">Jdash</a></li>
            <li><a href="inscription.php">S'inscrire</a></li>
            <li><a href="connexion.php">Se connecter</a></li>
            <li><a href="download.php">Downloads</a></li>
            <li><a href="plugin.php">Les plug-ins</a></li>
            <li class="active"><a href="contact.php">Contact</a></li>
          </ul>
        </nav>
      </div>
        <!-- CONNEXION BAAAAR -->

      <!-- Jumbotron -->
      <div class="jumbotron" style="background-color:whitesmoke;">
              <div class="row">
			<h2 class="text-center"><u><em>Gardons le contact</em></u></h2>
                  <p style="background-color:gray;" class="auto-style4">L'&eacute;quipe Jdash vous remercie d'avoir visit&eacute; leur site. Pour toutes remarques ou id&eacutees constructives, vous pouvez nous contacter &agrave; l'aide de la fiche ci-dessous.</p>

			<hr>
			<div class="col-sm-8">

			<form role="form" id="emailForm" method="post" action="../scripts/email.php">
				<div class="row form-group">
					<div class="col-xs-3">
						<input class="form-control" id="firstName" name="nom" placeholder="Nom" required="" type="text">
					</div>
					<div class="col-xs-3">
						<input class="form-control" id="middleName" name="prenom" placeholder="Pr&eacute;nom(s)" required="" type="text">
					</div>
					<div class="col-xs-4">
						<input class="form-control" id="lastName" name="entreprise" placeholder="Votre entreprise" required="" type="text">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-5">
						<input class="form-control" id="email" name="email" placeholder="Email" required="" type="email">
					</div>
					<div class="col-xs-5">
						<input class="form-control" name="telephone" placeholder="Num&eacute;ro" required="" type="tel">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-10">
						<input class="form-control" placeholder="URL Site Web" name="site_web" required="" type="homepage">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-10">
						<textarea class="form-control" rows="5" id="message" name="message" placeholder="Laissez votre message ici"></textarea>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-xs-10">
						<button class="btn btn-default pull-right">Envoyer</button>
					</div>
				</div>
			</form>

			</div>
			<div class="col-sm-3 pull-right">
				<address>
					<strong>Jdash Company</strong><br>
					<span id="adresse-customized">
						242 rue Faubourg st antoine, 75012<br>
					</span>
					Telephone: 01 23 45 67 89
				</address>
			</div>
		</div><!--/row-->
      </div>



      

    </div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="js/mustache.js"></script>
    <script type="text/javascript" src="js/email.js"></script>
  </body>
</html>
