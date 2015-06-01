<?php
	include "../connexion/config.php";
	include "../connexion/database.fn.php";
	$link = database_connect($db);


//on récupère les donnees
	$nom = $_POST['nom'];

// on enregistre les données
	$reponsesql = $link->prepare('DELETE from voiture WHERE nom="'.$nom.'"');
	$reponsesql->execute(array($nom));	
	
	if (!$reponsesql) {
		die('La requete est invalide putain de merde: ' . mysql_error());
	}
	else {
		header('Location:admin.php');
	exit;
	}
	
	// on ferme la connection mysql
	$reponsesql->closeCursor();	

?>