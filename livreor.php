<!DOCTYPE html>
<html lang="en">

	<?php include "fonction/livreor/head.php"; ?>
	
<body>	
		<?php include "fonction/livreor/banniereconnexion.php"; ?>
		<?php 
			include "fonction/connexion/config.php";
			include "fonction/connexion/database.fn.php";
			$link = database_connect($db);
			if(!$link) die("erreur de connexion a la base de donnee".mysql_error());
		?>

<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	<?php include "fonction/livreor/affichecarousel.php"; ?>
	</ol>

	<div class="carousel-inner" role="listbox">
		<div class="item active">
		<img class="first-slide" src="misepage/photo/cars222.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Bienvenue dans notre Livre d'Or !</h1>
			  <p>Vous pouvez admirer toutes nos voitures en locations et regarder les avis laissés par nos membres</p>
            </div>
          </div>
        </div>
	
	<?php include "fonction/livreor/affichecarouselim.php"; ?>
	</div>
	
	<!-- controle -->
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
	<span class="sr-only">Previous</span></a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
	<span class="sr-only">Previous</span></a>
	
</div> <!-- fin Carousel --> 
</div>
<div class="container">
<?php include "fonction/index/copyright.php"; ?>
</div>
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>	
