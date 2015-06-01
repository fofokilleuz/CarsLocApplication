<?php
	$link = database_connect($db);
	$reponse = $link->query('SELECT idsup,lib,prixs FROM supplement order by prixs');		// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{  
?>

		<option name="idsup" value="<?php echo $donnees['idsup'];?>" checked> <?php echo $donnees['lib']; ?> / <?php echo $donnees['prixs']; ?> € </option><br>


<?php
	}	
	$reponse->closeCursor();
?>
