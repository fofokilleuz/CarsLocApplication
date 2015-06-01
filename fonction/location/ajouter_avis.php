<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include "headform.php"; ?>

<body>

<?php include "meslocationshead.php"; ?>

    <div class="container">
      <form class="form-signin" action="insert_ajouter_avis.php" method="post" enctype="multipart/form-data">
	  

<h1 class="form-signin-heading">Ajouter votre avis</h1></br>		
<div class="row">
<div class="col-md-6">
        <h4><label for="id">Nom de la voiture :</label></h4>
        <select name="id" id="id">
				<?php include "affiche_nom_id.php"; ?>	
		</select>

		<h4><label for="avis">Votre avis :</label></h4>
		<textarea id="avis" name="avis" type="text" class="form-control" rows="12" required></textarea>		
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
