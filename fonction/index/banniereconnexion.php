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
            <li class="active"><a href="index.php">Accueil</a></li>
			<li><a href="fonction/connexion/signin.php">Location</a></li>
            <li><a href="livreor.php">Livre d'or</a></li>
			</ul>
			<form class="navbar-form navbar-right" action="fonction/connexion/connexion.php" method="post">
				<div class="form-group">
				<input type="text" name="email" placeholder="Email" class="form-control">
				</div>
				<div class="form-group">
				<input type="password" name="passe" placeholder="Mot de passe" class="form-control">
				</div>
            <button type="submit" class="btn btn-success">Se connecter</button>
			<a class="btn btn-danger" href="fonction/connexion/inscription.php" role="button">S'inscrire</a>
			</form>
        </div>
      </div>
    </nav>

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
            <li><a href="fonction/location/meslocations.php">Mes locations</a></li>
			<li><a href="location.php">Location</a></li>
            <li><a href="livreor.php">Livre d'or</a></li>
          </ul>
		 <div class="navbar-form navbar-right"> <a class="btn btn-danger" href="fonction/connexion/deconnexion.php" role="button">Se déconnecter</a></div>
        </div>
      </div>
    </nav>	
	
<?php
		}
?>