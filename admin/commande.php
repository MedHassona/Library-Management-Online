<?php session_start(); ?>


<?php
	
		include('../included/parametres.php');

$requete="SELECT * FROM commande";
$result=@mysql_query($requete,$idcom);

//Comptage des oeuvres dans la base
$nbart=mysql_num_rows($result);



if($nbart < 1)
  {
  		echo "<script>
					alert('aucune commande !');
					window.location.href='admin.php';
				</script>";
 
	}else{

?>


<!DOCTYPE html>
<html>
<head>
	<title>chercher un livre</title>
	  <meta charset="utf-8">
	  <link rel="stylesheet" type="text/css" href="../style/style-admin.css">
  	  <link rel="stylesheet" type="text/css" href="../style/style-cherche.css">

  	    <script type="text/javascript">
  				function accepter()
                        {
                                window.open('accepter.php','Update','menubar=no, scrollbars=no, top=100, left=100, width=500, height=450');
                        }
		</script>
</head>
<body class="cherche-body">
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







  <?php

	$nbart=mysql_num_rows($result);
	$ligne=mysql_fetch_array($result,MYSQL_ASSOC);
	?>
	 <h2 style="margin-left: 33%; ">Il y a <?php echo "$nbart"; ?> commandes :</h2>

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

		<br/><form class="butt"><input type=button value='accepter commande'  onClick='accepter()';></form> 

</body>
<html>
