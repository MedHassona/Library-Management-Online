<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>chercher un livre</title>
	  <meta charset="utf-8">
	  <link rel="stylesheet" type="text/css" href="../style/style-users.css">
  	  <link rel="stylesheet" type="text/css" href="../style/style-cherche.css">
</head>
<body class="cherche-body">
<header>
	<div class="up-div">
		<div class="logout">
			<a href="logout.php" class="dec">Déconnexion</a>
		</div>
		
	</div>
	<div class="ch-mid-div">
		<a href="chercher.php" class="btn cher"> par Id-livre </a>
		<a href="chercher_aut.php" class="btn liv"> par auteur </a>
		<a href="chercher_ray.php" class="btn mes"> par Rayon </a>
		<a href="../client/users.php" class="btn com"> page home </a>
	</div>
</header>
		<div class="id-div" >
			<form method="POST" action="id_affiche.php">
			    <p>Numéro ID : <input type="text" size="5" name="num">
			    <input type="submit" value="chercher"></p>
			</form>
	</div>
</body>
<html>

