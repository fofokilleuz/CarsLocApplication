<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include "../location/headform.php"; ?>

<body>

	<?php include "banniere.php"; ?>

    <div class="container">
      <form class="form-signin" action="insert_ajout_voiture.php" method="post" enctype="multipart/form-data">
	  
        <h1 class="form-signin-heading">Ajout d'une voiture</h1></br>
		
<div class="row">
<div class="col-md-6">
        <h4><label for="nom">Nom de la voiture :</label></h4>
        <input id= "nom" name="nom" type="text" class="form-control" placeholder="nom/surnom de la voiture" required autofocus>
		
        <h4><label for="marque">Marque de la voiture :</label></h4>
        <input id="marque" name="marque" type="text" class="form-control" placeholder="marque de la voiture" required>
		
		<h4><label for="modele">Modèle de la voiture :</label></h4>
        <input id="modele" name="modele" type="text" class="form-control" placeholder="modèle de la voiture" required>
		
		<h4><label for="annee">Année de la voiture :</label></h4>
        <input id="annee" name="annee" type="text" class="form-control" placeholder="ex : 1994" required>
		
		<h4><label for="prixj">Prix à la journée :</label></h4>
		<div class="input-group">
        <input id="prixj" name="prixj" type="text" class="form-control" placeholder="ex : 199" required>
		<span class="input-group-addon">€</span>
		</div>	
</div>

<div class="col-md-6">
		
		
		<h4><label for="photo"> Ajouter une photo :</label></h4>
		<input type="hidden" name="MAX_FILE_SIZE" value="300000">
		<input type="file" id="photo" name="photo" class="btn btn-info">	
		
		

		<h4><label for="com">Description de la voiture :</label></h4>
		<textarea id="com" name="com" type="text" class="form-control" rows="12" required>
		</textarea>

</div>
</div>

		</br>
		<input type="submit" class="btn btn-primary btn-lg" value="Valider">
		
</form>	
</div> <!-- /container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
  
</html>


