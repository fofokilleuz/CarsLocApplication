<?php
	//connexion base de donnée
	include "config.php";
	include "database.fn.php";
	$link = database_connect($db);

	$email = $_POST['email'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$tel = $_POST['tel'];
	$mot_passe = sha1($_POST['mot_passe']); //hachage du mdp avec la fonction sha1
	$mot_passe2 = sha1($_POST['mot_passe2']);
	
	if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['tel']) && !empty($_POST['mot_passe']) && !empty($_POST['mot_passe2']))
	{

		

		$reponsesql = $link -> prepare('SELECT count(*) FROM membres WHERE email="'.$email.'"');
		$reponsesql-> execute(array('email' => $email));
		$nb = $reponsesql -> fetchColumn();
		
		if ($nb == 1) //il y a deja un membre ayant cette adresse mail
		{
			header("location:inscription.php?error=email");
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) //l'adresse mail n'est pas valide
		{
			header("location:inscription.php?error=mailinval");
		}
		elseif($mot_passe != $mot_passe2) //les deux mdp sont différents
		{
			header("location:inscription.php?error=mot_passedif");
		}
		else
		{
			$id_membre = '';
			$req = $link -> prepare('INSERT INTO membres(id_membre,email,nom,prenom,tel,mot_passe)
										VALUES (:id_membre,:email,:nom,:prenom,:tel,:mot_passe)');
			$req->execute(array(
					'id_membre' => $id_membre,
					'email' => $email,
					'nom' => $nom,
					'prenom' => $prenom,
					'tel' => $tel,
					'mot_passe' => $mot_passe
					));
					header("location:../../location.php");
		}
	}
	else
	{
		header("location:inscription.php?error=info");
	}
?>