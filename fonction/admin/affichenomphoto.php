<?php
	include "../connexion/config.php";
	include "../connexion/database.fn.php";
	$link = database_connect($db);
	$reponse = $link->query('SELECT nom,annee,marque,modele,photo FROM voiture order by annee');		// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{  
	$my_image = $donnees['photo'];
	$repertoire = "../../misepage/photo/";
?>

		
<div class="col-xs-6 col-lg-4">


			<h2><?php echo $donnees['nom']; ?></h2>
			<img class="img-rounded" src="<?php echo $repertoire.$my_image; ?>" alt="Image non chargée" width="205" height="159" /><br />
			<p>Marque : <?php echo $donnees['marque']; ?></br>Modèle : <?php echo $donnees['modele']; ?></br>Année : <?php echo $donnees['annee']; ?></br></p>
			
</div>


<?php
	}	
	$reponse->closeCursor();
?>
