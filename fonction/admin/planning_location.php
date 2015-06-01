<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>
	
	
<body>
    
	<?php include "banniere.php"; ?>
<div class="container">	
<div class="row">

<?php
	include "../connexion/config.php";
	include "../connexion/database.fn.php";
	$link = database_connect($db);
	if(!$link) die("erreur de connexion a la base de donnee".mysql_error());
	
		//on sélectionne toutes les locations
	$req = $link-> prepare('SELECT location.nom,membres.email,membres.tel,membres.prenom,location.datedeb,location.datefin,location.prixt,location.nocontrat FROM location , membres
						WHERE location.id_membre=membres.id_membre
						ORDER BY datedeb');	
	$req -> execute(array());
	
	while($donnees = $req->fetch())
	{  						
?>
<div class="col-xs-6 col-lg-3">	
			<h3>Location de <?php echo $donnees['nom']; ?></h3>
			<h4>Par <?php echo $donnees['email']; ?></h4>
			<p>Le tel de <?php echo $donnees['prenom']; ?> : <?php echo $donnees['tel']; ?></p>
			Période du <?php echo $donnees['datedeb']; ?> au <?php echo $donnees['datefin']; ?></p>
			<p>Prix total : <?php echo $donnees['prixt']; ?>€</p>
			<p>Contrat numéro : <?php echo $donnees['nocontrat']; ?></p>
			<br />
</div>
<?php
	}	
	$req->closeCursor();
?>

</div>	
	
	<footer>
        <p>&copy; CarsLoc Industry 2015 by Geoffray Faustine</p>
    </footer>
	
</div>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>