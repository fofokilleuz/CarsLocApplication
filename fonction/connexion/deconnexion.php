<?php
  // Suppression du cookie email
  setcookie('email','',time(),'/',null,false,true);
  // Suppression de la valeur du tableau $_COOKIE
  unset($_COOKIE['email']);
  // Suppression du cookie passe
  setcookie('passe','',time(),'/',null,false,true);
  // Suppression de la valeur du tableau $_COOKIE
  unset($_COOKIE['passe']);
  ?>
  

  
<!DOCTYPE html>
<html lang="en">

<!--HEAD-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="misepage/logo/carsloc.jpg">

    <title>CarsLoc - Louer les voitures de vos rêves</title>

    <link href="../../misepage/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../misepage/css/livreor.css" rel="stylesheet">
</head>
<!--FIN HEAD-->	

<body>	
<!-- NAVBAR si bien deconnecte-->
<?php if($_COOKIE['email'] == null && $_COOKIE['passe'] == null)
		{
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CarsLoc</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
            <li><a href="../../index.php">Accueil</a></li>
			<li><a href="../connexion/signin.php">Location</a></li>
            <li><a href="../../livreor.php">Livre d'or</a></li>
			</ul>
			<form class="navbar-form navbar-right" action="../connexion/connexion.php" method="post">
				<div class="form-group">
				<input type="text" name="email" placeholder="Email" class="form-control">
				</div>
				<div class="form-group">
				<input type="password" name="passe" placeholder="Password" class="form-control">
				</div>
            <button type="submit" class="btn btn-success">Se connecter</button>
			<a class="btn btn-danger" href="../connexion/inscription.php" role="button">S'inscrire</a>
			</form>
        </div>
      </div>
</nav>

<div class="container">
<div class="row"></br></br>

<div class="col-xs-6 col-lg-4">
			<h3>Vous avez bien été déconnecté !</h3>			
</div>
</div>
</div>
<!--NAVBAR si toujours pas deconnecte-->
<?php
		}
		else{
?>		

	<nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Cars Loc</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="../location/meslocations.php">Mes locations</a></li>
			<li><a href="../../location.php">Location</a></li>
            <li><a href="../../livreor.php">Livre d'or</a></li>
          </ul>
		 <div class="navbar-form navbar-right"> <a class="btn btn-danger" href="../connexion/deconnexion.php" role="button">Se déconnecter</a></div>
        </div>
      </div>
    </nav>	
	
<?php
		}
?>
<!-- FIN NAVBAR -->
</body>
</html>
  

