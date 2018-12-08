<?php session_start(); ?>


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

	<div class="id-div" >
			<form method="POST" action="commander2.php">
			    <p>Numéro ID : <input type="text" size="5" name="id_livre">
			    <input type="submit" value="commander" name="commander"></p>
			</form>
	</div>

<?php
	include('../included/parametres.php');	

$requete="SELECT * FROM livre  WHERE qte > '0' ORDER BY rayon ";
$result=@mysql_query($requete,$idcom);
	$nbart=mysql_num_rows($result);
if($nbart < 1)
{ echo "<script>
			alert('lectur impossible !');
			window.location.href='commande.php';
			</script>"; }
else
{
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

		} while($ligne=mysql_fetch_array($result,MYSQL_NUM)); }?>
			</table>
		
	</div>
</body>
		
</html>	
			