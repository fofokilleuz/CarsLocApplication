<?php
include "config.php";
include "database.fn.php";
$link = database_connect($db);

if(isset($_POST) && isset($_POST['email']) AND isset($_POST['passe'])){
	$y = $link->prepare('SELECT COUNT(*) FROM membres WHERE email = ?');
	$y->execute(array($_POST['email']));
	$x = $y->fetch();
	
	if ($x[0] == 0){
		header("location:signin.php?error=noemail");
	}else{
		$e = $link->prepare('SELECT mot_passe FROM membres WHERE email = ?');
		$e->execute(array($_POST['email']));
		$rep = $e->fetch();
		$passe = sha1($_POST['passe']);
		$email=$_POST['email'];

		
		if ($passe == $rep['mot_passe']){
			setcookie('email',$email, time() + 365*24*3600, '/', null, false, true);
			setcookie('passe',$passe, time() + 365*24*3600, '/', null, false, true);
			
			header('Location: ../../location.php'); 
		}else{
			header("location:signin.php?error=fakemdp");
		}
	}

}

?>