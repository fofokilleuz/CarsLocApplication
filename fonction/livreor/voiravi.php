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
<!-- NAVBAR si non connecte-->
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
            <li class="active"><a href="../../livreor.php">Livre d'or</a></li>
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
<!--NAVBAR si deja connecte-->
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
            <li class="active"><a href="../../livreor.php">Livre d'or</a></li>
          </ul>
		 <div class="navbar-form navbar-right"> <a class="btn btn-danger" href="../connexion/deconnexion.php" role="button">Se déconnecter</a></div>
        </div>
      </div>
    </nav>	
	
<?php
		}
?>
<!-- FIN NAVBAR -->

<!-- CONNEXION BD -->
<?php 
	include "../connexion/config.php";
	include "../connexion/database.fn.php";
	$link = database_connect($db);
	if(!$link) die("erreur de connexion a la base de donnee".mysql_error());
?>
<!--FIN CONNEXION BD -->

<!--DEBUT AFFICHAGE-->
<div class="container">
<div class="row"></br></br>
	<?php
	$idv = $_POST['id'];
	$req = $link->prepare('SELECT * FROM avis WHERE id= :id');		// On selectionne tous les ids des voitures et leurs noms
	$req -> execute(array('id' => $idv));
	while ($donnees = $req->fetch())
	{  
?>
	
<div class="col-xs-6 col-lg-4">
			<h3>Avis posté par : </h3><h4><?php echo $donnees['id_membre']; ?></h4>
			<p><?php echo $donnees['avis']; ?></p>			
</div>

	
		
<?php
	}	
		$req->closeCursor();
?>

</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>