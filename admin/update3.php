<?php session_start(); ?>

<html>
<head>
<title>update livre Infos</title>
 	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/style-admin.css">
</head>
<body class="autre-body">
<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<center class="up">
<table >
<tr><td><p>Id livre :</p></td><td><input type="text" name="id_livre"></td></tr>
<tr><td><p>Quantité :</p></td><td><input type="text" name="qte"></td></tr>
<tr><td><p>Rayon :</p></td><td><input type="text" name="ray"></td></tr>

</table><br>
<input type="submit" value="update" name="submit" >
<input type="submit" value="fermer" onClick='window.close()'; >
</center>

</form>

<?php 
	include('../included/parametres.php');

if(!empty($_POST['id_livre']) )
{
	$id_livre = $_POST['id_livre']; $qte=$_POST['qte'];
	 $ray=$_POST['ray'];

	 //Requête SQL
		$requete="UPDATE `livre` SET `rayon` = '$ray', `qte` = '$qte' WHERE `livre`.`id_livre` = '$id_livre';";

	//controle des entrées		
			if ($idcom) 
			{				
				$result=mysql_query($requete,$idcom);
				if(!$result)
				{
					echo "<h2>Erreur d'insertion \n n˚",mysql_errno()," : ",mysql_error()."</h2>";
				}else echo "livre modifié.";
			}else echo "connection failed :/";
}else {}


?>

</body>
</html>