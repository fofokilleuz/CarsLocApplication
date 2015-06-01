<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>
	
	
<body>
    
	<?php include "banniere.php"; ?>
	
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
		
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
		  
          <div class="jumbotron">
            <h1>Bienvenue dans l'espace administrateur</h1>
            <p>Il vous est possible d'ajouter de nouvelles voitures de location, ou bien de modifier et supprimer des anciennes!</p>
          </div>
        </div>
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item active">Vous voulez :</a>
            <a href="ajout_voiture.php" class="list-group-item">Ajouter une voiture</a>
            <a href="#" class="list-group-item">Modifier une voiture</a>
            <a href="suppr_voiture.php" class="list-group-item">Supprimer une voiture</a>
            <a href="planning_location.php" class="list-group-item">Voir le planning Location</a>
          </div>
        </div>	
      </div><!--/row-->

      <hr>

	  <footer>
        <p>&copy; CarsLoc Industry 2015 by Geoffray Faustine</p>
      </footer>
    </div><!--/.container-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>
