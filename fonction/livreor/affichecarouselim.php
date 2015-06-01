<?php
	$reponse = $link->query('SELECT id,nom,photo,nbavis FROM voiture order by id');		// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{  
	$my_image = $donnees['photo'];
	$repertoire = "misepage/photo/";
?>


	<div class="item">
		<img class="second-slide" src="<?php echo $repertoire.$my_image; ?>" alt="Second slide">
		<div class="container">
		<div class="carousel-caption">
			<h1><?php echo $donnees['nom']; ?></h1>
			<p><form action="fonction/livreor/voiravi.php" method="post">
			<input id="id" name="id" type="hidden" value="<?php echo $donnees['id']; ?>">
			
		<?php 
			if($donnees['nbavis']==0)
			{
		?>
			<a class="btn btn-success" href="#" role="button">Je n'ai pas d'avis !</a>
		<?php
			} elseif($donnees['nbavis']==1)
			{
		?>
			<input type="submit" class="btn btn-danger" value="Voir mon avis">
		<?php
			} else
			{
		?>
			<input type="submit" class="btn btn-danger" value="Voir mes <?php echo $donnees['nbavis']; ?> avis">
		<?php
			}
		?>
		
			</form></p>
		</div>
		</div>
	</div>

<?php
	}	
	$reponse->closeCursor();
?>