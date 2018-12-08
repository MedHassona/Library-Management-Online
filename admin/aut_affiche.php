<?php session_start(); ?>

<HTML>
<BODY background = "blue">
<HEAD>
</HEAD>

<?php
		include('../included/parametres.php');

$aut = $_POST['aut'];

$requete="SELECT * FROM `livre` WHERE `auteur` LIKE '$aut' ORDER BY `titre` ASC";

//requete de selection
$result=@mysql_query($requete,$idcom);

//Comptage des oeuvres dans la base
$nbart=mysql_num_rows($result);

if($nbart >= 1)
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
			<form method="POST" action="aut_affiche.php">
			    <p>Auteur : <input type="text" size="5" name="aut">
			    <input type="submit" value="chercher"></p>
			</form>

	</div>
</body>
<html>






  <?php

// récupération et affichage des données

	$ligne=mysql_fetch_array($result,MYSQL_ASSOC); ?>
	 <center><h2>Il y a <?php echo "$nbart"; ?> livres pour cet auteur :</h2></center>

<div class="affichage">
	<table border="2" color="#e67e22"> <tr>
<?php	foreach($ligne as $nomcol=>$valcol)
	{ ?> <th class="dd"> <?php echo " $nomcol "; ?> </th><?php }?>  
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
				alert('aucun livre trouvé pour cet auteur !','red');
				window.location.href='chercher_aut.php';
				</script>";}

// fermeture de la connection
mysql_close($idcom);
?>


</BODY>
</HTML>