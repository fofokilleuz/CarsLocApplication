<?php
	include "../connexion/config.php";
	include "../connexion/database.fn.php";
	$link = database_connect($db);
		
//on récupère les donnees
		//le no de contrat
	$nocontrat = '';
		//on gère le format des dates : jj/mm/aa
	$datedeb = $_POST['datedeb'];
	$datefin = $_POST['datefin'];
		//on calcule la durée totale en jours
	$nbjour = (strtotime($datefin) - strtotime($datedeb))/86400;
		//l'id du membre
	$email = $_COOKIE['email'];		
	$req = $link-> prepare('SELECT id_membre FROM membres WHERE email="'.$email.'"');
	$req -> execute(array( 'email' => $email));
	$id_membre = $req -> fetch();
	$req -> closeCursor();
		//le nom de la voiture
	$nom = $_POST['nom'];
		//l'id du supplément et son prix
	$idsup = $_POST['idsup'];
	$req = $link-> prepare('SELECT prixs FROM supplement WHERE idsup="'.$idsup.'"');
	$req -> execute(array( 'idsup' => $idsup));
	$prixs = $req -> fetch();
	$req -> closeCursor();
		//le prix de la voiture
	$req = $link-> prepare('SELECT prixj FROM voiture WHERE nom="'.$nom.'"');
	$req -> execute(array( 'nom' => $nom));
	$prixj = $req -> fetch();
	$req -> closeCursor();
		//le prix de la voiture pour la durée voulue
	$prixvt = $prixj[0]*$nbjour;	
		//le prix de l'option, le prix à la journée, le prix total
	$prixt = $prixvt+$prixs[0];


//on va ici creer un tableau de tous les intervalles de location de la voiture voulue
$req = $link-> prepare('SELECT datedeb,datefin FROM location WHERE nom= :nom');
$req -> execute(array( 'nom' => $nom));
$intervalle1 = $req -> fetch();
	if(($intervalle1['datedeb']<$datefin) && ($datedeb<$intervalle1['datefin']))//si t1<=t4 && t3<=t2 faire invariant pour comprendre
	{
		header("location:louer_un_vehicule.php?error=dateprise"); //la voiture est déjà prise sur ces dates
		$req -> closeCursor();
	}
	
	
	elseif(!empty($_POST['datedeb']) && !empty($_POST['datefin']) && !empty($_POST['nom']) && !empty($_POST['idsup']))
	{	
		if ($nbjour == 0) //si la duree de location est de 0 jour
		{
			header("location:louer_un_vehicule.php?error=dateval");
		}
		else
		{
		// on enregistre les données
		$reponsesql = $link-> prepare('INSERT INTO location (datedeb, datefin, idsup, id_membre, nocontrat, nom, prixt) 
										VALUES(:datedeb,:datefin,:idsup,:id_membre,:nocontrat,:nom, :prixt)');
		$reponsesql->execute(array( 'datedeb' => $datedeb,
									'datefin' => $datefin, 
									'idsup' => $idsup, 
									'id_membre' => $id_membre[0],
									'nocontrat' => $nocontrat,
									'nom' => $nom,
									'prixt' => $prixt));	
	//Si il y a une erreur, on crie ^^
		if (!$reponsesql) {
		die('La requete est invalide putain de merde: ' . mysql_error());
		$reponsesql->closeCursor();
		}
		else {
		$reponsesql -> closeCursor();
			header('Location:meslocations.php');
		exit;
		}
		}

	}
else //si toutes les infos ne sont pas completes
	{
		header("location:louer_un_vehicule.php?error=info");
	}
?>