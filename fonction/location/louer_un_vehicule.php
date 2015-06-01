<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	
<?php include "../connexion/config.php";
		include "../connexion/database.fn.php";
		include "headform.php"; ?>

<body>
    <div class="container">
      <form class="form-signin" action="insert_louer.php" method="post" enctype="multipart/form-data">
	  
        <h1 class="form-signin-heading">Nouvelle location</h1></br>
		
<div class="row">
<div class="col-md-6">

		<!--si erreur dans le formulaire-->
		<?php 
		if (!empty($_GET['error']) && ($_GET['error']=="dateprise")) {
		echo '<span style="color:red">Ce véhicule est déjà loué à ces dates</span><br/><br/>'; } 
		?>
		<?php
		if (!empty($_GET['error']) && ($_GET['error']=="dateval")) {
		echo '<span style="color:red">Merci d\'établir une location d\une période au moins égale à un jour.</span>'; }
		?>
		<?php 
		if (!empty($_GET['error']) && ($_GET['error']=="info")) {
		echo '<span style="color:red">Merci de renseigner l\'ensemble des champs requis</span><br/><br/>'; } 
		?>
		<!--  -->

        <h4><label for="nom">Nom de la voiture / prix journée :</label></h4>
		<select name="nom" id="nom">
		<?php include "affiche_nom.php"; ?>	
		</select>
		
		<h4><label for="idsup">Option facultative :</label></h4>
		<select name="idsup" id="idsup">
		<?php include "affichesup.php"; ?>	
		</select>

        <h4><label for="datedeb">Date début de location :</label></h4>
		<input id="datedeb" name="datedeb" type="date"  style="width: 230px <?php if (!empty($_GET['error']) && ($_GET['error']=="dateval")) {echo '; border-color:red';} ?>"
			class="form-control" placeholder="2015-07-19" required>
		
		<h4><label for="datefin">Date fin de location :</label></h4>
		<input id="datefin" name="datefin" type="date"  style="width: 230px <?php if (!empty($_GET['error']) && ($_GET['error']=="dateval")) {echo '; border-color:red';} ?>"
			class="form-control" placeholder="2015-07-23" required>
	
</div>
</div>

		</br>
		<a class="btn btn-primary btn-lg" href="../../location.php" role="button">Précédent</a>
		<input type="submit" class="btn btn-primary btn-lg" value="Valider &raquo;">
		
		
</form>	
</div> <!-- /container -->
</body>
  
</html>