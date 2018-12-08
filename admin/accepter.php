

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
				<tr><td><p>Id client :</p></td><td><input type="text" name="id_client"></td></tr>
				<tr><td><p>Id livre :</p></td><td><input type="text" name="id_livre"></td></tr>
			</table><br>
			<input type="submit" value="accepter" name="submit" >
			<input type="submit" value="fermer" onClick='window.close()'; >
		</center>

	</form>

<?php 
			include('../included/parametres.php');


if(!empty($_POST['id_client']) && !empty($_POST['id_livre']))
	{	

		$id_livre = $_POST['id_livre']; $id_client=$_POST['id_client'];
	 //Requête SQL
		$requete="DELETE FROM `commande` WHERE `commande`.`id_client` = '$id_client' AND `commande`.`id_livre` = '$id_livre';";
		$result=@mysql_query($requete,$idcom);

			
			$requet1="SELECT * FROM `livre` WHERE `id_livre`='$id_livre'";
			$result1= mysql_query($requet1,$idcom);
			$res = mysql_num_rows($result1);
			if($res==1){

					  $ligne=mysql_fetch_array($result1,MYSQL_ASSOC);
					  $nqte = $ligne['qte'];
					  $nqte--;
					  $requete2="UPDATE `livre` SET  `qte` = '$nqte' WHERE `livre`.`id_livre` = '$id_livre';";
					  $result2=@mysql_query($requete2,$idcom);

					  //table emprunter
							$requete3="INSERT INTO `emprunt` (`id`, `id_livre`, `id_client`, `date_e`, `date_r`) VALUES (NULL, '$id_livre', '$id_client', CURDATE(), ADDDATE(CURDATE(), INTERVAL 1 MONTH));";
							$result3=@mysql_query($requete3,$idcom);

				   
			}else echo"<h3>la commande supprimé et le livre n'est pas trouvé !</h3>";


}else echo "<center><h3>nterez les Id client et livre.</h3></center>";


?>

</body>
</html>























<!-- <?php session_start(); ?>

<html>
<head>
<title>accepter commanede</title>
 	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/style-admin.css">
</head>
<body class="autre-body">
	<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<center class="up">
			<table >
				<tr><td><p>Id client :</p></td><td><input type="text" name="id_client"></td></tr>
				<tr><td><p>Id livre :</p></td><td><input type="text" name="id_livre"></td></tr>
			</table><br>
			<input type="submit" value="accepter" name="submit" >
			<input type="submit" value="fermer" onClick='window.close()'; >
		</center>
	</form>
	<input type="text" name="texti" placeholder="fuck">


<?php 

		$id = $_POST['texti'];
	$id_livre = $_POST['id_livre'];

	include('../included/parametres.php');
	//$id_livre = $_POST['id_livre']; 
	//$id_client = $POST['id_client'];

	if (isset($POST['accepter'])) {

			$requet = "SELECT * FROM `client` WHERE `id_client` = '$id_client'";
			$result1 = @mysql_query($idcom1,$requet);

			$nbart = mysql_fetch_array($result1);
			if ($nbart < 1) {
				echo "<script>
						alert('veuilez remplir tous les champs !');
						window.location.href='accepter.php';
					</script>";
			}







		/*if ($_post['id_livre'] == "" || empty($_post['id_client'])) {
			echo "<script>
						alert('veuilez remplir tous les champs !');
						window.location.href='accepter.php';
					</script>";
		}else{

		}*/
	}



 ?>


 </body>
</html> -->