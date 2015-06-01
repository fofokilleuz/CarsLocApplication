<?php	

//on récupère les donnees
		//l'email du membre
	
	if (isset($_COOKIE['email'])) {
		$email = $_COOKIE['email'];
	}else {
	echo 'Merci d\'activer les cookies sur votre navigateur de vous déconnecter et de vous reconnecter';
		}
		//l'id du membre
	$req = $link-> prepare('SELECT id_membre FROM membres WHERE email="'.$email.'"');
	$req -> execute(array( 'email' => $email));
	$id_membre = $req -> fetch();
	$req -> closeCursor();
	
		//on sélectionne ses locations
	$req = $link-> prepare('SELECT * FROM location, voiture
						WHERE location.nom=voiture.nom AND id_membre= :idm
						ORDER BY datedeb');	
	$req -> execute(array('idm' => $id_membre[0]));
	while($donnees = $req->fetch())
	{  						
	$my_image = $donnees['photo'];
	$repertoire = "../../misepage/photo/";
?>

<div class="col-xs-6 col-lg-4">
			<h3>Location de <?php echo $donnees['nom']; ?></h3>
			<p>Période du <?php echo $donnees['datedeb']; ?> au <?php echo $donnees['datefin']; ?></p>
			<p>Prix total : <?php echo $donnees['prixt']; ?>€</p>
			<img class="img-rounded" src="<?php echo $repertoire.$my_image; ?>" alt="Image non chargée" width="250" height="180" /><br />
</div>

<?php
	}	
	$req->closeCursor();
?>