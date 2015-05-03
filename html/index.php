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
      <link href="../css/ac.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
      <link href="../css/justified-nav.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="ressources/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="container" style="background-color:whitesmoke;">
        <!-- CONNEXION BAAAAR -->
      <div class="masthead">
        <nav>
          <ul class="nav nav-justified">
              <li class="active"><a href="index.php">Accueil</a></li>
            <li><a href="jdash.php">Jdash</a></li>
            <li><a href="inscription.php" class="inscription">S'inscrire</a></li>
            <li><a href="connexion.php">Se connecter</a></li>
            <li><a href="download.php">Downloads</a></li>
            <li><a href="plugin.php">Les plug-ins</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </nav>
      </div>
        <!-- CONNEXION BAAAAR -->



      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Jdash! c'est plus fort que toi !!! </h1><img src="../images/logo.png" />
        <p class="lead">Page de garde pour l'application Jdash, projet r&eacute;alis&eacute; dans le cadre de projet de fin d'&eacute;tude de troisi&eacute;me ann&eacute;e.</p>
        <p><a class="btn btn-lg btn-success" href="jdash.php" role="button">&#8658; Commence ici &#8656;</a></p>


        <!-- search -->
        <div class="center-block">
          <form class="form-inline">
            <div class="form-group">

              <div class="input-group">
                <div class="input-group-addon">$</div>
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="ex: m&eacute;t&eacute;o, facebook, ...">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">chercher</button>
          </form>
        </div>
        
      </div>




      <br/>


    </div> <!-- /container -->

    </div>
    </div>
    <br /><br /><br />
  </body>
</html>
