<?php
	$reponse = $link->query('SELECT id,nom,marque,modele,annee,prixj,com,photo FROM voiture order by annee');		// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{  
	$my_image = $donnees['photo'];
	$repertoire = "misepage/photo/";
?>


<div class="col-xs-6 col-lg-4">
			<h2><?php echo $donnees['nom']; ?></h2>
			<img class="img-rounded img-responsive" src="<?php echo $repertoire.$my_image; ?>" alt="Image non chargée" width="273" height="212" /><br />
			<p>Marque : <?php echo $donnees['marque']; ?></br>Modèle :<?php echo $donnees['modele']; ?></br>Année :<?php echo $donnees['annee']; ?></br></p>
			<p><?php echo $donnees['com']; ?></p>
			
            <p><a class="btn btn-danger" href="fonction/location/louer_un_vehicule.php" role="button">Louer la voiture &raquo;</a></p>
</div>

<?php
	}	
	$reponse->closeCursor();
?>