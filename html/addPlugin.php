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
    <!-- Custom styles for this template -->
      <link href="../css/justified-nav.css" rel="stylesheet" />
      <link href="../css/addPlugin.css" rel="stylesheet" />
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
            <li class="active"><a href="plugin.php">Les plug-ins</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </nav>
      </div>
        <!-- CONNEXION BAAAAR -->



      <!-- Jumbotron -->
      <div class="jumbotron" style="background-color:whitesmoke;">
        <h3><u><em>Ajouter votre plug-in</em></u></h3>

          <p >Cette page permet aux utilisateurs de l'application Jdash de partager leurs plugins Java.</p>

          <br /><br />
          <form action="../scripts/new_plugin.php" id="addPlugin" method="post" enctyp="multipart/form-data">
              <div class="row">
                <div class="col-sm-4">
                  <input class="form-control" id="name" name="name" placeholder="name" required="" type="text"><br/>
                  <input class="form-control" id="categorie" name="categorie" placeholder="Catégorie" required="" type="text">
                </div>
                <div class="col-sm-4">
                  <textarea class="form-control" id="description" name="description" placeholder="Inserez la description de votre plug-in ici."></textarea>
                </div>
                <div class="col-sm-4">
                    <label for="file_upload">Chemin du plug-in</label>
                    <input type="file" accept =".zip" id="file_upload" name="file_upload">
                    <input type="submit" name="upload" value="Envoyer le fichier">
                </div>
              </div>
            </div>
          </form>

			</div>
    

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/addplugin.js"></script>
  </body>
</html>
