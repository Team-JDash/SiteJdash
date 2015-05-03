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

    <title>Inscription Jdash</title>

      <link href="../css/bootstrap.min.css" rel="stylesheet" />
      <link href="../css/inscription.css" rel="stylesheet" />
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
            <li class="active"><a href="inscription.php" class="inscription">S'inscrire</a></li>
            <li><a href="connexion.php">Se connecter</a></li>
            <li><a href="download.php">Downloads</a></li>
            <li><a href="plugin.php">Les plug-ins</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </nav>
      </div>
        <!-- CONNEXION BAAAAR -->

        <!-- Jumbotron -->
        <div class="jumbotron" style="background-color : whitesmoke;" >
        <div class="row">
          <div class="col-sm-10">

            <form class="form-horizontal" id="New"  method="post" action="../scripts/new_user.php">

              <h2 style="margin-left:25%"><u><em>Cr&eacute;e un compte</em></u></h2>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nom</label>
                  <div class="col-sm-9">
                      <input type="text" name="nom" class="form-control" id="pseudo" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Prenom</label>
                  <div class="col-sm-9">
                      <input type="text" name="prenom" class="form-control" id="pseudo">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Pseudo</label>
                  <div class="col-sm-9">
                      <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="pseudo">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="exemple@jdash.com">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                      <input type="password" name="password" class="form-control" id="inputPassword3">
                      <input type="password" name="password_bis" class="form-control" id="inputPassword3" placeholder="Retry">
                  </div>
              </div>
              <div class="form-group last">
                  <div class="col-sm-offset-3 col-sm-9">
                      <button type="submit" class="btn btn-success btn-sm">Envoyer</button>
                      <button type="reset" class="btn btn-default btn-sm">Annuler</button>
                  </div>
              </div>
            </form>
  			   </div>
         </div>
        </div>



    

    </div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="js/mustache.js"></script>
    <script type="text/javascript" src="js/new.js"></script>
  </body>
</html>
