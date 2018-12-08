<?php
session_start();

		include('../included/parametres.php');
		
$id = $_POST['num'];

$requete="SELECT * FROM livre WHERE id_livre=$id";

//requete de selection
$result=@mysql_query($requete,$idcom);
$nbart=mysql_num_rows($result);
if ($nbart >= 1) {
	


  ?>


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
		<a href="admin.php" class="btn com"> page home </a>
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






  <?php

// récupération et affichage des données

	$ligne=mysql_fetch_array($result,MYSQL_ASSOC); ?>

<div class="affichage">
	<table border="1.5"> <tr>
<?php	foreach($ligne as $nomcol=>$valcol)
	{ ?> <th> <?php echo " $nomcol "; ?> </th><?php }?>  
		<tr>

		<tr>
	<?php
		do
		{
			echo "<tr>";
			foreach($ligne as $valcol)
			{ echo "<td> $valcol </td>"; }
			echo "</tr>";

		} while($ligne=mysql_fetch_array($result,MYSQL_NUM)); ?>
			</table>


</div>

<?php 

} else { echo "<script>
				alert('le Id specifié n\'est pas trouvé !');
				window.location.href='chercher.php';
				</script>";}
// fermeture de la connection
mysql_close($idcom);
?>