<html>
<head>
<title>S'inscrir à la Biblio Online'</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body class="connect">
	<div class="div-inscrir">
			<h2>Vos coordonnées</h2><br>
			<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<input type="text" name="cne" placeholder="Votre CNE"><br><br>
			<input type="text" name="username" placeholder="Votre Nom utilisateur"><br><br>
			<input type="text" name="prenom" placeholder="Votre Prénom "><br><br>
			<input type="password" name="password" placeholder="Votre Mot de Pass"><br><br>
			<input type="password" name="confirmpass" placeholder="Confirmer Mot de Pass"><br><br>
			<input type="reset" value=" Effacer ">
			<input type="submit" value=" Envoyer " name="submit"><br><br>
			<a href="connecter.php" class="ins">j'ai déjà un compte</a>
			</form>
	</div>
</body>





<?php 
	include('../included/parametres.php');
	if (isset($_POST['submit'])) {


if( !empty($_POST['cne']) && !empty($_POST['username']) && !empty($_POST['password']) )
{
	$username= $_POST['username']; $password=$_POST['password']; $cne=$_POST['cne']; $confirmpass = $_POST['confirmpass'];
	 $prenom = $_POST['prenom'];

	 $pass_h = sha1($password);

//Requête SQL
		$requete="INSERT INTO client VALUES('$cne','$username','$prenom','$pass_h','0')";
		

//controle des entrées		
			if ($idcom) 
			{
				if (strlen($username) >= 4 && strlen($prenom) >=4)
				{
					if (strlen($password) >= 2) 
					{
						if ($password == $confirmpass) 
						{
							$result=mysql_query($requete,$idcom);

							if(!$result)
							{
								echo "<font color='red' ><h2>Erreur d'insertion \n n˚",mysql_errno()," : ",mysql_error()."</h2> </font>";
							}else {
								echo "<script>
									alert('vous etes enregistré, veuilez se connecter :)');
									window.location.href='inscrire.php';
									</script>";
									header('location:connecter.php');
							} 

						}else echo "<script>
									alert('les mots de pass ne sont pas identiques, veuilez essayer autre fois !');
									window.location.href='inscrire.php';
									</script>";
					}else echo "<script>
								alert('le mot de pass est trop petit, veuilez essayer autre fois !');
								window.location.href='inscrire.php';
								</script>";
				}else echo "<script>
							alert('le nom utilisateur trop petit, veuilez essayer autre fois !');
							window.location.href='inscrire.php';
							</script>";	
			}else echo "<script>
						alert('Non Connexion !');
						window.location.href='inscrire.php';
						</script>";
}else  echo "<script>
			alert('veuilez remplir tous les champs !');
			window.location.href='inscrire.php';
			</script>";

		
	}
?>

</body> </html>

