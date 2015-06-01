<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../misepage/logo/carsloc.jpg">

    <title>Se connecter/s'inscrire</title>

    <link href="../../misepage/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../misepage/css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="connexion.php" method="post">
        <h2 class="form-signin-heading">Connectez vous</h2>
		<!--si champ non complété-->
		<?php
		if (!empty($_GET['error']) && ($_GET['error']=="noemail")) {
		echo '<span style="color:red">Cet email ne se trouve pas dans notre base de données</span>'; }
		?>
		<?php
		if (!empty($_GET['error']) && ($_GET['error']=="fakemdp")) {
		echo '<span style="color:red">vous vous êtes trompé dans la saisie de votre mot de passe</span>'; }
		?>
		<!--  -->
        <label for="email" class="sr-only">Adresse email</label>
        <input type="text" name="email" class="form-control" <?php if (!empty($_GET['error']) && ($_GET['error']=="noemail")) {echo 'style="border-color:red"';} ?> placeholder="Email" required autofocus>
        <label for="passe" class="sr-only">Mot de passe</label>
        <input type="password" name="passe" class="form-control" <?php if (!empty($_GET['error']) && ($_GET['error']=="fakemdp")) {echo 'style="border-color:red"';} ?> placeholder="Mot de passe" required>
        <a class="btn btn-default" href="../../livreor.php" role="button">Voir le livre d'or sans se connecter</a>
		<input type="submit" class="btn btn-default" value="Se connecter &raquo;"/>
      </form>	

    </div> <!-- /container -->

  </body>
</html>
