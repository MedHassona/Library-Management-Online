<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>chercher un livre</title>
	  <meta charset="utf-8">
	  <link rel="stylesheet" type="text/css" href="../style/style-users.css">
</head>
<body class="users-body">
<header>
	<div class="up-div">
		<div class="logout">
			<a href="logout.php" class="dec">Déconnexion</a>
		</div>
		
	</div>
	<div class="mid-div">
		<a href="chercher.php" class="btn cher"> par Id-livre </a>
		<a href="chercher_aut.php" class="btn liv"> par auteur </a>
		<a href="chercher_ray.php" class="btn mes"> par Rayon </a>
		<a href="admin.php" class="btn com"> page home </a>
	</div>
</header>

</body>
</html>