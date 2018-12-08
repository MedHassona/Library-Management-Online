<?php session_start(); ?>
	
<?php include('../included/parametres.php');


if (isset($_POST['connecter'])) {
			$username= htmlspecialchars(trim($_POST['username']));
			$password= htmlspecialchars(trim($_POST['password']));

				$pass_h = sha1($password);
			if (empty($username)) {
				 echo "<script>
alert('veuilez entrer votre nom d\'utilisateur !');
window.location.href='connecter.php';
</script>";




			}elseif (empty($password)) {
					echo "<script>
					alert('veuilez entrer votre mot de pass !');
					window.location.href='connecter.php';
					</script>";
			}else
			{

			$requete="SELECT * FROM `client` WHERE `nom` LIKE '$username' AND `passwd` LIKE '$pass_h'";

			//requete de selection
			$result=@mysql_query($requete,$idcom);

			$requete="SELECT `id_client` FROM `client` WHERE `nom` LIKE '$username' AND `passwd` LIKE '$pass_h'";
			   	$result=@mysql_query($requete,$idcom);
			   	while($affichage = mysql_fetch_array($result, MYSQL_ASSOC)){ $ids = $affichage['id_client'];}
			   	

			//Comptage des oeuvres dans la base
			$nbart=mysql_num_rows($result);
			if($nbart==1)
			  {
			   	$_SESSION['username'] = $username;
			   	$_SESSION['password'] = $pass_h;
			   	$_SESSION['id'] = $ids;
			   	
			   	header('Location:users.php');
			  }
			Else
			  { 
				   echo "<script>
						alert('mouvaise identification :');
						window.location.href='connecter.php';
						</script>";
			   
			  }
			  }


}
?>

<script>
function MIdenti() {
    alert("mouvaise identification ,,, :/ ");
}
</script>
 


<!DOCTYPE html>
<html>
<head>

	<title>Se Connecter à la bibliothèque</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body class="connect">
	<div class="vid">
		<h2>Se connecter</h2><br>
		<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post">

		<input type="text" name="username" placeholder="votre nom ..."><br><br>
		<input type="password" name="password" placeholder="votre mot de pass ..."><br><br>
		<input type="submit" value=" se connecter " name="connecter">
		<a href="inscrire.php" class="ins"><br><br> &nbsp; ou avoir un compte ..</a>

		</form>
	</div>
</body>


