<?php session_start(); ?>
	
<?php include('../included/parametres.php');


if (isset($_POST['connecter'])) {
			$name= htmlspecialchars(trim($_POST['name']));
			$password= htmlspecialchars(trim($_POST['password']));

				$pass_h = sha1($password);
			if (empty($name)) {
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

			$requete="SELECT * FROM `admin` WHERE `nom` LIKE '$name' AND `passwd` LIKE '$password'";

			//requete de selection
			$result=@mysql_query($requete,$idcom);

			$requete="SELECT `id_admin` FROM `admin` WHERE `nom` LIKE '$name' AND `passwd` LIKE '$password'";
			   	$result=@mysql_query($requete,$idcom);
			   	while($affichage = mysql_fetch_array($result, MYSQL_ASSOC)){ $ids = $affichage['id_admin'];}
			   	

			//Comptage des oeuvres dans la base
			$nbart=mysql_num_rows($result);
			if($nbart==1)
			  {
			   	$_SESSION['name'] = $name;
			   	$_SESSION['password'] = $password;
			   	$_SESSION['id'] = $ids;
			   	
			   	header('Location:admin.php');
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
		<h2>Bienvenu ...</h2><br>
		<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post">

		<input type="text" name="name" placeholder="votre nom ..."><br><br>
		<input type="password" name="password" placeholder="votre mot de pass ..."><br><br>
		<input type="submit" value=" se connecter " name="connecter">
		</form>
	</div>
</body>





