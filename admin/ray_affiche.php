<?php
session_start();

		include('../included/parametres.php');

$ray = $_POST['ray'];

$requete="SELECT * FROM `livre` WHERE `rayon` LIKE '$ray' ORDER BY `titre` ASC";

//requete de selection
$result=@mysql_query($requete,$idcom);

//Comptage des oeuvres dans la base
$nbart=mysql_num_rows($result);
if($nbart >=1)
  {

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
			<form method="POST" action="ray_affiche.php">
			    <p>Rayon : <input type="text" size="5" name="ray">
			    <input type="submit" value="chercher"></p>
			</form>
	</div>
</body>
<html>






  <?php

// récupération et affichage des données

	$ligne=mysql_fetch_array($result,MYSQL_ASSOC); ?>
	 <center><h2>Il y a <?php echo "$nbart"; ?> livres dans ce rayon :</h2></center>

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
}else { echo "<script>
				alert('aucun livre trouvé dans ce rayon !','red');
				window.location.href='chercher_ray.php';
				</script>";}
// fermeture de la connection
mysql_close($idcom);
?>