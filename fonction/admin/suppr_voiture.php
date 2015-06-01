<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include "../location/headform.php"; ?>

<body>

	<?php include "banniere.php"; ?>

    <div class="container">

	<form class="form-signin" action="insert_suppr_voiture.php" method="post" enctype="multipart/form-data">
	  
        <h1 class="form-signin-heading">Suppression d'une voiture</h1></br>
		
<div class="row">
<div class="col-md-8">
			<h4><label for "nom">Afin d'être sûr que vous ne fassiez pas de bêtises, merci de réécricre le nom de la voiture à supprimer</label></h4>
</div>
</div>
<div class="row">
	<div class="col-md-6">			
			<input id="nom" name="nom" type="text" class="form-control" placeholder="nom de la voiture, ex : Raoul Caroule" required autofocus> </br>
			<input type="submit" value="Supprimer" class="btn btn-primary btn-lg">
	</div>
</div>
<div class="row">
			<?php include "affichenomphoto.php"; ?>
</div>

		
</form>
</div> <!-- /container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
  
</html>