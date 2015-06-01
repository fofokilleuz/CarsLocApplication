<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../misepage/logo/carsloc.jpg">

    <title>S'inscrire</title>

    <link href="../../misepage/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../misepage/css/signin.css" rel="stylesheet">
  </head>

  
<body>
		<div class="container">
		
		<form class="form-signin" action="insert_inscription.php" method="post">
        <h2 class="form-signin-heading">Inscrivez vous !</h2>
		
<div class="row">
<div class="col-md-6">
		
		<!--si champ erreur dans post du formulaire-->
		<?php 
		if (!empty($_GET['error']) && ($_GET['error']=="info")) {
		echo '<span style="color:red">Merci de renseigner l\'ensemble des champs requis</span><br/><br/>'; } 
		?>
		<?php
		if (!empty($_GET['error']) && ($_GET['error']=="email")) {
		echo '<span style="color:red">Cet email est déjà lié à un compte utilisateur</span>'; }
		?>
		<?php
		if (!empty($_GET['error']) && ($_GET['error']=="mailinval")) {
		echo '<span style="color:red">Merci de rentrer une adresse mail valide</span>'; }
		?>
		<?php
		if (!empty($_GET['error']) && ($_GET['error']=="mot_passedif")) {
		echo '<span style="color:red">Les mots de passe ne correspondent pas</span>'; }
		?>
		<!--  -->
		
		<h4><label for="email">Mail :</label></h4>
		<input type="text" style="width: 230px <?php if (!empty($_GET['error']) && ($_GET['error']=="mailinval")) {echo '; border-color:red';} ?>"
		class="form-control" name="email" placeholder="Votre email" onkeypress="return noenter()" <?php if (isset($email)){echo 'value="$email"';} ?>>
		
		<h4><label for="nom">Nom :</label></h4>
		<input type="text" style="width: 230px <?php if (!empty($_GET['error']) && ($_GET['error']=="info")) {echo '; border-color:red';} ?>"
		class="form-control" name="nom" placeholder="Votre nom" onkeypress="return noenter()" <?php if (isset($nom)){echo 'value="$nom"';} ?>>
		
		<h4><label for="prenom">Prénom :</label></h4>
		<input type="text" style="width: 230px <?php if (!empty($_GET['error']) && ($_GET['error']=="info")) {echo '; border-color:red';} ?>"
		class="form-control" name="prenom" placeholder="Votre prénom" onkeypress="return noenter()" <?php if (isset($prenom)){echo 'value="$prenom"';} ?>>
</div>
<div class="col-md-6">				
		<h4><label for="tel">Téléphone :</label></h4>
		<input type="text" style="width: 230px <?php if (!empty($_GET['error']) && ($_GET['error']=="info")) {echo '; border-color:red';} ?>"
		class="form-control" name="tel" placeholder="06xxxxxxxx" onkeypress="return noenter()" <?php if (isset($tel)){echo 'value="$tel"';} ?>>
		
		<h4><label for="mot_passe">Mot de passe :</label></h4>
		<input type="password" style="width: 230px <?php if (!empty($_GET['error']) && ($_GET['error']=="mot_passedif")) {echo '; border-color:red';} ?>"
		class="form-control" name="mot_passe" placeholder="Votre mot de passe" onkeypress="return noenter()" <?php if (isset($mot_passe)){echo 'value="$mot_passe"';} ?>>
		
		<h4><label for="mot_passe2">Confirmation du mot de passe :</label></h4>
		<input type="password" style="width: 230px <?php if (!empty($_GET['error']) && ($_GET['error']=="mot_passedif")) {echo '; border-color:red';} ?>"
		class="form-control" name="mot_passe2" placeholder="Confirmation du mdp" onkeypress="return noenter()" <?php if (isset($mot_passe2)){echo 'value="$mot_passe2"';} ?>>
		
		</br></br></br>
</div>
		<input type="submit" class="btn btn-primary btn-lg" value="Valider"></div>		

</div>
	
	
	</form>
		</div> <!-- /container -->
      
  </body>
</html>