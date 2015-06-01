<!DOCTYPE html>
<html lang="en">

	<?php include "fonction/index/head.php"; ?>

<body>


	<?php include "fonction/index/banniereconnexion.php"; ?>

	<img src="misepage/logo/banniere.jpg" class="img-responsive" alt="Responsive image">
</br>

    <div class="container">
      <!-- Example row of columns -->
		<div class="row">
        <div class="col-md-6">
		<div class="jumbotron">
          <h2>Livre d'or</h2>
          <p>Dans notre livre d'or nous vous présentons toutes nos voitures disponibles à la location.</br> Vous pouvez de même consulter tous les avis de nos clients sur leurs expériences avec CarsLoc ! Ils font parfois des citytrips insolites, n'hésitez pas à consulter leurs avis !</p>
          <p><a class="btn btn-danger" href="livreor.php" role="button">Livre d'or &raquo;</a></p>
       </div>
	   </div>
	   
	   <div class="col-md-6">
	   <div class="jumbotron">
          <h2>Louer une voiture</h2>
          <p>Louer un voiture en quelques clics ! </br>Vous choisissez une voiture, la durée de location, un pack en option, votre location est effectuée ! </br>Inscrivez vous ou connectez vous pour avoir accès à l'espace location.</p>
          <p><a class="btn btn-danger" href="fonction/connexion/signin.php" role="button">Se connecter</a>
			<a class="btn btn-danger" href="fonction/connexion/inscription.php" role="button">S'inscrire</a></p>
        </div>
		</div>
		</div>
		
		<div class="row">
		<div class="col-xs-12 col-sm-9">
		<div class="jumbotron">
          <h2>Vous êtes administrateur</h2>
          <p>Vous êtes administrateur et souhaitez consulter le planning des locations, ajouter ou supprimer une voiture ? C'est par ici !</p>
          <p><a class="btn btn-danger" href="fonction/admin/admin.php" role="button">Espace administrateur &raquo;</a></p>
        </div>
      </div>
	  </div>

      <hr>

	  <?php include "fonction/index/copyright.php"; ?>
    </div> <!-- /container -->
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  </body>
</html>
