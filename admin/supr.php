<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>welcome to BiB</title>
	  <meta charset="utf-8">
	  <link rel="stylesheet" type="text/css" href="../style/style-admin.css">
</head>
<body class="autre-body">
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

	<div class="in-div" >
			<form method="POST" action="suppr_enreg.php">
			    <p>Numéro ID : <input type="text"  name="num">
			    <input type="submit" value="Supprimer le livre"></p>
			</form>
	</div>




<?php
	include('../included/parametres.php');

$requete="SELECT * FROM livre";

//requete de selection
$result=@mysql_query($requete,$idcom);

//Comptage des oeuvres dans la base
$nbart=mysql_num_rows($result);
if($nbart >=1)
  {
   

// récupération et affichage des données
$nbart=mysql_num_rows($result);
	$ligne=mysql_fetch_array($result,MYSQL_ASSOC);
	?>

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

</body>
</html>

<?php 
}else {}
// fermeture de la connection
mysql_close($idcom);
?>

