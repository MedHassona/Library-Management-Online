<?php 
	
	session_start();

	if (isset($_SESSION['name'])) {

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>welcome to BiB</title>
	  <meta charset="utf-8">
	  <link rel="stylesheet" type="text/css" href="../style/style-admin.css">
</head>
<body class="admin-body">
<header>
	<div class="up-div">
		<div class="logout">
			<a href="logout.php" class="dec">Déconnexion</a>
		</div>
		
	</div>
	<div class="mid-div">
		<a href="cherche.php" class="btn cher">chercher</a>
		<a href="../commun/livre.php" class="btn liv">livres</a>
		<a href="supr.php" class="btn sup">suprimer</a>
		<a href="update1.php" class="btn upd">update</a>
		<a href="ajout.php" class="btn upd">ajouter</a><br/><br/><br><br>
		<a href="emprunte.php" class="btn emp">emprintés</a>
		<a href="commande.php" class="btn com">commandes</a>
		<a href="" class="btn env">envoi notificatio</a>
		<a href="admin.php" class="btn hom">page home</a>
	</div>
</header>
</body>
</html>

 





 
<?php
}else {	header('Location:connecter.php'); }

?>