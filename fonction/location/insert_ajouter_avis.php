<?php
session_start();
$_SESSION['username'];
?>
<?php
	include "../connexion/config.php";
	include "../connexion/database.fn.php";
	$link = database_connect($db);
	
//on récupère les donnees
		//l'id de l'avis
	$id_avis = '';
		//le mail du membre
	$id_membre = $_COOKIE['email'];		
		//l'id de la voiture
	$id = $_POST['id'];
		//l'avis écrit par le membre
	$avis = $_POST['avis'];
	
	
// on enregistre les données
	$reponsesql = $link-> prepare('INSERT INTO avis (id_avis, avis, id, id_membre) 
									VALUES(:id_avis,:avis,:id,:id_membre)');
	$reponsesql->execute(array( 'id_avis' => $id_avis,
								'avis' => $avis, 
								'id' => $id, 
								'id_membre' => $id_membre));
								
//Si il y a une erreur, on crie ^^
	if (!$reponsesql) {
	die('La requete est invalide putain de merde: ' . mysql_error());
	$reponsesql->closeCursor();
	}
	else {
	$reponsesql -> closeCursor();
		header('Location:../../livreor.php');
	exit;
	}
// on ferme la connection mysql

?>