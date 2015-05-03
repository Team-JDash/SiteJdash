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

    <title>Administrer Plug-ins Jdash</title>

    <!-- Bootstrap core CSS -->
      <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
      <link href="../css/justified-nav.css" rel="stylesheet" />
      <link href="../css/addPlugin.css" rel="stylesheet" />
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
        <h3><u><em>Modifier votre plug-in</em></u></h3>

          <p >Cette page permet aux utilisateurs de l'application Jdash de modifier les descriptions ainsi que les fichiers de leurs plugins Java.</p>

          <br /><br />

<form action="../scripts/update_plugin.php" method="post">
                <div class="row">

  <div class="col-sm-4">
    <input class="form-control" name="nom" placeholder="nom" required="" type="text"><br/>
    <input class="form-control" name="categorie" placeholder="Catégorie" required="" type="text">
       </div>
  <div class="col-sm-4">
     <textarea class="form-control" name="description" placeholder="Inserez la description de votre plug-in ici."></textarea>
  </div>


  <div class="col-sm-4">
      <label for="file">Chemin du plug-in</label>
    <input type="file" accept =".jar" id="file">
      <button type="submit">Enregistrer</button>
  </div>
</div>
                </div>
</form>

      </div>
        
		</div><!--/row-->

      <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
