<?php 

function database_connect($db){ //fonction de connection à la bd, param $db (array), retourne lien de base
	$link = new PDO('mysql:host=XXX;dbname=carsloc;charset=utf8', 'XXX', 'XXX');
	if(!$link) die("erreur de connexion a la base de donnee".mysql_error());
	return $link;
}
/*
function database_disconnect($link){  //fonction de deconnexion de BD, param $link lien de base, retourne rien
	$link->closeCursor();
} 
*/
?>