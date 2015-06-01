<?php

	$link = database_connect($db);
	$reponse = $link->query('SELECT nom,prixj FROM voiture order by nom');		// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{  
?>

		<option name="nom" value="<?php echo $donnees['nom']; ?>" checked><?php echo $donnees['nom']; ?> / <?php echo $donnees['prixj']; ?>€</option><br>


<?php
	}	
	$reponse->closeCursor();
?>