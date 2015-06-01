<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="misepage/logo/carsloc.jpg">

    <title>Cars Loc - Espace Location</title>

    <link href="../../misepage/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../misepage/css/location.css" rel="stylesheet">
  </head>

<body>
<?php include "meslocationshead.php"; ?>

<div class="container">		
<div class="row">
<div class="row row-offcanvas row-offcanvas-right">
	<div class="col-xs-12 col-sm-9">
			<h1>Vos locations</h1>
			</br>
	</div>
</div>
</div>

<div class="row">
<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-12">
			<?php 
			include "../connexion/config.php";
			include "../connexion/database.fn.php";
			$link = database_connect($db);
			if(!$link) die("erreur de connexion a la base de donnee".mysql_error());
			include "affichemeslocs.php";
			?>
		</div>

</div>
</div>
<div class="row">
		</br></br><a class="btn btn-danger btn-lg" href="ajouter_avis.php" role="button">Ajouter un avis &raquo;</a>
</div>
		<?php include "../index/copyright.php"; ?>
</div><!-- /container -->

</body>
  
</html>