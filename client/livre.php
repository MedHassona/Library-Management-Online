<?php session_start(); ?>


<?php
	
		include('../included/parametres.php');

$requete="SELECT * FROM livre ORDER BY rayon";
$result=@mysql_query($requete,$idcom);

//Comptage des oeuvres dans la base
$nbart=mysql_num_rows($result);



if($nbart < 1)
  {
 	 header('location:users.php');
 
	}else{

?>


<!DOCTYPE html>
<html>
<head>
<title>update livre Infos</title>
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
	<div class="mid-div">
		<a href="../commun/cherche.php" class="btn cher">chercher</a>
		<a href="livre.php" class="btn liv">livres</a>
		<a href="meslivres.php" class="btn mes">mes livre</a>
		<a href="commande.php" class="btn com">commander</a>
		<a href="" class="btn noti">notification</a>
	</div>
</header>







  <?php

	$nbart=mysql_num_rows($result);
	$ligne=mysql_fetch_array($result,MYSQL_ASSOC);
	?>
	 <center><h2>Il y a <?php echo "$nbart"; ?> livres actuellement :</h2></center>

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

		} while($ligne=mysql_fetch_array($result,MYSQL_NUM)); }?>
			</table>


</div>
</body>
<html>
