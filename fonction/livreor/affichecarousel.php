
<?php
	$reponse = $link->query('SELECT id,nom,photo FROM voiture order by id');	// On commence à 1 car la 0 est active
	$incr=1;
	while ($donnees = $reponse->fetch())
	{  
?>
	
	<li data-target="#myCarousel" data-slide-to="<?php echo $incr; ?>"></li>
<?php
	$incr=$incr+1;
?>


<?php
	}	
	$reponse->closeCursor();
?>