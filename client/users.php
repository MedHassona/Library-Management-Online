<?php 
	
	session_start();

	if (isset($_SESSION['username'])) {

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>welcome to BiB</title>
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
		<a href="../commun/cherche.php" class="btn cher">chercher</a>
		<a href="livre.php" class="btn liv">livres</a>
		<a href="meslivres.php" class="btn mes">mes livre</a>
		<a href="commande.php" class="btn com">commander</a>
		<a href="" class="btn noti">notification</a>
	</div>
</header>
</body>
</html>

 





 
<?php
}else {	header('Location:connecter.php'); }

?>
