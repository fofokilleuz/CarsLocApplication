<?php
	include "../connexion/config.php";
	include "../connexion/database.fn.php";
	$link = database_connect($db);
		
//on récupère les donnees
	$nom = $_POST['nom'];
	$marque = $_POST['marque'];
	$modele = $_POST['modele'];
	$annee = $_POST['annee'];
	$prixj = $_POST['prixj'];
	$photo = $_POST['photo'];
	$com = stripslashes($_POST['com']);

	
//On renomme la photo aléatoirement afin d'éviter un conflit dans le dossier si deux photos de memes noms
	$dir = '../../misepage/photo/';
	$ext = strtolower( pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION) ); //extension de l'image
	$phototo=uniqid().'.'.$ext;

//on déplace la photo sur le serveur
	move_uploaded_file($_FILES['photo']['tmp_name'], $dir.$phototo);
	
// on enregistre les données
	$reponsesql = $link->prepare('INSERT INTO voiture (nom, marque, modele, annee, prixj, photo, com) VALUES(?,?,?,?,?,?,?)');
	$reponsesql->execute(array($nom, $marque, $modele, $annee, $prixj, $phototo, $com));
	
//Si il y a une erreur, on crie ^^
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