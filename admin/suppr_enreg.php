<?php
	include('../included/parametres.php');

$id = $_POST['num'];

$requete="DELETE FROM livre WHERE id_livre=$id";
$result=@mysql_query($requete,$idcom);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		window.
		window.setTimeout("location=('admin.php');",3000)
	</script>
</head>
<body>
<header>
	<center>
		<h2>Le document choisi a été effacé !</h2> <br>
		<br><h2>Redirection vers la page d'accuille dans 3 secondes !</h2> <br>
	</center>
</header>
</body>
</html>
