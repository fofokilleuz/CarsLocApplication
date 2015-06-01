<?php
	include "../connexion/config.php";
	include "../connexion/database.fn.php";
	$link = database_connect($db);
	$reponse = $link->query('SELECT nom,id FROM voiture order by nom');		// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{  
?>

		<option name="id" value="<?php echo $donnees['id']; ?>" checked><?php echo $donnees['nom']; ?></option><br>

<?php
	}	
	$reponse->closeCursor();
?>