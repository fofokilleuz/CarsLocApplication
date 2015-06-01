<!DOCTYPE html>
<html lang="en">

	<?php include "fonction/location/headloc.php"; ?>

  <body>
    
	<?php include "fonction/location/navbar.php"; ?>
	
    <div class="container">
	<div class="row">
      <div class="row row-offcanvas row-offcanvas-right">
		
		<div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-danger btn-xs" data-toggle="offcanvas">nos partenaires</button>
          </p>
          <div class="jumbotron">
            <h1>Bienvenue dans l'espace location</h1>
            <p>Vous pouvez louer un véhicule, poster un avi sur vos locations passés, n'hésitez pas à aller dans la Gallerie pour plus d'informations sur nos véhicules !</p>
			<p><a class="btn btn-danger btn-lg" href="fonction/location/louer_un_vehicule.php" role="button">Louer un véhicule ici &raquo;</a></p>
          </div>
        </div><!--/.col-xs-12.col-sm-9-->
			  <?php include "fonction/location/partenaire.php"; ?>
      </div>
	  </div><!--/row-->
	  
	  <div class="row">
      <div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-12">
		
			<?php
			include "fonction/connexion/config.php";
			include "fonction/connexion/database.fn.php";
			$link = database_connect($db);
			if(!$link) die("erreur de connexion a la base de donnee".mysql_error());
			include "fonction/location/affichagegalerie.php"; //on va chercher la boucle afin d'afficher la gallery
			?>
		  
        </div><!--/.col-xs-12.col-sm-9-->
<div class="clearfix visible-xs-block"></div>			
      </div>
	  </div><!--/row-->

	  
	<?php include "fonction/index/copyright.php"; ?>	
    </div><!--/.container-->


   
    <script src="offcanvas.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>
